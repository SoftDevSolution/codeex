<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Config_industrial_estate extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
        $this->load->library('session','database');
        $this->load->model('Industrial_estate_model','estate');
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

		// ดึงข้อมูล Machine Type มาใช้งาน
		$data['data_industrial_estate'] = $this->estate->_getAll();
		$data['count_industrial_estate'] = $this->estate->_count_industrial_estate();

		$this->load->view('member/view_config_industrial_estate',$data);
	}

	public function data_add_industrial_estate()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

		// รับข้อมูลมาใช้งาน
		$name_industrial_estate = $this->input->post("name_industrial_estate");

		// ตรวจสอบข้อมูลว่ากรอกมาแล้วหรือยัง
		if(empty($name_industrial_estate) or $name_industrial_estate==""){

			$this->session->set_flashdata('msg_error',' Please fill out all information.');
					redirect('member/config_industrial_estate');
			
		} else {
			// ดำเนินการบันทึกข้อมูลได้
			$update_data = $this->estate->_add_industrial_estate($name_industrial_estate);
			
				if($update_data=="same") {
					// ซ้ำ
					$this->session->set_flashdata('msg_warning',' Data is exist. Please try again.');
						redirect('member/config_industrial_estate');

				} else if($update_data=="success") {
					// success
					$this->session->set_flashdata('msg_ok',' Successfully');
						redirect('member/config_industrial_estate');

				} else  if($update_data=="false") {
					// false / error
					$this->session->set_flashdata('msg_error',' Error! Please contact admin.');
						redirect('member/config_industrial_estate');
				}

		}

		// ค่าทั่วไปของเว็บ
		$this->load->model('Settingme','me');
		$data['setting_web'] = $this->me->_getall();

		
	}

	public function edit_industrial_estate()
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
		$id_industrial_estate = $this->uri->segment(4);

		// Check Data
		if($id_industrial_estate=="" or empty($id_industrial_estate)){
			$this->session->set_flashdata('msg_warning',' Not found data. Please try again.');
					redirect('member/config_industrial_estate');
		} else {
			// ดึงข้อมูล Area มาใช้งาน
			$data['query_data'] = $this->estate->_get_industrial_estate_by_id($id_industrial_estate);
			
			$this->load->view('member/edit_industrial_estate',$data);

		}

	}

	public function data_edit_industrial_estate()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

		// รับข้อมูลมาใช้งาน
		$id_industrial_estate = $this->input->post("id_industrial_estate");
		$name_industrial_estate = $this->input->post("name_industrial_estate");

		// ตรวจสอบข้อมูลว่ากรอกมาแล้วหรือยัง
		if(empty($id_industrial_estate) or $id_industrial_estate=="" or empty($name_industrial_estate) or $name_industrial_estate==""){

			$this->session->set_flashdata('msg_error',' Please fill out all information.');
					redirect('member/config_industrial_estate');

		} else {
			// ดำเนินการบันทึกข้อมูลได้
			$update_data = $this->estate->_edit_area($id_industrial_estate,$name_industrial_estate);
			// return -> success , false , same , error
			
			//echo $update_data;
				if($update_data=="same") {
					// ซ้ำ
					$this->session->set_flashdata('msg_warning',' Same Data. Please try again.');
						redirect('member/config_industrial_estate');

				} else if($update_data=="success") {
					// success
					$this->session->set_flashdata('msg_ok',' Edit Data Success.');
						redirect('member/config_industrial_estate');

				} else  if($update_data=="false") {
					// false / error
					$this->session->set_flashdata('msg_error',' Error! Please contact admin.');
						redirect('member/config_industrial_estate');
				} else {
					// Error
					$this->session->set_flashdata('msg_error',' Error! Please try again.');
						redirect('member/config_industrial_estate');
				}

		}
	}

	public function delete_industrial_estate()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

		// รับข้อมูลมาใช้งาน
		$id_industrial_estate = $this->uri->segment(4);
		
		// Check Data
		if($id_industrial_estate=="" or empty($id_industrial_estate)){
			$this->session->set_flashdata('msg_warning',' Not found data. Please try again.');
					redirect('member/config_industrial_estate');
		} else {
			// ถ้ามีขอมูล ดำเนินการลบข้อมูล
			$query = $this->estate->_delete_industrial_estate($id_industrial_estate);
			
				if($query=="empty") {
					// ซ้ำ same
					$this->session->set_flashdata('msg_warning',' Empty data. Please try again.');
						redirect('member/config_industrial_estate');

				} else if($query=="true") {
					// success
					$this->session->set_flashdata('msg_ok',' Delete Success.');
						redirect('member/config_industrial_estate');

				} else  if($query=="false") {
					// false / error
					$this->session->set_flashdata('msg_error',' Error! Please contact admin.');
						redirect('member/config_industrial_estate');
				}
		}
	}

}