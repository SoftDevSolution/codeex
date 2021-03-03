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

    public function _count_employee()
    {
        $count = $this->db->count_all("tbl_employees");
                    return $count;
    }

	public function _get_by_id($emp_id)
	{
		// ดึงข้อมูลสมาชิกส่งไปใช้
		$get_employee = $this->db->where("emp_id",$emp_id)
							->get('tbl_employees')->result();
		return $get_employee;
    }
    
	public function _get_by_username($emp_username)
	{
		// ดึงข้อมูลสมาชิกส่งไปใช้
		$get_employee = $this->db->where("emp_username",$emp_username)
							->get('tbl_employees')->result();
		return $get_employee;
	}

	public function _countAll()
	{
		// ดึงข้อมูลสมาชิกส่งไปใช้
		$count_all = $this->db->count_all('tbl_employees');
			
		return $count_all;
    }
    
	public function _loginUser($username,$password)
	{
        $result = $this->db->where('username',$username)
                    ->where('passwordmd5',md5($password))
                    ->count_all_results('user');
                    return $result > 0 ? TRUE : FALSE;
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

	public function _edit_employees($emp_id,$emp_name,$emp_username,$emp_password,$emp_address,
			$position_id,$emp_tel,$emp_mobile_phone,$emp_personal_email,$emp_company_email,$emp_birth_date,$emp_age,$emp_work_start_date,$emp_work_stop_date,$emp_sarary_start,$emp_sarary_now,$emp_pic_path,$emp_remark,$emp_status,$emp_blood_group,$emp_gender,$emp_height,$emp_weight)
	{
				// บันทึกข้อมูล
				$add_employee = $this->db->where("emp_id",$emp_id)
							->set("emp_name",$emp_name)
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
							->update('tbl_employees');
			
						if($add_employee){
							return "success";
						} else {
							return "false";
						}
	}

	public function _delete_employee($emp_id)
	{
		$query = $this->db->where("emp_id",$emp_id)
					->get("tbl_employees")->result();
			foreach ($query as $aaa) {
				$delete_photo = $aaa->emp_pic_path;
			}
			unlink("theme/photo_employees/".$delete_photo);
			unlink("theme/photo_employees_thumbnail/".$delete_photo);
		
			$delete = $this->db->where("emp_id",$emp_id)
						->delete("tbl_employees");
					return $delete;
	}

    public function _count_user_type()
    {
        $count = $this->db->count_all("tbl_user_type");
                    return $count;
    }

    public function _count_user_status()
    {
        $count = $this->db->count_all("tbl_user_status");
                    return $count;
    }

	public function _add_user_type($user_type_name)
	{
        // Check
        $checking = $this->db->where("user_type_name",$user_type_name)
                        ->count_all_results("tbl_user_type");

            if($checking==0){
                // ไม่มีข้อมูล บันทึกข้อมูลได้
                $query = $this->db->set("user_type_name",$user_type_name)
                        ->insert("tbl_user_type");
                    if($query){
                        return "success";
                    } else {
                        return "false";
                    }
            } else {
                // ซ้ำ แจ้งกลับไป
                return "same";
                
            }

        
	}

	public function _edit_user_type($user_type_id,$user_type_name)
	{
        // Check
        $checking = $this->db->where("user_type_name",$user_type_name)
                        ->count_all_results("tbl_user_type");

            if($checking==0){
                // ไม่มีข้อมูล บันทึกข้อมูลได้
				$query = $this->db->where("user_type_id",$user_type_id)
						->set("user_type_name",$user_type_name)
                        ->update("tbl_user_type");
                    if($query){
                        return "success";
                    } else {
                        return "false";
                    }
            } else {
                // ซ้ำ แจ้งกลับไป
                return "same";
                
            }

        
	}

	public function _edit_user_status($user_status_id,$user_status_name)
	{
        // Check
        $checking = $this->db->where("user_status_name",$user_status_name)
                        ->count_all_results("tbl_user_status");

            if($checking==0){
                // ไม่มีข้อมูล บันทึกข้อมูลได้
				$query = $this->db->where("user_status_id",$user_status_id)
						->set("user_status_name",$user_status_name)
                        ->update("tbl_user_status");
                    if($query){
                        return "success";
                    } else {
                        return "false";
                    }
            } else {
                // ซ้ำ แจ้งกลับไป
                return "same";
                
            }

        
	}

	public function _add_user_status($user_status_name)
	{
        // Check
        $checking = $this->db->where("user_status_name",$user_status_name)
                        ->count_all_results("tbl_user_status");

            if($checking==0){
                // ไม่มีข้อมูล บันทึกข้อมูลได้
                $query = $this->db->set("user_status_name",$user_status_name)
                        ->insert("tbl_user_status");
                    if($query){
                        return "success";
                    } else {
                        return "false";
                    }
            } else {
                // ซ้ำ แจ้งกลับไป
                return "same";
                
            }

        
	} 
    
    public function _get_user_type()
    {
         
        // ดึงข้อมูลทั้งหมด ไปใช้งาน
        $query = $this->db->order_by("user_type_id","ASC")
                        ->get("tbl_user_type")
                        ->result();
                    return $query;
    }

    public function _get_user_status()
    {
         
        // ดึงข้อมูลทั้งหมด ไปใช้งาน
        $query = $this->db->order_by("user_status_id","ASC")
                        ->get("tbl_user_status")
                        ->result();
                    return $query;
    }

    public function _delete_user_type($user_type_id)
    {
        // ตรวจสอบว่ามีข้อมูลหรือไม่
        $checking = $this->db->where("user_type_id",$user_type_id)
                        ->count_all_results("tbl_user_type");
                if($checking==0){
                    // ไม่พบข้อมูล
                    return "empty";
                } else {
                    // มีข้อมูล ลบได้
                    $query_delete = $this->db->where("user_type_id",$user_type_id)
                                        ->delete("tbl_user_type");
                                if($query_delete){
                                    return "true";
                                } else {
                                    return "false";
                                }
                }
    }

    public function _delete_user_status($user_status_id)
    {
        // ตรวจสอบว่ามีข้อมูลหรือไม่
        $checking = $this->db->where("user_status_id",$user_status_id)
                        ->count_all_results("tbl_user_status");
                if($checking==0){
                    // ไม่พบข้อมูล
                    return "empty";
                } else {
                    // มีข้อมูล ลบได้
                    $query_delete = $this->db->where("user_status_id",$user_status_id)
                                        ->delete("tbl_user_status");
                                if($query_delete){
                                    return "true";
                                } else {
                                    return "false";
                                }
                }
    }

    public function _get_user_type_from_id($user_type_id)
    {
        $query = $this->db->where("user_type_id",$user_type_id)
                        ->get("tbl_user_type")
                        ->result();
                    return $query;
	}

    public function _get_user_status_from_id($user_status_id)
    {
        $query = $this->db->where("user_status_id",$user_status_id)
                        ->get("tbl_user_status")
                        ->result();
                    return $query;
	}

    public function _getAll_position()
    {
         
        // ดึงข้อมูลทั้งหมด ไปใช้งาน
        $query = $this->db->order_by("position_id","DESC")
                        ->get("tbl_position")
                        ->result();
                    return $query;
    }
	
    public function _count_position()
    {
        $count = $this->db->count_all("tbl_position");
                    return $count;
    }

	public function _add_position($position_name)
	{
        // Check
        $checking = $this->db->where("position_name",$position_name)
                        ->count_all_results("tbl_position");

            if($checking==0){
                // ไม่มีข้อมูล บันทึกข้อมูลได้
                $query = $this->db->set("position_name",$position_name)
                        ->insert("tbl_position");
                    if($query){
                        return "success";
                    } else {
                        return "false";
                    }
            } else {
                // ซ้ำ แจ้งกลับไป
                return "same";
                
            }

        
    }

    public function _delete_machine_position($position_id)
    {
        // ตรวจสอบว่ามีข้อมูลหรือไม่
        $checking = $this->db->where("position_id",$position_id)
                        ->count_all_results("tbl_position");
                if($checking==0){
                    // ไม่พบข้อมูล
                    return "empty";
                } else {
                    // มีข้อมูล ลบได้
                    $query_delete = $this->db->where("position_id",$position_id)
                                        ->delete("tbl_position");
                                if($query_delete){
                                    return "true";
                                } else {
                                    return "false";
                                }
                }
    }

    public function _query_user_position($position_id)
    {
        $query = $this->db->where("position_id",$position_id)
                        ->get("tbl_position")
                        ->result();
                    return $query;
    }

	public function _edit_user_position($position_id,$position_name)
	{
        // Check
        $checking = $this->db->where("position_id",$position_id)
                        ->count_all_results("tbl_position");
            if($checking>0){
                // บันทึกข้อมูลได้
				$query = $this->db->where("position_id",$position_id)
						->set("position_name",$position_name)
						->update("tbl_position");

					if($query){
						return "success";
					} else {
						return "false";
					}

                    }
    }

	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */