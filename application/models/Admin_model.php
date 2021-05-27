<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model
{ 
	public function get_table_keys($tname)
	{
		$fields = $this->db->field_data($tname);

		
		return (Array)$fields;
		
	}

	public function get_tableData($tableName)
	{
		$query= $this->db->get($tableName);
		return $query->result_array();
	} 
	public function is_cnic_avail($cnic_no)
	{
		$this->db->where('cnic_no',$cnic_no);
		$query=$this->db->get('e_voters');
		if($query->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function notidata($to,$subject,$data,$mnum="",$token="")
	{
		//mail($to,$subject,$data);
		$this->load->library('email');

		$this->email->from('sales@catalystitsolution.com', 'Albarka Holdings');
		$this->email->to($to);
		//$this->email->cc('another@another-example.com');
		//$this->email->bcc('them@their-example.com');

		$this->email->subject($subject);
		$this->email->message($data);

		$this->email->send();
	}
	public function checksession()
	{
		$data=$this->session->userdata('email');

		if(empty($data))
		{

			redirect("Main/login");
			exit;
		}
	}
	public function upload_image($val="logo")
	{
		$config['upload_path']      = './assetsAdmin/img/';
		$config['file_name']        = uniqid();
		$config['allowed_types']        = '*';
		$this->load->library('upload', $config);

		if ($this->upload->do_upload($val))
		{
			$uploaddata = array('upload_data' => $this->upload->data());

		}

		if(!empty($uploaddata['upload_data']['file_name']))
		{

			return $uploaddata['upload_data']['file_name'];
		}
		return "";
	}
	public function getsession()
	{
		$data=$this->session->userdata();
		return $data;
	}
	public function getsessioninfo($td)
	{
		$data=$this->getsession();
		if(!empty($data))
		{
			$data=(Array) $data;

			if(!empty($data[$td]))
			{
				return $data[$td];
			}
			else
			{
				if($td=="piclink")
				{

					return"user.png";
					exit;
				}
				else
					return"";	
			}

		}
		else
			return"";
	}
	public function validateLogin($username,$password)
	{
		//echo "string";exit();
		$this->db->where('username',$username);
		$this->db->where('password',$password);

		$query = $this->db->get('users');#
		//echo $this->db->last_query();
		//	print_r($query->row_array());exit;
		$data=$query->row_array();
		

		return $data;
	}
	public function validateUserLogin($username,$password)
	{
		//echo "string";exit();
		$this->db->where('abh_id',$username);
		$this->db->where('password',$password);

		$query = $this->db->get('customers');#
		//echo $this->db->last_query();
		//	print_r($query->row_array());exit;
		$data=$query->row_array();
		

		return $data;
	}
	public function validateLoginapi($username,$password)
	{
		//echo "string";exit();
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$this->db->where('role',"User");

		$query = $this->db->get('users');#
		//echo $this->db->last_query();
		//	print_r($query->row_array());exit;

		return $query->row_array();
	}
	public function updateReturn($tableName,$data=array(),$cond=array())
	{       
		$this->db->cache_delete_all();
		$this->db->where($cond);
		if ($this->db->update($tableName,$data))
			return true;
		else
			return false;


	}

	public function insertReturn($tableName,$data)
	{
		if($this->db->insert($tableName,$data))
			return $this->db->insert_id();
		else
			return false;
	}
	
	public function search($tableName,$field,$key)
	{
		$this->db->like($field,$key);
		$query=$this->db->get($tableName);
		return $query->result_array();
	}


	public function num_row($table_name)
	{
		$table_row_count = $this->db->count_all($table_name);
		return $table_row_count;
	}
	public function getSumRows($tableName,$colName,$cond= array())
	{
		$this->db->select_sum($colName);
		$this->db->where($cond);
		$query = $this->db->get($tableName);
		return $query->row()->$colName;

	}
	public function getOrderby($tableName,$orderField,$order,$cond = array())
	{
		
		$this->db->order_by($orderField,$order);
		$this->db->limit(10); 
		if($cond) 
			$this->db->where($cond);
		$query = $this->db->get($tableName);
		return $query->result_array();
	}

	public function insertData($tableName,$data)
	{
		if($this->db->insert($tableName,$data))
			return true;
	}
	public function empty_table0($tableName)
	{
		$this->db->from($tableName);
		$this->db->truncate();
		return true;
	}
	public function get_last_id($tableName,$data)
	{
		$this->db->insert($tableName,$data);
		return $this->db->insert_id();
	}
	public function bulk_insert($tableName,$data)
	{
		$this->db->insert_batch($tableName,$data);
		$this->db->last_query();
		return true;
	}
	public function delRow($tableName,$cond = array())
	{ 
		$this->db->where($cond);
		$this->db->delete($tableName);
	}
	
	public function getField($tableName,$cond = array(),$field)
	{
		$this->db->where($cond);
		$query = $this->db->get($tableName);
		$record = $query->row_array();
		if (!empty($record)) {
			return $record[$field];
		}
		else
			return 'Not found';
	}
	public function getRow($tableName,$cond = array())
	{
		if($cond) $this->db->where($cond);
		$query = $this->db->get($tableName);
		return $query->row_array();
	}
	public function getRows($tableName,$cond = array())
	{
		if($cond) $this->db->where($cond);
		$query = $this->db->get($tableName);
		return $query->result_array();
	}
	
	public function countRows($table,$cond = array())
	{
		$this->db->where($cond);
		return $this->db->count_all_results($table);
	}
	public function updateRow($tableName,$cond = array(),$data = array())
	{
		// echo "string";exit();
		$this->db->where($cond);
		if($this->db->update($tableName,$data))
			return true;
	}
	public function getSetting()
	{
		$query = $this->db->get('e_settings');
		return $query->row_array();
	}
	public function multiCondition($table,$conditions,$result = 'all')
	{
		if($conditions)
			$this->db->where($conditions);
		$query = $this->db->get($table);
		if($result == 'all')
			return $query->result_array();
		else
			return $query->row_array();
	}
	public function get_student_course($student_id)
	{    
		$this->db->select("*");
		$this->db->from('assign a');
		$this->db->join('course c','a.course_id=c.id');
		$this->db->where('a.student_id',$student_id);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_shifts($course_id)
	{    
		$this->db->select("*,s.id as s_id");
		$this->db->from('schedule0 s');
		$this->db->join('course c','s.course_id=c.id');
		$this->db->where('s.course_id',$course_id);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_shifts0($course_id)
	{    
		$this->db->select("*,s.id as s_id");
		$this->db->from('student_shift s');
		$this->db->join('course c','s.course_id=c.id');
		$this->db->where('s.student_id',$course_id);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getQrCode($string)
	{
		$this->load->library('ciqrcode');
		$uidv= uniqid();
		$params['data'] = $string;
		$params['level'] = 'H';
		$params['size'] = 10;
		$params['savename'] =$uidv.'tes.png';
		$this->ciqrcode->generate($params);

		return '<img src="'.base_url().$uidv.'tes.png" style="height:150px;width:150px" />';
	}
	public function getLastAttr($table,$key,$col)
	{    
		$this->db->order_by($key,'DESC');
		$this->db->limit(1);


		$query = $this->db->get($table);
		$record =$query->result_array();
		if (!empty($record)) {
			$record=$record[0];
			return $record[$col];
		}
		else
			return 'Not found';
	}
	public  function getdatawhere($tname,$array,$orderby,$like="",$join1="",$join2="",$join3="",$join4="",$select="",$groupby="",$limit="",$orwhere="")
	{
		if(!empty($select))
		{
			$data=$this->db->select($select);

		}
		if(!empty($join1))
		{
			$data=$this->db->join($join1[0],$join1[1],$join1[2]);

		}
		if(!empty($join2))
		{
			$data=$this->db->join($join2[0],$join2[1],$join2[2]);

		}
		if(!empty($join3))
		{
			$data=$this->db->join($join3[0],$join3[1],$join3[2]);

		}
		if(!empty($join4))
		{
			$data=$this->db->join($join4[0],$join4[1],$join4[2]);

		}
		if(!empty($array))
		{
			$data=$this->db->where($array);
		}
		if(!empty($orwhere))
		{
			$data=$this->db->or_where($orwhere);
		}
		
		if(!empty($like))
		{
			$data=$this->db->like($like);

		}
		foreach($orderby as $key=>$val)
		{
			$data=$this->db->order_by($key,$val);
		}
		if(!empty($groupby))
		{
			$data=$this->db->group_by($groupby);

		}
		if(!empty($limit))
		{
			$data=$this->db->limit($limit);

		}
		$data=$data->get($tname);
		$data=$data->result_array();


		return $data;

	}


}
?>
