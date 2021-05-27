<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_login extends CI_Model
{
	public function admin_login()
	{
		//$data=$_POST;
		$admin=$this->db->select('email','password');
		       //print_r($admin);
	}
	public function validateLogin($username,$password)
	{
		//echo "string";exit();
		$this->db->where('username',$username);
		$this->db->where('password',$password);

		$query = $this->db->get('e_login');#
		echo $this->db->last_query();exit();

		//return $query->row_array();
	}
	public function validateCandidateLogin($username,$password)
	{	if($username == "" || $password == "") return false;
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$query = $this->db->get('employee');
		return $query->row_array();
	}
}
?>