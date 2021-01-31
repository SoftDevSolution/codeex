<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Config_user_position extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('session','database');
		$this->load->model('Employee_model','employee');
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

		// ดึงข้อมูล position มาใช้งาน
		$data['data_position'] = $this->employee->_getAll_position();

		$data['count_position'] = $this->employee->_count_position();

		$this->load->view('member/view_config_user_position',$data);
	}

	public function data_add_position()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

		// รับข้อมูลมาใช้งาน
		$position_name = $this->input->post("position_name");

		// ตรวจสอบข้อมูลว่ากรอกมาแล้วหรือยัง
		if(empty($position_name) or $position_name==""){

			$this->session->set_flashdata('msg_error',' Not found data. Please try again.');
					redirect('member/config_user_position');
			
		} else {
			// ดำเนินการบันทึกข้อมูลได้
			$update_data = $this->employee->_add_position($position_name);
			
				if($update_data=="same") {
					// ซ้ำ
					$this->session->set_flashdata('msg_warning',' Data is exist. Please try again.');
						redirect('member/config_user_position');

				} else if($update_data=="success") {
					// success
					$this->session->set_flashdata('msg_ok',' Successfully');
						redirect('member/config_user_position');

				} else  if($update_data=="false") {
					// false / error
					$this->session->set_flashdata('msg_error',' Error! Please contact admin.');
						redirect('member/config_user_position');
				}

		}

		// ค่าทั่วไปของเว็บ
		$this->load->model('Settingme','me');
		$data['setting_web'] = $this->me->_getall();

		
	}

	public function delete_user_position()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

		// รับข้อมูลมาใช้งาน
		$position_id = $this->uri->segment(4);
		
		// Check Data
		if($position_id=="" or empty($position_id)){
			$this->session->set_flashdata('msg_warning',' ไม่พบข้อมูลที่คุณต้องการ');
					redirect('member/config_user_position');
		} else {
			// ถ้ามีขอมูล ดำเนินการลบข้อมูล
			$query = $this->employee->_delete_machine_position($position_id);
			
				if($query=="empty") {
					// ซ้ำ same
					$this->session->set_flashdata('msg_warning',' Empty data. Please try again.');
						redirect('member/config_user_position');

				} else if($query=="true") {
					// success
					$this->session->set_flashdata('msg_ok',' Delete Success.');
						redirect('member/config_user_position');

				} else  if($query=="false") {
					// false / error
					$this->session->set_flashdata('msg_error',' Error! Please contact admin.');
						redirect('member/config_user_position');
				}
		}
	}

	public function edit_user_position()
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

		// รับข้อมูลมาใช้งาน
		$position_id = $this->uri->segment(4);

		// Check Data
		if($position_id=="" or empty($position_id)){
			$this->session->set_flashdata('msg_warning',' Empty data. Please try again.');
					redirect('member/config_user_position');
		} else {
			// แสดงข้อมูลเพื่อแก้ไข

			// ดึงข้อมูล Machine Type มาใช้งาน
			$data['get_data_machine_position'] = $this->employee->_query_user_position($position_id);
			
			$this->load->view('member/edit_config_user_position',$data);

		}

	}

	public function edit_data_config_user_position()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

		// รับข้อมูลมาใช้งาน
		$position_id = $this->input->post("position_id");
		$position_name = $this->input->post("position_name");

		// ตรวจสอบข้อมูลว่ากรอกมาแล้วหรือยัง
		if(empty($position_id) or $position_name==""){

			$this->session->set_flashdata('msg_error',' กรุณากรอกข้อมูลให้ครบถ้วน');
					redirect('member/config_machine_position');

		} else {
			// ดำเนินการบันทึกข้อมูลได้
			$update_data = $this->employee->_edit_user_position($position_id,$position_name);
			// return -> success , false , same , error
			
			//echo $update_data;
				if($update_data=="same") {
					// ซ้ำ
					$this->session->set_flashdata('msg_warning',' Same Data. Please try again.');
						redirect('member/config_user_position');

				} else if($update_data=="success") {
					// success
					$this->session->set_flashdata('msg_ok',' Edit Data Success.');
						redirect('member/config_user_position');

				} else  if($update_data=="false") {
					// false / error
					$this->session->set_flashdata('msg_error',' Error! Please contact admin.');
						redirect('member/config_user_position');
				} else {
					// Error
					$this->session->set_flashdata('msg_error',' Error! Please try again.');
						redirect('member/config_user_position');
				}

		}
	}



}