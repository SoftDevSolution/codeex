<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Config_machine_brand extends CI_Controller {

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
		$this->load->model('Machine_brand_model','machine');

		// ดึงข้อมูล Machine Type มาใช้งาน
		$data['data_machine_brand'] = $this->machine->_get_machine_brand_AllData();

		$data['count_machine_brand'] = $this->machine->_count_machine_brand();

		$this->load->view('member/view_config_machine_brand',$data);
	}

	public function add_config_machine_brand()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

		// Load Model Machine
		$this->load->model('Machine_brand_model','machine');

		// รับข้อมูลมาใช้งาน
		$brand_name = $this->input->post("model_name");

		// ตรวจสอบข้อมูลว่ากรอกมาแล้วหรือยัง
		if(empty($brand_name) or $brand_name==""){

			$this->session->set_flashdata('msg_error',' กรุณากรอกข้อมูลให้ครบถ้วน');
					redirect('member/config_machine_brand');
			
		} else {
			// ดำเนินการบันทึกข้อมูลได้
			$update_data = $this->machine->_add_machine_brand($brand_name);
			
				if($update_data=="same") {
					// ซ้ำ
					$this->session->set_flashdata('msg_warning',' ข้อมูลซ้ำ กรุณาลองใหม่อีกครั้ง');
						redirect('member/config_machine_brand');

				} else if($update_data=="success") {
					// success
					$this->session->set_flashdata('msg_ok',' บันทึกข้อมูลเรียบร้อย');
						redirect('member/config_machine_brand');

				} else  if($update_data=="false") {
					// false / error
					$this->session->set_flashdata('msg_error',' Error! Please contact admin.');
						redirect('member/config_machine_brand');
				}

		}

		// ค่าทั่วไปของเว็บ
		$this->load->model('Settingme','me');
		$data['setting_web'] = $this->me->_getall();

		
	}

	public function delete_machine_brand()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

		// Load Model Machine
		$this->load->model('Machine_brand_model','machine');

		// รับข้อมูลมาใช้งาน
		$brand_id = $this->uri->segment(4);
		
		// Check Data
		if($brand_id=="" or empty($brand_id)){
			$this->session->set_flashdata('msg_warning',' ไม่พบข้อมูลที่คุณต้องการ');
					redirect('member/config_machine_brand');
		} else {
			// ถ้ามีขอมูล ดำเนินการลบข้อมูล
			$query = $this->machine->_delete_machine_brand($brand_id);
			
				if($query=="empty") {
					// ซ้ำ same
					$this->session->set_flashdata('msg_warning',' Empty data. Please try again.');
						redirect('member/config_machine_brand');

				} else if($query=="true") {
					// success
					$this->session->set_flashdata('msg_ok',' Delete Success.');
						redirect('member/config_machine_brand');

				} else  if($query=="false") {
					// false / error
					$this->session->set_flashdata('msg_error',' Error! Please contact admin.');
						redirect('member/config_machine_brand');
				}
		}
	}

	public function edit_machine_brand()
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
		$this->load->model('Machine_brand_model','machine');

		// รับข้อมูลมาใช้งาน
		$brand_id = $this->uri->segment(4);

		// Check Data
		if($brand_id=="" or empty($brand_id)){
			$this->session->set_flashdata('msg_warning',' ไม่พบข้อมูลที่คุณต้องการ');
					redirect('member/config_machine_brand');
		} else {
			// แสดงข้อมูลเพื่อแก้ไข

			// ดึงข้อมูล Machine Type มาใช้งาน
			$data['get_data_machine_brand'] = $this->machine->_query_machine_brand($brand_id);
			
			$this->load->view('member/edit_config_machine_brand',$data);

		}

	}

	public function edit_data_config_machine_brand()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

		// Load Model Machine
		$this->load->model('Machine_brand_model','machine');

		// รับข้อมูลมาใช้งาน
		$brand_id = $this->input->post("brand_id");
		$brand_name = $this->input->post("brand_name");

		// ตรวจสอบข้อมูลว่ากรอกมาแล้วหรือยัง
		if(empty($brand_name) or $brand_name==""){

			$this->session->set_flashdata('msg_error',' กรุณากรอกข้อมูลให้ครบถ้วน');
					redirect('member/config_machine_brand');

		} else {
			// ดำเนินการบันทึกข้อมูลได้
			$update_data = $this->machine->_edit_machine_brand($brand_id,$brand_name);
			// return -> success , false , same , error
			
			//echo $update_data;
				if($update_data=="same") {
					// ซ้ำ
					$this->session->set_flashdata('msg_warning',' Same Data. Please try again.');
						redirect('member/config_machine_brand');

				} else if($update_data=="success") {
					// success
					$this->session->set_flashdata('msg_ok',' Edit Data Success.');
						redirect('member/config_machine_brand');

				} else  if($update_data=="false") {
					// false / error
					$this->session->set_flashdata('msg_error',' Error! Please contact admin.');
						redirect('member/config_machine_brand');
				} else {
					// Error
					$this->session->set_flashdata('msg_error',' Error! Please try again.');
						redirect('member/config_machine_brand');
				}

		}
	}



}