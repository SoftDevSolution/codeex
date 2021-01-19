<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employee_model extends CI_Model {

	function __construct(){

		parent::__construct();

	}

	public function _getAll()
	{
		// ดึงข้อมูลสมาชิกส่งไปใช้
		$get_employee = $this->db->order_by("emp_id","DESC")->get('tbl_employees')->result();
			
		return $get_employee;
	}

	public function _countAll()
	{
		// ดึงข้อมูลสมาชิกส่งไปใช้
		$count_all = $this->db->count_all('tbl_employees');
			
		return $count_all;
	}

	public function _add_employees($emp_name,$emp_username,$emp_password,$emp_address,
			$position_id,$emp_tel,$emp_mobile_phone,$emp_personal_email,$emp_company_email,$emp_birth_date,$emp_age,$emp_work_start_date,$emp_work_stop_date,$emp_sarary_start,$emp_sarary_now,$emp_pic_path,$emp_remark,$emp_status,$emp_blood_group,$emp_gender,$emp_height,$emp_weight)
	{

		// เช็คก่อนว่า username ซ้ำไหม
		$check_count = $this->db->where("emp_username",$emp_username)
					->count_all_results("tbl_employees");
			if($check_count>0){
				return "same";
			} else {
				// บันทึกข้อมูล
				$add_employee = $this->db->set("emp_name",$emp_name)
							->set("emp_username",$emp_username)
							->set("emp_password",base64_encode($emp_password))
							->set("emp_password_md5",md5($emp_password))
							->set("emp_address",$emp_address)
							->set("position_id",$position_id)
							->set("emp_tel",$emp_tel)
							->set("emp_mobile_phone",$emp_mobile_phone)
							->set("emp_personal_email",$emp_personal_email)
							->set("emp_company_email",$emp_company_email)
							->set("emp_birth_date",$emp_birth_date)
							->set("emp_age",$emp_age)
							->set("emp_work_start_date",$emp_work_start_date)
							->set("emp_work_stop_date",$emp_work_stop_date)
							->set("emp_sarary_start",$emp_sarary_start)
							->set("emp_sarary_now",$emp_sarary_now)
							->set("emp_pic_path",$emp_pic_path)
							->set("emp_remark",$emp_remark)
							->set("emp_status",$emp_status)
							->set("emp_blood_group",$emp_blood_group)
							->set("emp_gender",$emp_gender)
							->set("emp_height",$emp_height)
							->set("emp_weight",$emp_weight)
							->insert('tbl_employees');
			
						if($add_employee){
							return "success";
						} else {
							return "false";
						}
			}
	}

	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */