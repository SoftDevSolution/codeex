<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Config_factory_group extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('session','database');
		$this->load->model('Company_model','company');
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

		// ดึงข้อมูล Factory Group มาใช้งาน
		$data['query_factory_group'] = $this->company->_get_factory_group();
		$data['count_factory_group'] = $this->company->_count_factory_group();

		$this->load->view('member/view_config_factory_group',$data);
	}

	public function data_add_factory_group()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

		// รับข้อมูลมาใช้งาน
		$name_factory_group = $this->input->post("name_factory_group");

		// ตรวจสอบข้อมูลว่ากรอกมาแล้วหรือยัง
		if(empty($name_factory_group) or $name_factory_group==""){

			$this->session->set_flashdata('msg_error',' กรุณากรอกข้อมูลให้ครบถ้วน');
					redirect('member/config_factory_group');
			
		} else {
			// ดำเนินการบันทึกข้อมูลได้
			$add_user = $this->company->_add_factory_group($name_factory_group);
			
				if($add_user=="same") {
					// ซ้ำ
					$this->session->set_flashdata('msg_warning',' Data is exist. Please try again.');
						redirect('member/config_factory_group');

				} else if($add_user=="success") {
					// success
					$this->session->set_flashdata('msg_ok','Successfully. Saved data.');
						redirect('member/config_factory_group');

				} else  if($add_user=="false") {
					// false / error
					$this->session->set_flashdata('msg_error',' Error! Please contact admin.');
						redirect('member/config_factory_group');
				}

		}

		
	}

	public function edit_factory_group()
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

		// รับค่ามาแก้ไข
		$id_factory_group = $this->uri->segment(4);

		// ดึงข้อมูล Factory Group มาใช้งาน
		$data['query_factory_group'] = $this->company->_query_factory_group($id_factory_group);

		$this->load->view('member/edit_factory_group',$data);
	}

	public function edit_data_factory_group()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

		// รับข้อมูลมาใช้งาน
		$id_factory_group = $this->input->post("id_factory_group");
		$name_factory_group = $this->input->post("name_factory_group");

		// ตรวจสอบข้อมูลว่ากรอกมาแล้วหรือยัง
		if(empty($id_factory_group) or $id_factory_group=="" or empty($name_factory_group) or $name_factory_group==""){

			$this->session->set_flashdata('msg_error',' Not found data. Please try again.');
					redirect('member/config_factory_group');

		} else {
			// ดำเนินการบันทึกข้อมูลได้
			$update_data = $this->company->_edit_factory_group($id_factory_group,$name_factory_group);
			// return -> success , false , same , error
			
				if($update_data=="same") {
					// ซ้ำ
					$this->session->set_flashdata('msg_warning',' Same Data. Please try again.');
						redirect('member/config_factory_group');

				} else if($update_data=="success") {
					// success
					$this->session->set_flashdata('msg_ok',' Edit Data Success.');
						redirect('member/config_factory_group');

				} else  if($update_data=="false") {
					// false / error
					$this->session->set_flashdata('msg_error',' Error! Please contact admin.');
						redirect('member/config_factory_group');
				} else {
					// Error
					$this->session->set_flashdata('msg_error',' Error! Please try again.');
						redirect('member/config_factory_group');
				}

		}
	}

	public function delete_factory_group()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

		// รับข้อมูลมาใช้งาน
		$id_factory_group = $this->uri->segment(4);
		
		// Check Data
		if($id_factory_group=="" or empty($id_factory_group)){
			$this->session->set_flashdata('msg_warning',' Not found data. Please try again.');
					redirect('member/config_factory_group');
		} else {
			// ถ้ามีขอมูล ดำเนินการลบข้อมูล
			$query = $this->company->_delete_factory_group($id_factory_group);
			
				if($query=="empty") {
					// ซ้ำ same
					$this->session->set_flashdata('msg_warning',' Empty data. Please try again.');
						redirect('member/config_factory_group');

				} else if($query=="true") {
					// success
					$this->session->set_flashdata('msg_ok',' Delete Success.');
						redirect('member/config_factory_group');

				} else  if($query=="false") {
					// false / error
					$this->session->set_flashdata('msg_error',' Error! Please contact admin.');
						redirect('member/config_factory_group');
				}
		}
	}

}