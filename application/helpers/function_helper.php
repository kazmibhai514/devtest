<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('__send_curl_request'))
{
	function show_flash_data()
	{
		$CI = & get_instance();
		$resp='';
		if($CI->session->flashdata('alert_data'))
		{
			$alert = $CI->session->flashdata('alert_data');
			$resp .= '<div class="alert alert-'.$alert['type'].'">';
			$resp .= ' <a class="close" data-dismiss="alert" aria-label="close">&times;</a>';
			$resp .= $alert['details'];
			$resp .= '</div>';

		}  
		return $resp;
	}
    function getUserID()
    {
         $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.zoom.us/v2/users?status=active&page_size=30&page_number=1",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhdWQiOm51bGwsImlzcyI6IkktTlNqSnFWUU9Dc2ltYmowUVRXM1EiLCJleHAiOjE2MTk1MTYxODksImlhdCI6MTYxODkxMTM5MX0.ktZqUpErYUIlFIQGjRA4fZdjyCHR7EHSGusxHefsAdI",
            "content-type: application/json"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          echo "cURL Error #:" . $err;
            exit;
        } else {
            $resArray=json_decode($response);
            $resUserID=$resArray->users[0]->id;
            //             print_r($response);
            //             echo"<br><br>";
            // getSettings("xEVDl0f3QruCXr5f4iR6ag==");

            return $resUserID;
           // exit;
          //echo "<pre>".$response;
        }
    }
    

	function getCol($table,$col,$id,$rd)
	{
		$CI =& get_instance();
		//$result=$this->db->query("Select * FROM $table where $col=?",array($id));
		$result=$CI->Admin_model->getRow($table,array($col=>$id));
		if(!empty($result))
		{
			return $result[$rd];
		}
		else
		{
			return ;
		}

	}

	function httpPost($url,  $data){
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($curl);
		
		curl_close($curl);
		return $response;
	}
	
	function setMainMneu()
	{
		$CI =& get_instance();
		echo ' 
		<li ><a href="'.base_url().'">Home</a></li>
		';
		$records=$CI->Admin_model->getRows('e_menu',array('display'=>"yes",'parent_id'=>"0"));

		foreach ($records as $row)
		{
			extract($row);
			if (strpos($position, 'navigation')!==false)
			{	


				echo ' 
				<li class=""><a href="'.base_url()."pages/".$row['slug'].'">'.$row['name'].'</a></li>';


				
			}

		}
		echo $valdata;
		echo' <li class=""><a href="'.base_url().'Main/packages">Packages</a></li> ';
		echo' <li class=""><a href="'.base_url().'contact">Contact Us</a></li> ';


	}


	function setMobileMneu()
	{
		$CI =& get_instance();
		echo ' 
		<li style="margin-bottom:10px"><a href="'.base_url().'"><font size="+2" color="White">Home</font></a></li>
		';
		$records=$CI->Admin_model->getRows('e_menu',array('display'=>"yes",'parent_id'=>"0"));

		foreach ($records as $row)
		{
			extract($row);
			if (strpos($position, 'navigation')!==false)
			{	


				echo ' 
				<li style="margin-bottom:10px"><a href="'.base_url()."pages/".$row['slug'].'"><font size="+2" color="White">'.$row['name'].'</font></a></li>';


				
			}

		}
		echo $valdata;
		echo' <li style="margin-bottom:10px"><a href="'.base_url().'Main/packages"><font size="+2" color="White">Packages</font></a></li> ';
		echo' <li style="margin-bottom:10px"><a href="'.base_url().'contact"><font size="+2" color="White">Contact Us</font></a></li> ';
		if(empty(getInfo("email"))){
			echo' <li style="margin-bottom:10px"><a href="'.base_url().'Main/login"><font size="+2" color="White">Login</font></a></li> ';

		echo' <li style="margin-bottom:10px"><a href="'.base_url().'Main/signup"><font size="+2" color="White">SignUp</font></a></li> ';
		}
		else
		{
			echo' <li style="margin-bottom:10px"><a href="'.base_url().'/Admin/manage_userdashboard?id='.getInfo("rcode").'"><font size="+2" color="White">Dashboard</font></a></li> ';

		echo' <li style="margin-bottom:10px"><a href="'.base_url().'Main/logout"><font size="+2" color="White">Logout</font></a></li> ';
		}
		

	}

	function setFooterMneu()
	{
		$CI =& get_instance();

		//$result=$this->db->query("Select * FROM $table where $col=?",array($id));
		$records=$CI->Admin_model->getRows('e_menu',array('display'=>"yes"));

		foreach ($records as $row)
		{
			extract($row);
			if (strpos($position, 'latest')!==false)
			{	
			//echo '  <li class="nav-item"><a class="nav-link" href="'.base_url()."pages/".$row['slug'].'">'.$row['name'].'</a></li>';

				echo ' <li> <a href="'.base_url()."pages/".$row['slug'].'">'.$row['name'].'</a> <span class="date defaultcolor">'.$row['createdat'].'</span> </li>';


			}
		}


	}
	function setFooter2Mneu()
	{
		$CI =& get_instance();

		//$result=$this->db->query("Select * FROM $table where $col=?",array($id));
		$records=$CI->Admin_model->getRows('e_menu',array('display'=>"yes"));

		foreach ($records as $row)
		{
			extract($row);
			if (strpos($position, 'links')!==false)
			{	
			//echo '  <li class="nav-item"><a class="nav-link" href="'.base_url()."pages/".$row['slug'].'">'.$row['name'].'</a></li>';

				echo ' <li> <a href="'.base_url()."pages/".$row['slug'].'">'.$row['name'].'</a>  </li>';


			}
		}


	}
	
	function getLastItem($table,$key,$col)
	{
		$CI =& get_instance();
		//$result=$this->db->query("Select * FROM $table where $col=?",array($id));
		$result=$CI->Admin_model->getLastAttr($table,$key,$col);

		return $result;

	}
	
	function  setdateval($date)
	{
		return date("d-m-Y",strtotime($date));
	}
	function numFormat($num)
	{
		return number_format($num,2);
	}
	function getInfo($val)
	{
		$CI =& get_instance();

		return $CI->Admin_model->getsessioninfo($val);


	}
	

	function getSession()
	{
		$CI =& get_instance();

		return $CI->Admin_model->getsession('role')=="Admin";

	}

	function getColMC($table,$cond,$rd)
	{
		if(empty($cond))
		{
			return "";
		}
		$CI =& get_instance();
		//$result=$this->db->query("Select * FROM $table where $col=?",array($id));
		$result=$CI->Admin_model->getRow($table,$cond);
		if(!empty($result))
		{
			return $result[$rd];
		}
		else
		{
			return "";
		}

	}

	function getOption($tableName,$value='id',$showValue='name',$select="",$cond=array(),$selectOption=FALSE)
	{
		$CI =& get_instance();
		$CI->load->model('Admin_model');
		$records2 = $CI->Admin_model->multiCondition($tableName,$cond);
		if ($records2)
		{
			if($selectOption && empty($select)) echo "<option value='' >Select option</option>";
			foreach ($records2 as $row2)
			{
				if($row2[$value] == $select) $selected= "selected";
				else $selected ="";
				echo "<option value='".$row2[$value]."' ".$selected.">".$row2[$showValue]."</option>";
			}
		}
		else
			echo "<option value=''>No Options</option>";
	}
	function getOptionArray($array,$id,$valname,$selectedValues="",$selectOption=FALSE,$haveNoOptions=true)
	{

		if ($array)
		{
			if($selectOption) echo "<option value=''  >Select option</option>";
			foreach ($array as $val)
			{
				if(!empty($selectedValues))
				{
					$j=0;
					foreach($selectedValues as $sv)
					{
						if($val[$id]==$sv)
						{
							$j=1;
							echo "<option value='".$val[$id]."' selected>".$val[$valname]."</option>";

						}
					}
					if($j==0)
					{
						echo "<option value='".$val[$id]."'>".$val[$valname]."</option>";

					}
				}
				else
				{
					echo "<option value='".$val[$id]."'>".$val[$valname]."</option>";

				}
			}
		}
		else
		{
			if($haveNoOptions)
			{
				echo "<option value=''>No Options</option>";
			}
		}
	}
	function getOptionMulipleSelect($tableName,$value='id',$showValue='name',$select=array(),$cond=array(),$selectOption=FALSE)
	{
		$CI =& get_instance();
		$CI->load->model('Admin_model');
		$records2 = $CI->Admin_model->multiCondition($tableName,$cond);
		if ($records2)
		{
			if($selectOption) echo "<option value='' >Select option</option>";
			foreach ($records2 as $row2)
			{
				if(!empty($select))
				{
					$selected ="";
					foreach($select as $sl)
					{
						if($row2[$value] == $sl)
						{
							$selected= "selected";
						}
					}
					echo "<option value='".$row2[$value]."' ".$selected.">".$row2[$showValue]."</option>";

				}
				else
				{

					echo "<option value='".$row2[$value]."' ".$selected.">".$row2[$showValue]."</option>";

				}
			}
		}
		else
			echo "<option value=''>No Options</option>";
	}

	function count0($table)
	{
		$CI = & get_instance();
		$CI->load->model('Admin_model');
		return $records2=$CI->Admin_model->num_row($table);
	//return true;
	}
	function count_payment($table)
	{
		$CI = & get_instance();
		$CI->load->model('Admin_model');
		return $records2=$CI->Admin_model->num_row($table);
	//return true;
	}
	function multiCondition($table,$conditions = array(),$result = 'all')
	{
		$CI =& get_instance();
		$CI->load->model('Admin_model');
		return $records2 = $CI->Admin_model->multiCondition($table,$conditions,$result);
	}

	function getRows($tableName,$cond)
	{    
		$CI =& get_instance();
		$CI->load->model('Admin_model');
		return $records2 = $CI->Admin_model->getRows($tableName,$cond);
	}
	function getRow($tableName,$cond)
	{    
		$CI =& get_instance();
		$CI->load->model('Admin_model');
		return $records2 = $CI->Admin_model->getRow($tableName,$cond);
	}
	function countRows($tableName,$cond = array())
	{
		$CI =& get_instance();
		$CI->load->model('Admin_model');
		return $records2 = $CI->Admin_model->countRows($tableName,$cond);
	}

	function getSumRows($tableName,$sumCol,$cond = array())
	{
		$CI =& get_instance();
		$CI->load->model('Admin_model');
		return $records2 = $CI->Admin_model->getSumRows($tableName,$sumCol,$cond);
	}
}
?>