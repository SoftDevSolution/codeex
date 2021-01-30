<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('session','database');
		$this->load->model('Company_model','company');
		$this->load->model('Company_supplier_model','company_supplier');
		$this->load->model('Customers_model','customer');
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

		// แสดงข้อมูล จำนวนต่างๆ
		$data['count_company'] = $this->company->_count_company();
		$data['count_company_supplier'] = $this->company_supplier->_count_company_supplier();
		$data['count_customer'] = $this->customer->_count_customer();
		$data['count_employee'] = $this->employee->_count_employee();

		$this->load->view('member/dashboard',$data);
	}


}