<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Config_product_type extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('session','database');
		$this->load->model('Product_type_model','products');
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
		$data['data_product_type'] = $this->products->_get_product_type();
		$data['count_product_type'] = $this->products->_count_product_type();

		$this->load->view('member/view_config_product_type',$data);
	}

	public function data_add_product_type()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

		// รับข้อมูลมาใช้งาน
		$product_type_name = $this->input->post("product_type_name");

		// ตรวจสอบข้อมูลว่ากรอกมาแล้วหรือยัง
		if(empty($product_type_name) or $product_type_name==""){

			$this->session->set_flashdata('msg_error',' กรุณากรอกข้อมูลให้ครบถ้วน');
					redirect('member/config_product_type');
			
		} else {
			// ดำเนินการบันทึกข้อมูลได้
			$add_user = $this->products->_add_product_type($product_type_name);
			
				if($add_user=="same") {
					// ซ้ำ
					$this->session->set_flashdata('msg_warning',' Data is exist. Please try again.');
						redirect('member/config_product_type');

				} else if($add_user=="success") {
					// success
					$this->session->set_flashdata('msg_ok','Successfully. Saved data.');
						redirect('member/config_product_type');

				} else  if($add_user=="false") {
					// false / error
					$this->session->set_flashdata('msg_error',' Error! Please contact admin.');
						redirect('member/config_product_type');
				}

		}

		
	}

	public function delete_product_type()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

		// รับข้อมูลมาใช้งาน
		$product_type_id = $this->uri->segment(4);
		
		// Check Data
		if($product_type_id=="" or empty($product_type_id)){
			$this->session->set_flashdata('msg_warning',' Not found data. Please try again.');
					redirect('member/config_product_type');
		} else {
			// ถ้ามีขอมูล ดำเนินการลบข้อมูล
			$query = $this->products->_delete_product_type($product_type_id);
			
				if($query=="empty") {
					// ซ้ำ same
					$this->session->set_flashdata('msg_warning',' Empty data. Please try again.');
						redirect('member/config_product_type');

				} else if($query=="true") {
					// success
					$this->session->set_flashdata('msg_ok',' Delete Success.');
						redirect('member/config_product_type');

				} else  if($query=="false") {
					// false / error
					$this->session->set_flashdata('msg_error',' Error! Please contact admin.');
						redirect('member/config_product_type');
				}
		}
	}

	public function edit_product_type()
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
		$product_type_id = $this->uri->segment(4);

		// Check Data
		if($product_type_id=="" or empty($product_type_id)){
			$this->session->set_flashdata('msg_warning',' Not found data. Please try again.');
					redirect('member/config_user_type');
		} else {
			// แสดงข้อมูลเพื่อแก้ไข

			// ดึงข้อมูล Machine Type มาใช้งาน
			$data['query_product_type'] = $this->products->_query_product_type($product_type_id);
			
			$this->load->view('member/edit_config_product_type',$data);

		}

	}

	public function data_edit_product_type()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

		// รับข้อมูลมาใช้งาน
		$product_type_id = $this->input->post("product_type_id");
		$product_type_name = $this->input->post("product_type_name");

		// ตรวจสอบข้อมูลว่ากรอกมาแล้วหรือยัง
		if(empty($product_type_id) or $product_type_id=="" or empty($product_type_name) or $product_type_name==""){

			$this->session->set_flashdata('msg_error',' Not found data. Please try again.');
					redirect('member/config_product_type');

		} else {
			// ดำเนินการบันทึกข้อมูลได้
			$update_data = $this->products->_edit_product_type($product_type_id,$product_type_name);
			// return -> success , false , same , error
			
				if($update_data=="same") {
					// ซ้ำ
					$this->session->set_flashdata('msg_warning',' Same Data. Please try again.');
						redirect('member/config_product_type');

				} else if($update_data=="success") {
					// success
					$this->session->set_flashdata('msg_ok',' Edit Data Success.');
						redirect('member/config_product_type');

				} else  if($update_data=="false") {
					// false / error
					$this->session->set_flashdata('msg_error',' Error! Please contact admin.');
						redirect('member/config_product_type');
				} else {
					// Error
					$this->session->set_flashdata('msg_error',' Error! Please try again.');
						redirect('member/config_product_type');
				}

		}
	}



}