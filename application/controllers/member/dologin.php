<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dologin extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('session','database');
	}

	private function checkMember_isvalidated(){  // Check Login status
			if(!$this->session->userdata('username_member')){
					redirect('member/login');
			}
	}
	
	public function index()
	{
		$this->load->model('User_model','user');

		// Get data
		// $reCaptcha = $this->input->post('g-recaptcha-response'); // g-recaptcha-response

		// if ($reCaptcha=="" or empty($reCaptcha))  //ถ้าหากผลการค้นหามีค่ามากกว่า 0 แสดงว่าผู้ใช้พิมพ์อักษรถูกต้องครับ
		// {
		// 	$this->session->set_flashdata('msg_error','Google Captcha is wrong!');
		// 	redirect('welcome');

		// } else {
			// Captcha ถูกต้อง

			$username = $this->input->post("username_member");
			$password = $this->input->post("password_member");
			$type_user = $this->input->post("type_user");

			$check = $this->user->_loginmember($username,$password,$type_user);
			if($check){

				// เก็บข้อมูล Log //
				$this->load->model('Log_model','logme'); // Load Model Log
				$ip_address = $_SERVER['REMOTE_ADDR']; // เก็บ IP Address
				$type_log = "login";
				$this->logme->_AddLog($username,$type_log,$type_user,$ip_address);
				// เก็บ Log เสร็จสิ้น //

				$data_member = array(
				'username_member' => $username,
				'type_user' => $type_user,
				'logged_member'   => TRUE,
				);
				$this->session->set_userdata($data_member); // สร้างตัวแปร Session

					redirect('member/dashboard'); // เด้งไปหน้า Dashboard => th
		
			} else {
				$this->session->set_flashdata('msg_error','Username or Password is wrong!');
				redirect('welcome');
			}

		// }  
	}



}