<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class company extends CI_Controller {

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
		$this->load->model('Company_model','machine');

		// ดึงข้อมูล Machine Type มาใช้งาน
		$data['data_company'] = $this->machine->_get_company_AllData();

		$data['count_company'] = $this->machine->_count_company();

		$this->load->view('member/view_company',$data);
	}


	public function add_company()
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

		$this->load->view('member/add_company',$data);
	}

	public function add_new_company()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

		// Load Model Machine
		$this->load->model('Company_model','machine');

		
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
					redirect('member/company/add_company');
			
		} else {
			// ดำเนินการบันทึกข้อมูลได้
			$update_data = $this->machine->_add_machine_company($company_name,$company_addr1,$company_addr2,$company_addr3,
			$company_city,$company_zip_code,$company_tel,$company_fax,$company_capital_investment,$company_email,
			$company_bussiness_group,$product_type,$company_status,$company_area,
			$company_indust,$company_www,$company_facebook,$company_distance_office,
			$company_googlemap_link,$company_remark);
			
				if($update_data=="same") {
					// ซ้ำ
					$this->session->set_flashdata('msg_warning',' ข้อมูลซ้ำ กรุณาลองใหม่อีกครั้ง');
						redirect('member/company');

				} else if($update_data=="success") {
					// success
					$this->session->set_flashdata('msg_ok',' บันทึกข้อมูลเรียบร้อย');
						redirect('member/company');

				} else  if($update_data=="false") {
					// false / error
					$this->session->set_flashdata('msg_error',' Error! Please contact admin.');
						redirect('member/company');
				}

		}

		// ค่าทั่วไปของเว็บ
		$this->load->model('Settingme','me');
		$data['setting_web'] = $this->me->_getall();

		
	}


	public function edit_company()
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
		$this->load->model('Company_model','machine');

		// รับข้อมูลมาใช้งาน
		$company_id = $this->uri->segment(4);

		// Check Data
		if($company_id=="" or empty($company_id)){
			$this->session->set_flashdata('msg_warning',' ไม่พบข้อมูลที่คุณต้องการ');
					redirect('member/company');
		} else {
			// แสดงข้อมูลเพื่อแก้ไข

			// ดึงข้อมูล Machine Type มาใช้งาน
			$data['get_data_company'] = $this->machine->_query_company($company_id);
			
			$this->load->view('member/edit_company',$data);

		}

	}


	public function edit_data_company()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

		// Load Model Machine
		$this->load->model('Company_model','machine');

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

		//echo $company_name;

		// ตรวจสอบข้อมูลว่ากรอกมาแล้วหรือยัง
		if(empty($company_name) or $company_name==""){

			$this->session->set_flashdata('msg_error',' กรุณากรอกข้อมูลให้ครบถ้วน');
					redirect('member/edit_company');
					//echo "msg_error";
		} else {
			
			
			// ดำเนินการบันทึกข้อมูลได้
			$update_data = $this->machine->_edit_company($company_id,$company_name,$company_addr1,$company_addr2,$company_addr3,
			$company_city,$company_zip_code,$company_tel,$company_fax,$company_capital_investment,$company_email,
			$company_bussiness_group,$product_type,$company_status,$company_area,
			$company_indust,$company_www,$company_facebook,$company_distance_office,
			$company_googlemap_link,$company_remark);
			// return -> success , false , same , error
			
			echo $update_data;

				if($update_data=="same") {
					// ซ้ำ
					$this->session->set_flashdata('msg_warning',' Same Data. Please try again.');
						redirect('member/company');

				} else if($update_data=="success") {
					// success
					$this->session->set_flashdata('msg_ok',' Edit Data Success.');
						redirect('member/company');

				} else  if($update_data=="false") {
					// false / error
					$this->session->set_flashdata('msg_error',' Error! Please contact admin.');
						redirect('member/company');
				} else {
					// Error
					$this->session->set_flashdata('msg_error',' Error! Please try again.');
						redirect('member/company');
				}

		}
	}


	public function delete_company()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

		// Load Model Machine
		$this->load->model('Company_model','machine');

		// รับข้อมูลมาใช้งาน
		$company_id = $this->uri->segment(4);
		
		// Check Data
		if($company_id=="" or empty($company_id)){
			$this->session->set_flashdata('msg_warning',' ไม่พบข้อมูลที่คุณต้องการ');
					redirect('member/company');
		} else {
			// ถ้ามีขอมูล ดำเนินการลบข้อมูล
			$query = $this->machine->_delete_company($company_id);
			
				if($query=="empty") {
					// ซ้ำ same
					$this->session->set_flashdata('msg_warning',' Empty data. Please try again.');
						redirect('member/company');

				} else if($query=="true") {
					// success
					$this->session->set_flashdata('msg_ok',' Delete Success.');
						redirect('member/company');

				} else  if($query=="false") {
					// false / error
					$this->session->set_flashdata('msg_error',' Error! Please contact admin.');
						redirect('member/company');
				}
		}
	}




}