<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class borrow_asset extends CI_Controller {

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
		$this->load->model('Borrow_asset_model','machine');

		// ดึงข้อมูล Machine Type มาใช้งาน
		$data['data_borrow_asset'] = $this->machine->_get_borrow_asset_AllData();

		$data['count_borrow_asset'] = $this->machine->_count_borrow_asset();

		$this->load->view('member/view_borrow_asset',$data);
	}

	public function add_borrow_asset()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

		// Load Model Machine
		$this->load->model('Borrow_asset_model','machine');

		// รับข้อมูลมาใช้งาน
		$asset_id = $this->input->post('asset_id');
		$br_cause = $this->input->post('br_cause');
		$br_work = $this->input->post('br_work');
		$br_detail = $this->input->post('br_detail');
		$br_no = $this->input->post('br_no');
		$br_return_date = $this->input->post('br_return_date');
		$br_user = $this->input->post('br_user');
		$br_accept = $this->input->post('br_accept');
		$br_date = $this->input->post('br_date');

		// ตรวจสอบข้อมูลว่ากรอกมาแล้วหรือยัง
		if(empty($asset_id) or $asset_id==""){

			$this->session->set_flashdata('msg_error',' กรุณากรอกข้อมูลให้ครบถ้วน');
					redirect('member/borrow_asset');
			
		} else {
			// ดำเนินการบันทึกข้อมูลได้
			$update_data = $this->machine->_add_borrow_asset($asset_id,
																$br_cause,
																$br_work,
																$br_detail,
																$br_no,
																$br_return_date,
																$br_user,
																$br_accept,
																$br_date);
			
				if($update_data=="same") {
					// ซ้ำ
					$this->session->set_flashdata('msg_warning',' ข้อมูลซ้ำ กรุณาลองใหม่อีกครั้ง');
						redirect('member/borrow_asset');

				} else if($update_data=="success") {
					// success
					$this->session->set_flashdata('msg_ok',' บันทึกข้อมูลเรียบร้อย');
						redirect('member/borrow_asset');

				} else  if($update_data=="false") {
					// false / error
					$this->session->set_flashdata('msg_error',' Error! Please contact admin.');
						redirect('member/borrow_asset');
				}

		}

		// ค่าทั่วไปของเว็บ
		$this->load->model('Settingme','me');
		$data['setting_web'] = $this->me->_getall();

		
	}

	public function delete_borrow_asset()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

		// Load Model Machine
		$this->load->model('Borrow_asset_model','machine');

		// รับข้อมูลมาใช้งาน
		$br_id = $this->uri->segment(4);
		
		// Check Data
		if($br_id=="" or empty($br_id)){
			$this->session->set_flashdata('msg_warning',' ไม่พบข้อมูลที่คุณต้องการ');
					redirect('member/borrow_asset');
		} else {
			// ถ้ามีขอมูล ดำเนินการลบข้อมูล
			$query = $this->machine->_delete_borrow_asset($br_id);
			
				if($query=="empty") {
					// ซ้ำ same
					$this->session->set_flashdata('msg_warning',' Empty data. Please try again.');
						redirect('member/borrow_asset');

				} else if($query=="true") {
					// success
					$this->session->set_flashdata('msg_ok',' Delete Success.');
						redirect('member/borrow_asset');

				} else  if($query=="false") {
					// false / error
					$this->session->set_flashdata('msg_error',' Error! Please contact admin.');
						redirect('member/borrow_asset');
				}
		}
	}

	public function edit_borrow_asset()
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
		$this->load->model('Borrow_asset_model','machine');

		// รับข้อมูลมาใช้งาน
		$asset_id = $this->uri->segment(4);

		// Check Data
		if($asset_id=="" or empty($asset_id)){
			$this->session->set_flashdata('msg_warning',' ไม่พบข้อมูลที่คุณต้องการ');
					redirect('member/borrow_asset');
		} else {
			// แสดงข้อมูลเพื่อแก้ไข

			// ดึงข้อมูล Machine Type มาใช้งาน
			$data['get_data_borrow_asset'] = $this->machine->_query_borrow_asset($asset_id);
			
			$this->load->view('member/edit_borrow_asset',$data);

		}

	}

	public function edit_data_borrow_asset()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

		// Load Model Machine
		$this->load->model('Borrow_asset_model','machine');

		// รับข้อมูลมาใช้งาน
		$br_id = $this->input->post("br_id");
		$asset_id = $this->input->post("asset_id");
		$br_cause = $this->input->post("br_cause");
		$br_work = $this->input->post("br_work");
		$br_detail = $this->input->post("br_detail");
		$br_no = $this->input->post("br_no");
		$br_return_date = $this->input->post("br_return_date");
		$br_user = $this->input->post("br_user");
		$br_accept = $this->input->post("br_accept");
		$br_date = $this->input->post("br_date");


		//echo $br_id."</BR>";
		//echo $asset_id."</BR>";
		// ตรวจสอบข้อมูลว่ากรอกมาแล้วหรือยัง
		if(empty($br_id) or $br_id==""){

			$this->session->set_flashdata('msg_error',' กรุณากรอกข้อมูลให้ครบถ้วน');
					redirect('member/borrow_asset');

		} else {
			// ดำเนินการบันทึกข้อมูลได้
			$update_data = $this->machine->_edit_borrow_asset($br_id,
													$asset_id,
													$br_cause,
													$br_work,
													$br_detail,
													$br_no,
													$br_return_date,
													$br_user,
													$br_accept,
													$br_date);
			// return -> success , false , same , error
			
			//echo $update_data;
				if($update_data=="same") {
					// ซ้ำ
					$this->session->set_flashdata('msg_warning',' Same Data. Please try again.');
						redirect('member/borrow_asset');

				} else if($update_data=="success") {
					// success
					$this->session->set_flashdata('msg_ok',' Edit Data Success.');
						redirect('member/borrow_asset');

				} else  if($update_data=="false") {
					// false / error
					$this->session->set_flashdata('msg_error',' Error! Please contact admin.');
						redirect('member/borrow_asset');
				} else {
					// Error
					$this->session->set_flashdata('msg_error',' Error! Please try again.');
						redirect('member/borrow_asset');
				}

		}
	}



}