<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Requisition extends CI_Controller {

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

		// ดึงข้อมูล Requisition มาแสดง
		$this->load->model('Requisition_model','requisition');
		$data['query_requisition'] = $this->requisition->_get_all();

		$this->load->view('member/requisition',$data);
	}

	public function add_requisition()
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

		// ดึงข้อมูล employee มาแสดง
		$this->load->model('Employee_model','emp');
		$data['query_emp'] = $this->emp->_getAll();

		// ดึงข้อมูล Visitor Customer มาแสดง
		$this->load->model('Visitor_customer_model','visitor');
		$data['query_visit_customer'] = $this->visitor->_get_visitor_customer_AllData();

		// ดึงข้อมูล Factory Name มาแสดง
		// $this->load->model('Company_model','factory');
		// $data['query_factory'] = $this->factory->_get_company_AllData();

		// ดึงข้อมูล Facetory Customer มาใช้งาน
		$this->load->model('Company_customer_model','customer');
		$data['query_factory_customer'] = $this->customer->_get_company_customer_AllData();

		$this->load->view('member/add_requisition',$data);
	}

	public function data_add_requisition()
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

		// รับค่าใบเบิกมา
		$rqs_date = $this->input->post("rqs_date");
		$emp_id = $this->input->post("emp_id");
		$rqs_pn = $this->input->post("rqs_pn");
		$vs_id = $this->input->post("vs_id");
		$company_id = $this->input->post("company_id");
		$rqs_remark = $this->input->post("rqs_remark");
		$rqs_status = "active";
		

		if(empty($rqs_date) or empty($emp_id) or empty($vs_id)){
			$this->session->set_flashdata('msg_error',' Not found data. Please try again.');
					redirect('member/requisition');
		} else {
			// ดำเนินการ อัพเดทข้อมูล
			$this->load->model('Requisition_model','requisition');
			$insert_data = $this->requisition->_add_new_requisition($rqs_date,$emp_id,$rqs_pn,$vs_id,$company_id,$rqs_remark,$rqs_status,$username_member);

				if($insert_data){
					// success
					$this->session->set_flashdata('msg_ok',' Successfully. Saved data.');
						redirect('member/requisition');
				} else {
					// false / error
					$this->session->set_flashdata('msg_error',' Error! Please try again.');
						redirect('member/requisition');
				}
							

		}
	}

	public function add_sub_requisition()
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

		$this->load->view('member/add_sub_requisition',$data);
	}

	public function edit_requisition()
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

		// ดึงข้อมูล employee มาแสดง
		$this->load->model('Employee_model','emp');
		$data['query_emp'] = $this->emp->_getAll();

		// ดึงข้อมูล Visitor Customer มาแสดง
		$this->load->model('Visitor_customer_model','visitor');
		$data['query_visit_customer'] = $this->visitor->_get_visitor_customer_AllData();

		// ดึงข้อมูล Facetory Customer มาใช้งาน
		$this->load->model('Company_customer_model','customer');
		$data['query_factory_customer'] = $this->customer->_get_company_customer_AllData();

		// รับข้อมูลมาใช้งาน
		$rqs_id = $this->uri->segment(4);

		if($rqs_id=="" or empty($rqs_id)){
			$this->session->set_flashdata('msg_error',' Not found data. Please try again.');
					redirect('member/requisition');
		} else {
			// ดึงข้อมูล Requisition มาแสดง
			$this->load->model('Requisition_model','requisition');
			$data['query_requisition'] = $this->requisition->_get_requisition_by_id($rqs_id);

			$this->load->view('member/edit_requisition',$data);
		}

	}

	public function data_edit_requisition()
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

		// รับค่าใบเบิกมา
		$rqs_id = $this->input->post("rqs_id");
		$rqs_date = $this->input->post("rqs_date");
		$emp_id = $this->input->post("emp_id");
		$rqs_pn = $this->input->post("rqs_pn");
		$vs_id = $this->input->post("vs_id");
		$company_id = $this->input->post("company_id");
		$rqs_remark = $this->input->post("rqs_remark");
		$rqs_status = $this->input->post("rqs_status");
		

		if(empty($rqs_date) or empty($rqs_id) or empty($emp_id) or empty($vs_id)){
			$this->session->set_flashdata('msg_error',' Not found data. Please try again.');
					redirect('member/requisition');
		} else {
			// ดำเนินการ อัพเดทข้อมูล
			$this->load->model('Requisition_model','requisition');
			$insert_data = $this->requisition->_edit_requisition($rqs_id,$rqs_date,$emp_id,$rqs_pn,$vs_id,$company_id,$rqs_remark,$rqs_status,$username_member);

				if($insert_data){
					// success
					$this->session->set_flashdata('msg_ok',' Successfully. Saved data.');
						redirect('member/requisition');
				} else {
					// false / error
					$this->session->set_flashdata('msg_error',' Error! Please try again.');
						redirect('member/requisition');
				}
							

		}
	}

	public function remove_requisition()
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

		// รับข้อมูลมาใช้งาน
		$rqs_id = $this->uri->segment(4);

		// get inventory
		$this->load->model('Requisition_model','requisition');
		
		//echo $rqs_id."</br>";
		//1  2-7-6
		$query_machine = $this->requisition->_get_all_inventory_to_invoice($rqs_id);
			foreach ($query_machine as $machine) {
				$machine_id = $machine->machine_id;
				//echo $machine_id."</br>";
				 $update_data = $this->requisition->_edit_machine_status($machine_id);			
			}

		$update_requisition = $this->requisition->_edit_requisition_status($rqs_id,$username_member);

		$remove_requisition = $this->requisition->_remove_requisition($rqs_id);

		redirect('member/requisition');
		//$this->load->view('member/requisition',$data);

	}

	public function add_inventory()
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

		// รับข้อมูลมาใช้งาน
		$rqs_id = $this->uri->segment(4);

		// ดึงข้อมูล inventory มาแสดง
		$this->load->model('Company_model',"company");
		$data['query_inventory'] = $this->company->_get_invoice_active();

		// ดึงข้อมูล Requisition มาแสดง
		$this->load->model('Requisition_model','requisition');
		$data['query_requisition'] = $this->requisition->_get_requisition_by_id($rqs_id);

		// แสดงรายการข้อมูล query_invent_in_invoice
		$data['query_invent_in_invoice'] = $this->requisition->_get_inventory_in_invoice($rqs_id);

		$this->load->view('member/requisition_add_inventory',$data);

	}

	public function add_data_inventory()
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

		// รับข้อมูลมาใช้งาน
		$machine_id = $this->uri->segment(4);
		$requisition_id = $this->uri->segment(5);

		// ดึงข้อมูล inventory มาแสดง
		$this->load->model('Company_model',"company");
		$add_inventory = $this->company->_add_inventory_to_requisition($machine_id,$requisition_id,$username_member);
				if($add_inventory){
					// success
					$this->session->set_flashdata('msg_ok',' Successfully. Remove success.');
						redirect('member/requisition/add_inventory/'.$requisition_id);
				} else {
					// false / error
					$this->session->set_flashdata('msg_error',' Error! Please try again.');
						redirect('member/requisition/add_inventory/'.$requisition_id);
				}

	}

	public function update_status_inventory()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

 		// Agent_Data
		$username_member = $this->session->userdata('username_member');
		$data['username_member'] = $this->user->_getmember($username_member);

		// แสดงข้อมูล Member
		// $query_user = $this->user->_getmember($username_member);
		// 		foreach ($query_user as $user) {
		// 			$id_user = $user->id_user;
		// 			$fullname = $user->fullname;
		// 		}

		// รับข้อมูลมาใช้งาน
		$id_inven_to_invoice = $this->uri->segment(4);
		$requisition_id = $this->uri->segment(5);

		// ดึงข้อมูล inventory มาแสดง
		$this->load->model('Company_model',"company");
		$update_requisition = $this->company->_return_requisition($id_inven_to_invoice);
				if($update_requisition){
					// success
					$this->session->set_flashdata('msg_ok',' Successfully. Remove success.');
						redirect('member/requisition/add_inventory/'.$requisition_id);
				} else {
					// false / error
					$this->session->set_flashdata('msg_error',' Error! Please try again.');
						redirect('member/requisition/add_inventory/'.$requisition_id);
				}
	}

}