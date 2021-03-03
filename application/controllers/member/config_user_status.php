<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Config_user_status extends CI_Controller {

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
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

 		// Agent_Data
		$username_member = $this->session->userdata('username_member');
		$data['username_member'] = $this->user->_getmember($username_member);

		// ค่าทั่วไปของเว็บ
		$this->load->model('Settingme','me');
		$data['setting_web'] = $this->me->_getall();

		// Load Model Machine
		$this->load->model('Employee_model','employee');

		// ดึงข้อมูล User Status มาใช้งาน
		$data['data_user_status'] = $this->employee->_get_user_status();
		$data['count_user_status'] = $this->employee->_count_user_status();

		$this->load->view('member/view_config_user_status',$data);
	}

	public function data_add_user_status()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

		// Load Employee_model
		$this->load->model('Employee_model','employee');

		// รับข้อมูลมาใช้งาน
		$user_status_name = $this->input->post("user_status_name");

		// ตรวจสอบข้อมูลว่ากรอกมาแล้วหรือยัง
		if(empty($user_status_name) or $user_status_name==""){

			$this->session->set_flashdata('msg_error',' กรุณากรอกข้อมูลให้ครบถ้วน');
					redirect('member/config_user_status');
			
		} else {
			// ดำเนินการบันทึกข้อมูลได้
			$add_user = $this->employee->_add_user_status($user_status_name);
			
				if($add_user=="same") {
					// ซ้ำ
					$this->session->set_flashdata('msg_warning',' Data is exist. Please try again.');
						redirect('member/config_user_status');

				} else if($add_user=="success") {
					// success
					$this->session->set_flashdata('msg_ok','Successfully. Saved data.');
						redirect('member/config_user_status');

				} else  if($add_user=="false") {
					// false / error
					$this->session->set_flashdata('msg_error',' Error! Please contact admin.');
						redirect('member/config_user_status');
				}

		}

		
	}

	public function delete_user_status()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

		// Load Employee_model
		$this->load->model('Employee_model','employee');

		// รับข้อมูลมาใช้งาน
		$user_status_id = $this->uri->segment(4);
		
		// Check Data
		if($user_status_id=="" or empty($user_status_id)){
			$this->session->set_flashdata('msg_warning',' Not found data. Please try again.');
					redirect('member/config_user_status');
		} else {
			// ถ้ามีขอมูล ดำเนินการลบข้อมูล
			$query = $this->employee->_delete_user_status($user_status_id);
			
				if($query=="empty") {
					// ซ้ำ same
					$this->session->set_flashdata('msg_warning',' Empty data. Please try again.');
						redirect('member/config_user_status');

				} else if($query=="true") {
					// success
					$this->session->set_flashdata('msg_ok',' Delete Success.');
						redirect('member/config_user_status');

				} else  if($query=="false") {
					// false / error
					$this->session->set_flashdata('msg_error',' Error! Please contact admin.');
						redirect('member/config_user_status');
				}
		}
	}

	public function edit_user_status()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

 		// Agent_Data
		$username_member = $this->session->userdata('username_member');
		$data['username_member'] = $this->user->_getmember($username_member);

		// ค่าทั่วไปของเว็บ
		$this->load->model('Settingme','me');
		$data['setting_web'] = $this->me->_getall();

		// Load Employee_model
		$this->load->model('Employee_model','employee');

		// รับข้อมูลมาใช้งาน
		$user_status_id = $this->uri->segment(4);

		// Check Data
		if($user_status_id=="" or empty($user_status_id)){
			$this->session->set_flashdata('msg_warning',' Not found data. Please try again.');
					redirect('member/config_user_type');
		} else {
			// แสดงข้อมูลเพื่อแก้ไข

			// ดึงข้อมูล Machine Type มาใช้งาน
			$data['get_data_user_status'] = $this->employee->_get_user_status_from_id($user_status_id);
			
			$this->load->view('member/edit_config_user_status',$data);

		}

	}

	public function edit_data_config_user_status()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

		// Load Employee_model
		$this->load->model('Employee_model','employee');

		// รับข้อมูลมาใช้งาน
		$user_status_id = $this->input->post("user_status_id");
		$user_status_name = $this->input->post("user_status_name");

		// ตรวจสอบข้อมูลว่ากรอกมาแล้วหรือยัง
		if(empty($user_status_name) or $user_status_name==""){

			$this->session->set_flashdata('msg_error',' Not found data. Please try again.');
					redirect('member/config_user_status');

		} else {
			// ดำเนินการบันทึกข้อมูลได้
			$update_data = $this->employee->_edit_user_status($user_status_id,$user_status_name);
			// return -> success , false , same , error
			
				if($update_data=="same") {
					// ซ้ำ
					$this->session->set_flashdata('msg_warning',' Data is exist. Please try again.');
						redirect('member/config_user_status');

				} else if($update_data=="success") {
					// success
					$this->session->set_flashdata('msg_ok',' Edit Data Success.');
						redirect('member/config_user_status');

				} else  if($update_data=="false") {
					// false / error
					$this->session->set_flashdata('msg_error',' Error! Please contact admin.');
						redirect('member/config_user_status');
				} else {
					// Error
					$this->session->set_flashdata('msg_error',' Error! Please try again.');
						redirect('member/config_user_status');
				}

		}
	}



}