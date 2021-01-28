<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class visitor extends CI_Controller {

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
		$this->load->model('Visitor_model','machine');

		// ดึงข้อมูล Machine Type มาใช้งาน
		$data['data_visitor'] = $this->machine->_get_visitor_AllData();

		$data['count_visitor'] = $this->machine->_count_visitor();

		$this->load->view('member/view_visitor',$data);
	}

	public function add_data_visitor()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

		// Load Model Machine
		$this->load->model('Visitor_model','machine');

		// รับข้อมูลมาใช้งาน
		//$vs_id  = $this->input->post("vs_id ");
		$vs_name = $this->input->post("vs_name");
		$vs_address = $this->input->post("vs_address");
		$vs_company = $this->input->post("vs_company");
		$vs_position = $this->input->post("vs_position");
		$vs_branch = $this->input->post("vs_branch");
		$vs_tel_1 = $this->input->post("vs_tel_1");
		$vs_tel_2 = $this->input->post("vs_tel_2");
		$vs_tel_main = $this->input->post("vs_tel_main");
		$vs_mobile_phone = $this->input->post("vs_mobile_phone");
		$vs_email = $this->input->post("vs_email");
		$vs_email_personal = $this->input->post("vs_email_personal");


		// ตรวจสอบข้อมูลว่ากรอกมาแล้วหรือยัง
		if(empty($vs_name) or $vs_name==""){

			$this->session->set_flashdata('msg_error',' กรุณากรอกข้อมูลให้ครบถ้วน');
					redirect('member/visitor');
			
		} else {
			// ดำเนินการบันทึกข้อมูลได้
			$update_data = $this->machine->_add_visitor($vs_name,
														$vs_address,
														$vs_company,
														$vs_position,
														$vs_branch,
														$vs_tel_1,
														$vs_tel_2,
														$vs_tel_main,
														$vs_mobile_phone,
														$vs_email,
														$vs_email_personal);
			
				if($update_data=="same") {
					// ซ้ำ
					$this->session->set_flashdata('msg_warning',' ข้อมูลซ้ำ กรุณาลองใหม่อีกครั้ง');
						redirect('member/visitor');

				} else if($update_data=="success") {
					// success
					$this->session->set_flashdata('msg_ok',' บันทึกข้อมูลเรียบร้อย');
						redirect('member/visitor');

				} else  if($update_data=="false") {
					// false / error
					$this->session->set_flashdata('msg_error',' Error! Please contact admin.');
						redirect('member/visitor');
				}

		}

		// ค่าทั่วไปของเว็บ
		$this->load->model('Settingme','me');
		$data['setting_web'] = $this->me->_getall();

		
	}

	public function delete_data_visitor()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

		// Load Model Machine
		$this->load->model('Visitor_model','machine');

		// รับข้อมูลมาใช้งาน
		$vs_id = $this->uri->segment(4);
		
		
		// Check Data
		if($vs_id =="" or empty($vs_id)){
			$this->session->set_flashdata('msg_warning',' ไม่พบข้อมูลที่คุณต้องการ');
					redirect('member/visitor');
		} else {
			// ถ้ามีขอมูล ดำเนินการลบข้อมูล
			$query = $this->machine->_delete_visitor($vs_id);
			
				if($query=="empty") {
					// ซ้ำ same
					$this->session->set_flashdata('msg_warning',' Empty data. Please try again.');
						redirect('member/visitor');

				} else if($query=="true") {
					// success
					$this->session->set_flashdata('msg_ok',' Delete Success.');
						redirect('member/visitor');

				} else  if($query=="false") {
					// false / error
					$this->session->set_flashdata('msg_error',' Error! Please contact admin.');
						redirect('member/visitor');
				}
		}
	}

	public function edit_visitor()
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
		$this->load->model('Visitor_model','machine');

		// รับข้อมูลมาใช้งาน
		$vs_id = $this->uri->segment(4);

		// Check Data
		if($vs_id=="" or empty($vs_id)){
			$this->session->set_flashdata('msg_warning',' ไม่พบข้อมูลที่คุณต้องการ');
					redirect('member/visitor');
		} else {
			// แสดงข้อมูลเพื่อแก้ไข

			// ดึงข้อมูล Machine Type มาใช้งาน
			$data['get_data_visitor'] = $this->machine->_query_visitor($vs_id);
			
			$this->load->view('member/edit_visitor',$data);

		}

	}

	public function edit_data_visitor()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

		// Load Model Machine
		$this->load->model('Visitor_model','machine');

		// รับข้อมูลมาใช้งาน
		$vs_id = $this->input->post('vs_id');
		$vs_name = $this->input->post('vs_name');
		$vs_address = $this->input->post('vs_address');
		$vs_company = $this->input->post('vs_company');
		$vs_position = $this->input->post('vs_position');
		$vs_branch = $this->input->post('vs_branch');
		$vs_tel_1 = $this->input->post('vs_tel_1');
		$vs_tel_2 = $this->input->post('vs_tel_2');
		$vs_tel_main = $this->input->post('vs_tel_main');
		$vs_mobile_phone = $this->input->post('vs_mobile_phone');
		$vs_email = $this->input->post('vs_email');
		$vs_email_personal = $this->input->post('vs_email_personal');

		//echo $vs_id;

		//echo $vs_name;

		// ตรวจสอบข้อมูลว่ากรอกมาแล้วหรือยัง
		/*if(empty($vs_id) or $vs_name==""){

			$this->session->set_flashdata('msg_error',' กรุณากรอกข้อมูลให้ครบถ้วน');
					redirect('member/visitor');

		} else {*/
			// ดำเนินการบันทึกข้อมูลได้
			$update_data = $this->machine->_edit_visitor($vs_id,
														$vs_name,
														$vs_address,
														$vs_company,
														$vs_position,
														$vs_branch,
														$vs_tel_1,
														$vs_tel_2,
														$vs_tel_main,
														$vs_mobile_phone,
														$vs_email,
														$vs_email_personal);
			// return -> success , false , same , error
			
			//echo $update_data;
				if($update_data=="same") {
					// ซ้ำ
					$this->session->set_flashdata('msg_warning',' Same Data. Please try again.');
						redirect('member/visitor');

				} else if($update_data=="success") {
					// success
					$this->session->set_flashdata('msg_ok',' Edit Data Success.');
						redirect('member/visitor');

				} else  if($update_data=="false") {
					// false / error
					$this->session->set_flashdata('msg_error',' Error! Please contact admin.');
						redirect('member/visitor');
				} else {
					// Error
					$this->session->set_flashdata('msg_error',' Error! Please try again.');
						redirect('member/visitor');
				}

		//}
	}



}