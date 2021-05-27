<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct() 
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->helper("function_helper");
		$this->load->model('Admin_model');
		$this->load->library('session');
		$this->load->helper('form');

	}
	public function manage_settings()
	{	
		$this->load->view('admin/manage_settings');
	}
	public function index()
	{	
		$this->load->view('admin/login');
	}
	public function view_meeting()
	{
		if(empty($_GET['id']))
		{
			redirect("Admin/dashbaord");
		}
		else
		{
			$this->load->view('admin/view_meeting');
		}
	}
	public function dashboard()
	{	
		$this->load->view('admin/dashboard');
	}
	public function cmeeting()
	{
		$this->load->view('admin/cmeeting');
	}
	public function submit_meeting()
	{
		$title=$_POST['meeting_title'];
		$datetime=$_POST['meeting_time']; 
		$type=$_POST['type'];
		$duration=$_POST['duration'];
		$password=$_POST['password'];
		$host_video=false;
		if(!empty($_POST['host_video']))
		{
			$host_video=$_POST['host_video'];
		}
		$participant_video=false;
		if(!empty($_POST['participant_video']))
		{
			$participant_video=$_POST['participant_video'];
		}
		$join_before_host=false;
		if(!empty($_POST['join_before_host']))
		{
			$join_before_host=$_POST['join_before_host'];
		}
		$join_before_host=false;
		if(!empty($_POST['registrants_email_notification']))
		{
			$registrants_email_notification=$_POST['registrants_email_notification'];
		}
		$userid=getUserID();
		$json=array (
			'topic' => $title,
			'type' => '2',
			'start_time' => $datetime,
			'duration' => '20',
			'timezone' => 'Asia/Tashkent',
			'password' => '971@schhoo',
			'agenda' => 'Online classess',
			'settings' => 
			array (
				'host_video' => $host_video,
				'participant_video' => $participant_video,
				'cn_meeting' => 'false',
				'in_meeting' => 'false',
				'join_before_host' => $join_before_host,
				'mute_upon_entry' => 'false',
				'watermark' => 'false',
				'use_pmi' => 'false',
				'approval_type' => '2',
				'registration_type' => '2',
				'meeting_authentication'=>'true',
				'authentication_options'=>array('in_meeting'=>array("annotation"=> 'true',"whiteboard"=>'true')),
				'audio' => 'both',
				'auto_recording' => 'false',
				'enforce_login' => 'false',
				'enforce_login_domains' => 'false',
				'registrants_email_notification' => $registrants_email_notification,
				)
			);
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.zoom.us/v2/users/".$userid."/meetings",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS=>  json_encode($json),
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
			$response=(Array)json_decode($response);
			redirect("admin/view_meeting?id=".$response['id']);
		}
	}
	public function join_meeting()
	{
		echo"<style>body{ padding:0px;margin:0px; }</style>";
		$link='https://us04web.zoom.us/wc/join/'.$_GET['id'];
		echo"<iframe src='".$link."' style='width:100vw;height:100vh;border:0px;' ></iframe>";
	}
	public function start_meeting()
	{
		
		echo"<style>body{ padding:0px;margin:0px; }</style>";
		$link=$_GET['url'];
		echo"<iframe src='".$link."' style='width:100vw;height:100vh;border:0px;' ></iframe>";
	}
	public function get_forms()
	{
		$type = $this->input->post('type');
		$id = "";
		$calledview=$type;
		$tablename=$this->input->post('tablename');
		$key=$this->input->post('key');
		if(!empty($this->input->post('id')))
		{
			$id=$this->input->post('id');

		}
		$select_id="";
		if(!empty($this->input->get('select_id')))
		{
			$select_id=$this->input->get('select_id');

		}

		if($type=="team")
		{
			$this->load->view('admin/templates/forms/'.$calledview,array('id'=>$id,'select_id'=>$select_id,'key'=>$key,'tablename'=>$tablename,'calledview'=>$calledview));
		}
		else
		{
			$this->load->view('admin/templates/forms/'.$calledview,array('id'=>$id,'select_id'=>$select_id,'key'=>$key,'tablename'=>$tablename,'calledview'=>$calledview));
		}


	}

	public function authenticate_login()
	{
		$username     = $this->input->post('username');
		$pass         = md5($this->input->post('password'));

		$userData 	  = $this->Admin_model->validateLogin($username,$pass);

		if(!empty($userData))
		{
			$this->session->set_userdata('logged_in', 'yes');
			$this->session->set_userdata('lang', 'english');
			$this->session->set_userdata($userData);

			redirect('Admin/dashboard');

		}
		else
		{
			$this->session->set_flashdata("formmessageerror","Username And Password Is Incorrect");
			redirect('login');
		}
	}
	public function updateRecord()
	{

		if (isset($_POST['tableName']) && isset($_POST['key']) && isset($_POST['value']))
		{
			if (!empty($_POST['tableName']) && !empty($_POST['key']) && !empty($_POST['value']))
			{
				if ($_POST['tableName']=="soldrequests" && $_POST['key']=="status" && $_POST['value']=="Approved")
				{
					$datav=getRow("soldrequests",array($_POST['key']=>$_POST['value']));
					$this->Admin_model->updateReturn("user_packages",array("status"=>"expired"),array("user_id"=>$datav['user_id']));
				}

				$this->Admin_model->updateReturn($_POST['tableName'],array($_POST['ukey']=>$_POST['uvalue']),array($_POST['key']=>$_POST['value']));				
			}
			else
			{

				$this->session->set_flashdata("formmessageerror","Developer Error! Empty Parameter");

				$this->load->view('includes/message');

			}
		}
		else
		{
			$this->session->set_flashdata("formmessageerror","Developer Error! Parameter Missin");

			$this->load->view('includes/message');
		}

	}
	public function deleteRecord()
	{

		if (isset($_POST['tableName']) && isset($_POST['key']) && isset($_POST['value']))
		{
			if($_POST['tableName']=="accounts"  && !empty($_POST['value']))
			{
				deleteAccount($_POST['value']);
			}
			if (!empty($_POST['tableName']) && !empty($_POST['key']) && !empty($_POST['value']))
			{
				$this->Admin_model->delRow($_POST['tableName'],array($_POST['key']=>$_POST['value']));				
			}
			else
			{

				$this->session->set_flashdata("formmessageerror","Developer Error! Empty Parameter");

				$this->load->view('includes/message');

			}
		}
		else
		{
			$this->session->set_flashdata("formmessageerror","Developer Error! Parameter Missin");

			$this->load->view('includes/message');
		}

	}
	public function submit_settings()
	{
		$counter=0;
		$option_title=$this->input->post('option_title');
		$type=$this->input->post('type');
		foreach($this->input->post('value') as $value)
		{
			if($type[$counter]=='img')
			{
				$value=$this->Admin_model->upload_image($value);
			}
			if(!empty($value))
			{
				if(empty($this->Admin_model->getRow("options",array("option_title"=>$option_title[$counter]))))
				{
					$this->Admin_model->insertData('options',array("option_title"=>$option_title[$counter],"value"=>$value));

				}
				else
				{
					$this->Admin_model->updateReturn('options',array("option_title"=>$option_title[$counter],"value"=>$value),array("option_title"=>$option_title[$counter]));

				}
			}
			$counter++;



		}

	}
	public function logout() 
	{
		// echo "string";exit();	
		/*$session_data = array
		(
			'logged_in'	        => '',	
			'set_currency'		=> '',
			'user_id'      		=> '',
			'username'       	=> '',
			'user_pass'       	=> '',
			'_config:protected' => '',
			'name'=>"",
			"email"=>"",
			"phone"=>"",
			"password"=>"",
			"role"=>"",
			"status"=>"",
			);
		$this->session->set_userdata('logged_in');
		$this->session->set_userdata('user_data', $session_data);*/
		$this->session->sess_destroy();

		redirect('Admin');

	}
}

