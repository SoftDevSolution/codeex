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

		// ดึงข้อมูล inventory มาแสดง
		$this->load->model('Machine_model');
		$data['query_inventory'] = $this->Machine_model->_get_machine_brand_AllData();
		// แสดงจำนวน inventory
		$data['count_inventory'] = $this->Machine_model->_count_machine();

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

		// Load Model Machine
		$this->load->model('Company_model','machine');

		// แสดง Invoice
		$data['query_invoice'] = $this->machine->_get_invoice();

		$this->load->view('member/add_machine',$data);
	}

	public function data_add_invoice()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

 		// Agent_Data
		$username_member = $this->session->userdata('username_member');
		$data['username_member'] = $this->user->_getmember($username_member);

		// Load Model Machine
		$this->load->model('Company_model','machine');
		
		// รับข้อมูลมาใช้งาน
		$rqs_id = $this->input->post("rqs_id");
		$rtc_pn = $this->input->post("rtc_pn");
		$vs_name = $this->input->post("vs_name");
		$vs_company = $this->input->post("vs_company");

		if(empty($rqs_id) or empty($rtc_pn) or empty($vs_name) or empty($vs_company)){
			// No data.
			$this->session->set_flashdata('msg_error',' Not found data. Please try again.');
					redirect('member/machine/add_machine');
		} else {
			// Add invoice
			$query_insert = $this->machine->_add_invoice($rqs_id,$rtc_pn,$vs_name,$vs_company);
				if($query_insert){
					// Success
					$this->session->set_flashdata('msg_ok',' Successfully. Saved Invoice data.');
						redirect('member/machine/add_machine');
				} else {
					// error
					$this->session->set_flashdata('msg_error',' Error! Please try again.');
						redirect('member/machine/add_machine');
				}

		}
	}

	public function add_machine_from_supplier()
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

		// ดึงข้อมูล Machine Brand มาใช้งาน
		$this->load->model('Visitor_supplier_model','visit_sup');
		$data['query_visit_sup'] = $this->visit_sup->_get_visitor_supplier_AllData();

		// รับข้อมูลมา
		$id_invoice = $this->uri->segment(4);

		// Checking Data
		if(empty($id_invoice) or $id_invoice==""){
			// No data.
			$this->session->set_flashdata('msg_error',' Not found data. Please try again.');
					redirect('member/machine/add_machine');
		} else {
			// Add invoice
			$this->load->model('Company_model','company');
			$data['query_inventory'] = $this->company->_get_inventory_in_invoice($id_invoice);

			// Count data
			$data['count_inventory'] = $this->company->_count_inventory_in_invoice($id_invoice);
			
				$this->load->view('member/add_machine_from_supplier',$data);
		}
		
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
		$machine_type_id = $this->input->post("machine_type_id");
		$model_id = $this->input->post("model_id");
		$machine_status = $this->input->post("machine_status");
		$machine_serial_no = $this->input->post("machine_serial_no");
		$brand_id = $this->input->post("brand_id");
		$machine_price = $this->input->post("machine_price");
		$machine_stock = $this->input->post("machine_stock");
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
		if(empty($machine_type_id) or $machine_type_id==""){

			$this->session->set_flashdata('msg_error',' Not found data. Please try again.');
					redirect('member/machine/add_machine');
			
		} else {
			// ดำเนินการบันทึกข้อมูลได้
			$update_data = $this->machine->_add_new_machine($machine_type_id,$model_id,$machine_status,$machine_serial_no,$brand_id,$machine_price,$machine_stock,$machine_sup_inv_no,$machine_sup_inv_date,$machine_warranty_year,$machine_warranty_start_date,$machine_warranty_stop_date,$machine_company_inv_no,$machine_company_inv_date,$machine_warranty_comp_year,$machine_warranty_comp_start_date,$machine_warranty_comp_stop_date);
			
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
					$this->session->set_flashdata('msg_error',' Error! Please try again.');
						redirect('member/machine');
				}
		}
	}

	public function get_visitor_supplier()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

		// Load Visitor_supplier_model
		$this->load->model('Visitor_supplier_model','visitor_sup');

		// รับข้อมูลมา
		$vs_name = $this->input->post("query");

		// ดึงข้อมูลมาแสดง
		$query_visitor_sub = $this->visitor_sup->_get_visitor_supplier_by_vs_name($vs_name);
			foreach($query_visitor_sub as $row)
				{
				echo '
				<li class="list-group-item contsearch">
				<a href="javascript:void(0)" class="gsearch" style="color:#333;text-decoration:none;">'.$row->vs_name.'</a>
				</li>
				';
				}

	}

	public function get_vs_company_visitor_supplier()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

		// Load Visitor_supplier_model
		$this->load->model('Visitor_supplier_model','visitor_sup');

		// รับข้อมูลมา
		$vs_company = $this->input->post("vs_company");

		// ดึงข้อมูลมาแสดง
		$query_visitor_sub = $this->visitor_sup->_get_visitor_supplier_by_vs_company($vs_company);
			foreach($query_visitor_sub as $data)
				{
					echo $data->vs_company;
				}

	}

	public function edit_machine()
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

		// รับค่า machine_id มาใช้งาน
		$machine_id = $this->uri->segment(4);

		// ดึงข้อมูล inventory มาแสดง
		$this->load->model('Company_model','company');
		$data['query_inventory'] = $this->company->_query_machine($machine_id);

		$this->load->view('member/edit_machine',$data);
	}

	public function data_edit_machine()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

		// Load Company_model
		$this->load->model('Company_model','machine');
		
		// รับข้อมูลมาใช้งาน
		$machine_id = $this->input->post("machine_id");
		$invoice_id = $this->input->post("invoice_id");
		$machine_type_id = $this->input->post("machine_type_id");
		$model_id = $this->input->post("model_id");
		$machine_status = $this->input->post("machine_status");
		$machine_serial_no = $this->input->post("machine_serial_no");
		$brand_id = $this->input->post("brand_id");
		$machine_price = $this->input->post("machine_price");
		$machine_stock = $this->input->post("machine_stock");
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
		if(empty($machine_id)){

			$this->session->set_flashdata('msg_error',' Not found data. Please try again.');
					redirect('member/machine');
			
		} else {
			// ดำเนินการบันทึกข้อมูลได้
			$update_data = $this->machine->_edit_machine($invoice_id,$machine_id,$machine_type_id,$model_id,$machine_status,$machine_serial_no,$brand_id,$machine_price,$machine_stock,$machine_sup_inv_no,$machine_sup_inv_date,$machine_warranty_year,$machine_warranty_start_date,$machine_warranty_stop_date,$machine_company_inv_no,$machine_company_inv_date,$machine_warranty_comp_year,$machine_warranty_comp_start_date,$machine_warranty_comp_stop_date);
			
				if($update_data) {
					// success
					$this->session->set_flashdata('msg_ok',' Successfully. Saved data.');
						redirect('member/machine');
				} else {
					// false / error
					$this->session->set_flashdata('msg_error',' Error! Please contact admin.');
						redirect('member/machine');
				}
		}
	}

	public function remove_machine()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

 		// Agent_Data
		$username_member = $this->session->userdata('username_member');
		$data['username_member'] = $this->user->_getmember($username_member);

		// รับข้อมูลมา
		$machine_id = $this->uri->segment(4);

		// Load Company_model
		$this->load->model('Company_model','machine');

		// ดำเนินการลบข้อมูล
		if(empty($machine_id) or $machine_id==""){
			// ไม่มีข้อมูลมาให้ดำเนินการ
				$this->session->set_flashdata('msg_warning',' Data is exist. Please try again.');
						redirect('member/machine');
		} else {
			// ดำเนินการลบ
			$remove = $this->machine->_delete_inventory($machine_id);
				if($remove){
					$this->session->set_flashdata('msg_ok',' Delete Successfully.');
						redirect('member/machine');
				} else {
					// false / error
					$this->session->set_flashdata('msg_error',' Error! Please try again.');
						redirect('member/machine');
				}

		}
		
	}

}
