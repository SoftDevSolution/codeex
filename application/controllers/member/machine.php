<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Machine extends CI_Controller {

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

		// แสดงข้อมูล Member
		$query_user = $this->user->_getmember($username_member);
				foreach ($query_user as $user) {
					$id_user = $user->id_user;
					$fullname = $user->fullname;
				}

		// ค่าทั่วไปของเว็บ
		$this->load->model('Settingme','me');
		$data['setting_web'] = $this->me->_getall();

		$this->load->view('member/machine',$data);
	}

	public function add_machine()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

 		// Agent_Data
		$username_member = $this->session->userdata('username_member');
		$data['username_member'] = $this->user->_getmember($username_member);

		// แสดงข้อมูล Member
		$query_user = $this->user->_getmember($username_member);
				foreach ($query_user as $user) {
					$id_user = $user->id_user;
					$fullname = $user->fullname;
				}

		// ค่าทั่วไปของเว็บ
		$this->load->model('Settingme','me');
		$data['setting_web'] = $this->me->_getall();

		// ดึงข้อมูล Machine Model มาใช้งาน
		$this->load->model('Machine_model_model','machine');
		$data['query_machine_model'] = $this->machine->_get_machine_model_AllData();

		// ดึงข้อมูล Machine Type มาใช้งาน
		$this->load->model('Machine_type_model','mmtype');
		$data['query_machine_type'] = $this->mmtype->_get_machine_type_AllData();

		// ดึงข้อมูล Machine Brand มาใช้งาน
		$this->load->model('Machine_brand_model','brand');
		$data['query_machine_brand'] = $this->brand->_get_machine_brand_AllData();

		$this->load->view('member/add_machine',$data);
	}

	public function data_add_machine()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

		// Load Model Machine
		$this->load->model('Company_model','machine');
		
		// รับข้อมูลมาใช้งาน
		$machine_type = $this->input->post("machine_type");
		$model_id = $this->input->post("model_id");
		$machine_status = $this->input->post("machine_status");
		$machine_serial_no = $this->input->post("machine_serial_no");
		$brand_id = $this->input->post("brand_id");
		$machine_sup_inv_no = $this->input->post("machine_sup_inv_no");
		$machine_sup_inv_date = $this->input->post("machine_sup_inv_date");
		$machine_warranty_year = $this->input->post("machine_warranty_year");
		$machine_warranty_start_date = $this->input->post("machine_warranty_start_date");
		$machine_warranty_stop_date = $this->input->post("machine_warranty_stop_date");
		$machine_company_inv_no = $this->input->post("machine_company_inv_no");
		$machine_company_inv_date = $this->input->post("machine_company_inv_date");
		$machine_warranty_comp_year = $this->input->post("machine_warranty_comp_year");
		$machine_warranty_comp_start_date = $this->input->post("machine_warranty_comp_start_date");
		$machine_warranty_comp_stop_date = $this->input->post("machine_warranty_comp_stop_date");

		// ตรวจสอบข้อมูลว่ากรอกมาแล้วหรือยัง
		if(empty($machine_type) or $machine_type==""){

			$this->session->set_flashdata('msg_error',' Not found data. Please try again.');
					redirect('member/machine/add_machine');
			
		} else {
			// ดำเนินการบันทึกข้อมูลได้
			$update_data = $this->machine->_add_new_machine($machine_type,$model_id,$machine_status,$machine_serial_no,$brand_id,$machine_sup_inv_no,$machine_sup_inv_date,$machine_warranty_year,$machine_warranty_start_date,$machine_warranty_stop_date,$machine_company_inv_no,$machine_company_inv_date,$machine_warranty_comp_year,$machine_warranty_comp_start_date,$machine_warranty_comp_stop_date);
			
				if($update_data=="same") {
					// ซ้ำ
					$this->session->set_flashdata('msg_warning',' Data is exist. Please try again.');
						redirect('member/machine');

				} else if($update_data=="success") {
					// success
					$this->session->set_flashdata('msg_ok',' Successfully. Saved data.');
						redirect('member/machine');

				} else  if($update_data=="false") {
					// false / error
					$this->session->set_flashdata('msg_error',' Error! Please contact admin.');
						redirect('member/machine');
				}
		}
	}



}