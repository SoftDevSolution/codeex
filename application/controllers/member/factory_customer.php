<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Factory_customer extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('session','database');
		$this->load->model('Company_customer_model','customer');
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

		// ดึงข้อมูล Factory Customer มาใช้งาน
		$data['data_factory_customer'] = $this->customer->_get_company_customer_AllData();

		$data['count_factory_customer'] = $this->customer->_count_company_customer();

		$this->load->view('member/view_factory_customer',$data);
	}

	public function add_factory_customer()
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

		// ดึงข้อมูล Factory Group มาใช้งาน
		$data['query_factory_group'] = $this->company->_get_factory_group();

		// ดึงข้อมูล Product Type มาใช้งาน
		$this->load->model('Product_type_model','products');
		$data['query_product_type'] = $this->products->_get_product_type();

		// ดึงข้อมูล User Status มาใช้งาน
		$this->load->model('Employee_model','employee');
		$data['query_user_status'] = $this->employee->_get_user_status();

		// ดึงข้อมูล Area มาใช้งาน
		$this->load->model('Area_model','area');
		$data['query_area'] = $this->area->_getAll();

		// ดึงข้อมูล User Status มาใช้งาน
		$this->load->model('Employee_model','employee');
		$data['query_user_status'] = $this->employee->_get_user_status();

		// ดึงข้อมูล Industrial Estate มาใช้งาน
		$this->load->model('Industrial_estate_model','estate');
		$data['query_industrial_estate'] = $this->estate->_getAll();

		$this->load->view('member/add_factory_customer',$data);
	}


	public function data_add_new_factory_customer()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();


		// รับข้อมูลมาใช้งาน
		$company_name = $this->input->post("company_name");
		$company_addr1 = $this->input->post("company_addr1");
		$company_addr2 = $this->input->post("company_addr2");
		$company_addr3 = $this->input->post("company_addr3");
		$company_city = $this->input->post("company_city");
		$company_zip_code = $this->input->post("company_zip_code");
		$company_tel = $this->input->post("company_tel");
		$company_fax = $this->input->post("company_fax");
		$company_capital_investment = $this->input->post("company_capital_investment");
		$company_email = $this->input->post("company_email");
		$company_bussiness_group = $this->input->post("company_bussiness_group");
		$product_type = $this->input->post("product_type");
		$company_status = $this->input->post("company_status");
		$company_area = $this->input->post("company_area");
		$company_indust = $this->input->post("company_indust");
		$company_www = $this->input->post("company_www");
		$company_facebook = $this->input->post("company_facebook");
		$company_distance_office = $this->input->post("company_distance_office");
		$company_googlemap_link = $this->input->post("company_googlemap_link");
		$company_remark = $this->input->post("company_remark");

		// ตรวจสอบข้อมูลว่ากรอกมาแล้วหรือยัง
		if(empty($company_name) or $company_name==""){

			$this->session->set_flashdata('msg_error',' กรุณากรอกข้อมูลให้ครบถ้วน');
					redirect('member/factory_customer');
		} else {
			// ดำเนินการบันทึกข้อมูลได้
			$update_data = $this->customer->_add_machine_company_customer($company_name,$company_addr1,$company_addr2,$company_addr3,
			$company_city,$company_zip_code,$company_tel,$company_fax,$company_capital_investment,$company_email,
			$company_bussiness_group,$product_type,$company_status,$company_area,
			$company_indust,$company_www,$company_facebook,$company_distance_office,
			$company_googlemap_link,$company_remark);
			
				if($update_data=="same") {
					// ซ้ำ
					$this->session->set_flashdata('msg_warning',' Data is exist. Please try again.');
						redirect('member/factory_customer');

				} else if($update_data=="success") {
					// success
					$this->session->set_flashdata('msg_ok',' Successfully.');
						redirect('member/factory_customer');

				} else  if($update_data=="false") {
					// false / error
					$this->session->set_flashdata('msg_error',' Error! Please contact admin.');
						redirect('member/factory_customer');
				}

		}

	}


	public function edit_factory_customer()
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
		$company_id = $this->uri->segment(4);

		// Check Data
		if($company_id=="" or empty($company_id)){
			$this->session->set_flashdata('msg_warning',' ไม่พบข้อมูลที่คุณต้องการ');
					redirect('member/factory_customer');
		} else {
			// ดึงข้อมูล Machine Type มาใช้งาน
			$data['get_data_company_customer'] = $this->customer->_query_company_customer($company_id);

			// ดึงข้อมูล Factory Group มาใช้งาน
			$data['query_factory_group'] = $this->company->_get_factory_group();

			// ดึงข้อมูล Product Type มาใช้งาน
			$this->load->model('Product_type_model','products');
			$data['query_product_type'] = $this->products->_get_product_type();

			// ดึงข้อมูล Area มาใช้งาน
			$this->load->model('Area_model','area');
			$data['query_area'] = $this->area->_getAll();

			// ดึงข้อมูล User Status มาใช้งาน
			$this->load->model('Employee_model','employee');
			$data['query_user_status'] = $this->employee->_get_user_status();

			// ดึงข้อมูล Industrial Estate มาใช้งาน
			$this->load->model('Industrial_estate_model','estate');
            $data['query_industrial_estate'] = $this->estate->_getAll();
            
            $this->load->model('Visitor_customer_model','visit_cus');
			$data['query_customer'] = $this->visit_cus->_get_visitor_customer_AllData_ByCompanyID($company_id);
			$data['count_customer'] = $this->visit_cus->_count_visitor_customer_ById($company_id);
			
			// แสดงข้อมูล inventory
			$this->load->model('Requisition_model','requisition');
			$data['query_requisition'] =  $this->requisition->_get_requisition_by_company_id($company_id);

			$this->load->view('member/edit_factory_customer',$data);

		}

	}


	public function data_edit_factory_customer()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();


		// รับข้อมูลมาใช้งาน
		$company_id = $this->input->post("company_id");
		$company_name = $this->input->post("company_name");
		$company_addr1 = $this->input->post("company_addr1");
		$company_addr2 = $this->input->post("company_addr2");
		$company_addr3 = $this->input->post("company_addr3");
		$company_city = $this->input->post("company_city");
		$company_zip_code = $this->input->post("company_zip_code");
		$company_tel = $this->input->post("company_tel");
		$company_fax = $this->input->post("company_fax");
		$company_capital_investment = $this->input->post("company_capital_investment");
		$company_email = $this->input->post("company_email");
		$company_bussiness_group = $this->input->post("company_bussiness_group");
		$product_type = $this->input->post("product_type");
		$company_status = $this->input->post("company_status");
		$company_area = $this->input->post("company_area");
		$company_indust = $this->input->post("company_indust");
		$company_www = $this->input->post("company_www");
		$company_facebook = $this->input->post("company_facebook");
		$company_distance_office = $this->input->post("company_distance_office");
		$company_googlemap_link = $this->input->post("company_googlemap_link");
		$company_remark = $this->input->post("company_remark");

		// ตรวจสอบข้อมูลว่ากรอกมาแล้วหรือยัง
		if(empty($company_name) or $company_name==""){

			$this->session->set_flashdata('msg_error',' กรุณากรอกข้อมูลให้ครบถ้วน');
					redirect('member/factory_customer');
		} else {
			
			// ดำเนินการบันทึกข้อมูลได้
			$update_data = $this->customer->_edit_company_customer($company_id,$company_name,$company_addr1,$company_addr2,$company_addr3,
			$company_city,$company_zip_code,$company_tel,$company_fax,$company_capital_investment,$company_email,
			$company_bussiness_group,$product_type,$company_status,$company_area,
			$company_indust,$company_www,$company_facebook,$company_distance_office,
			$company_googlemap_link,$company_remark);
			// return -> success , false , same , error
			
			echo $update_data;

				if($update_data=="same") {
					// ซ้ำ
					$this->session->set_flashdata('msg_warning',' Same Data. Please try again.');
						redirect('member/factory_customer');

				} else if($update_data=="success") {
					// success
					$this->session->set_flashdata('msg_ok',' Edit Data Success.');
						redirect('member/factory_customer');

				} else  if($update_data=="false") {
					// false / error
					$this->session->set_flashdata('msg_error',' Error! Please contact admin.');
						redirect('member/factory_customer');
				} else {
					// Error
					$this->session->set_flashdata('msg_error',' Error! Please try again.');
						redirect('member/factory_customer');
				}

		}
	}


	public function delete_factory_customer()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();


		// รับข้อมูลมาใช้งาน
		$com_sup_id = $this->uri->segment(4);
		
		// Check Data
		if($com_sup_id=="" or empty($com_sup_id)){
			$this->session->set_flashdata('msg_warning',' ไม่พบข้อมูลที่คุณต้องการ');
					redirect('member/factory_customer');
		} else {
			// ถ้ามีขอมูล ดำเนินการลบข้อมูล
			$query = $this->customer->_delete_company_customer($com_sup_id);
			
				if($query=="empty") {
					// ซ้ำ same
					$this->session->set_flashdata('msg_warning',' Empty data. Please try again.');
						redirect('member/factory_customer');

				} else if($query=="true") {
					// success
					$this->session->set_flashdata('msg_ok',' Delete Success.');
						redirect('member/factory_customer');

				} else  if($query=="false") {
					// false / error
					$this->session->set_flashdata('msg_error',' Error! Please contact admin.');
						redirect('member/factory_customer');
				}
		}
	}



}