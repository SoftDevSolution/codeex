<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notification extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('session','database');
		$this->load->model('Notification_model','notification');
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

		$data['count_notification'] = $this->notification->_count_notification();
		$data['data_notification'] = $this->notification->_getAll();

		$this->load->view('member/view_notification',$data);
	}

	public function edit_notification()
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
		$notification_id = $this->uri->segment(4);

		// Check ว่ามีข้อมูลมาหรือไม่
		if($notification_id=="" or empty($notification_id)){

			// ไม่มีข้อมูล
			$this->session->set_flashdata('msg_warning',' No data. Please try again.');
					redirect('member/notification');

		} else {

			// มีข้อมูล ดำเนินการต่อ
			$data['query_notification'] = $this->notification->_query_notification_by_id($notification_id);

			$this->load->view('member/edit_notification',$data);

		}

	}

	public function data_edit_notification()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

 		// Agent_Data
		$username_member = $this->session->userdata('username_member');

		// รับข้อมูลมาใช้งาน
		$notification_id = $this->input->post("notification_id");
		$machine_id = $this->input->post("machine_id");
		$messages = $this->input->post("messages");
		$user_notification = $this->input->post("user_notification");

		// ตรวจสอบข้อมูลว่ากรอกมาแล้วหรือยัง
		if(empty($machine_id)){

			$this->session->set_flashdata('msg_warning',' กรุณากรอกข้อมูลให้ครบถ้วน');
					redirect('member/notification');
			
		} else {
			// ดำเนินการแก้ไขข้อมูลได้
			$update_data = $this->notification->_edit_notification($notification_id,$machine_id,$messages,$user_notification,$username_member);
			
				if($update_data) {
					// success
					$this->session->set_flashdata('msg_ok',' แก้ไขข้อมูลเรียบร้อย');
						redirect('member/notification');

				} else {
					// false / error
					$this->session->set_flashdata('msg_error',' Error! Please contact admin.');
						redirect('member/notification');
				}

		}
	}

	public function delete_notification()
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
		$notification_id = $this->input->post("notification_id");

		// Check ว่ามีข้อมูลมาหรือไม่
		if($notification_id=="" or empty($notification_id)){

			// ไม่มีข้อมูล
			echo "empty";

		} else {

			// มีข้อมูล ดำเนินการ ลบข้อมูลได้
			$remove_notification = $this->notification->_delete_notification($notification_id);
				if($remove_notification){
					echo "success";
				} else {
					echo "error";
				}

		}
	}

	public function get_user()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

		// Load Model Machine
		$this->load->model('Employee_model','employee');

		// รับข้อมูลมาใช้งาน
		$query = $this->input->post("query");
		
		// ดึงข้อมูลมา
		$query_user = $this->employee->_get_by_username($query);
			foreach($query_user as $row)
				{
				echo '
				<li class="list-group-item list-group2">
				<a href="javascript:void(0)" class="TextSearch" style="color:#333;text-decoration:none;">'.$row->emp_username.'</a>
				</li>
				';
				}

	}

	public function data_add_notification()
	{
		// Load All
		$this->load->library('session','database');
		$this->load->model('User_model','user');
		$this->checkMember_isvalidated();

 		// Agent_Data
		$username_member = $this->session->userdata('username_member');

		// รับข้อมูลมาใช้งาน
		$machine_id = $this->input->post("machine_id");
		$frequency = $this->input->post("frequency");
		$myloop = $this->input->post("myloop");
		$messages = $this->input->post("messages");
		$date_start = $this->input->post("date_start");
		$user_notification = $this->input->post("user_notification");

		// ตรวจสอบข้อมูลว่ากรอกมาแล้วหรือยัง
		if(empty($machine_id) or $date_start==""){

			$this->session->set_flashdata('msg_warning',' กรุณากรอกข้อมูลให้ครบถ้วน');
					redirect('member/notification');
			
		} else {
			// ดำเนินการบันทึกข้อมูลได้
			for ($i=0; $i < $myloop ; $i++) { 
				$the_frequency = date("Y-m-d",strtotime("+".$frequency*$i." days",strtotime($date_start))); 

				$update_data = $this->notification->_add_notification($machine_id,$the_frequency,$messages,$user_notification,$username_member);

			}
			
				if($update_data) {
					// success
					$this->session->set_flashdata('msg_ok',' บันทึกข้อมูลเรียบร้อย');
						redirect('member/notification');

				} else {
					// false / error
					$this->session->set_flashdata('msg_error',' Error! Please contact admin.');
						redirect('member/notification');
				}

		}

		
	}

}