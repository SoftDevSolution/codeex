<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dologin extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('session','database');
		$this->load->model('Employee_model','employee');
	}
	
	public function index()
	{
		$this->load->model('User_model','user');

			$username = $this->input->post("username");
			$password = $this->input->post("password");

			// Check Type User
			$query_user = $this->employee->_get_by_username($username);
				foreach ($query_user as $user) {
					$emp_type_user = $user->emp_type_user;
				}
				if($query_user){
					// มีข้อมูล ดำเนินการ check login
					$check = $this->employee->_loginUser($username,$password);
					if($check){
						// เก็บข้อมูล Log //
						$this->load->model('Log_model','logme'); // Load Model Log
						$ip_address = $_SERVER['REMOTE_ADDR']; // เก็บ IP Address
						$type_log = "login";
						$this->logme->_AddLog($username,$type_log,$emp_type_user,$ip_address);
						// เก็บ Log เสร็จสิ้น //

						$data_member = array(
						'username_member' => $username,
						'type_user' => $emp_type_user,
						'logged_member'   => TRUE,
						);
						$this->session->set_userdata($data_member); // สร้างตัวแปร Session
							
							redirect('member/dashboard'); // ไปหน้า dashboard
				
					} else {
						$this->session->set_flashdata('msg_error','Username or Password is wrong!');
						redirect('welcome');
					}
					
				} else {

				}

	}



}