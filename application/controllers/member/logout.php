<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {

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
        // Load User
        $this->load->model('User_model','user');

		// รับข้อมูลมา
        $user_logout = $this->session->userdata('username_member');
            foreach ($user_logout as $aaa) {
                $type_user = $aaa->type_user;
                $username_member = $aaa->username_member;
            }

		// เก็บข้อมูล Log //
		$this->load->model('Log_model','logme'); // Load Model Log
		$ip_address = $_SERVER['REMOTE_ADDR']; // เก็บ IP Address
		$type_log = "logout";
		$this->logme->_AddLog($user_logout,$type_log,$user_logout,$ip_address);
		// เก็บ Log เสร็จสิ้น //

		// Logout now
        $logoutnewdata = array(
                   'username_member'  => $user_logout,
                   'type_user' => $type_user,
					'logged_member' => TRUE,
               );

		$this->session->unset_userdata($logoutnewdata);
		//$this->session->sess_destroy();
		redirect('member/login');
	}



}