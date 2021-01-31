<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Config_area extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
        $this->load->library('session','database');
        $this->load->model('Area_model','marea');
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
		$data['data_area'] = $this->marea->_getAll();
		$data['count_area'] = $this->marea->_count_area();

		$this->load->view('member/view_config_area',$data);
	}

	public function data_add_area()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

		// รับข้อมูลมาใช้งาน
		$area_name = $this->input->post("area_name");

		// ตรวจสอบข้อมูลว่ากรอกมาแล้วหรือยัง
		if(empty($area_name) or $area_name==""){

			$this->session->set_flashdata('msg_error',' Please fill out all information.');
					redirect('member/config_area');
			
		} else {
			// ดำเนินการบันทึกข้อมูลได้
			$update_data = $this->marea->_add_area($area_name);
			
				if($update_data=="same") {
					// ซ้ำ
					$this->session->set_flashdata('msg_warning',' Data is exist. Please try again.');
						redirect('member/config_area');

				} else if($update_data=="success") {
					// success
					$this->session->set_flashdata('msg_ok',' Successfully');
						redirect('member/config_area');

				} else  if($update_data=="false") {
					// false / error
					$this->session->set_flashdata('msg_error',' Error! Please contact admin.');
						redirect('member/config_area');
				}

		}

		// ค่าทั่วไปของเว็บ
		$this->load->model('Settingme','me');
		$data['setting_web'] = $this->me->_getall();

		
	}

	public function edit_area()
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
		$id_area = $this->uri->segment(4);

		// Check Data
		if($id_area=="" or empty($id_area)){
			$this->session->set_flashdata('msg_warning',' Not found data. Please try again.');
					redirect('member/config_area');
		} else {
			// ดึงข้อมูล Area มาใช้งาน
			$data['query_data'] = $this->marea->_get_area_by_id($id_area);
			
			$this->load->view('member/edit_area',$data);

		}

	}

	public function data_edit_area()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

		// รับข้อมูลมาใช้งาน
		$id_area = $this->input->post("id_area");
		$area_name = $this->input->post("area_name");

		// ตรวจสอบข้อมูลว่ากรอกมาแล้วหรือยัง
		if(empty($id_area) or $id_area=="" or empty($area_name) or $area_name==""){

			$this->session->set_flashdata('msg_error',' Please fill out all information.');
					redirect('member/config_area');

		} else {
			// ดำเนินการบันทึกข้อมูลได้
			$update_data = $this->marea->_edit_area($id_area,$area_name);
			// return -> success , false , same , error
			
			//echo $update_data;
				if($update_data=="same") {
					// ซ้ำ
					$this->session->set_flashdata('msg_warning',' Same Data. Please try again.');
						redirect('member/config_area');

				} else if($update_data=="success") {
					// success
					$this->session->set_flashdata('msg_ok',' Edit Data Success.');
						redirect('member/config_area');

				} else  if($update_data=="false") {
					// false / error
					$this->session->set_flashdata('msg_error',' Error! Please contact admin.');
						redirect('member/config_area');
				} else {
					// Error
					$this->session->set_flashdata('msg_error',' Error! Please try again.');
						redirect('member/config_area');
				}

		}
	}

	public function delete_area()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

		// รับข้อมูลมาใช้งาน
		$id_area = $this->uri->segment(4);
		
		// Check Data
		if($id_area=="" or empty($id_area)){
			$this->session->set_flashdata('msg_warning',' Not found data. Please try again.');
					redirect('member/config_area');
		} else {
			// ถ้ามีขอมูล ดำเนินการลบข้อมูล
			$query = $this->marea->_delete_area($id_area);
			
				if($query=="empty") {
					// ซ้ำ same
					$this->session->set_flashdata('msg_warning',' Empty data. Please try again.');
						redirect('member/config_area');

				} else if($query=="true") {
					// success
					$this->session->set_flashdata('msg_ok',' Delete Success.');
						redirect('member/config_area');

				} else  if($query=="false") {
					// false / error
					$this->session->set_flashdata('msg_error',' Error! Please contact admin.');
						redirect('member/config_area');
				}
		}
	}

}