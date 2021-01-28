<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Service_outside_model extends CI_Model {

	function __construct(){

		parent::__construct();

	}

	public function _getAll()
	{
		// ดึงข้อมูล employee ส่งไปใช้งาน
		$query = $this->db->order_by("svo_id","DESC")->get('tbl_service_outside')->result();
			
		return $query;
	}	

	public function _addServiceOutside($svo_revision_no,
                                        $svo_date,
                                        $svo_company_name,
                                        $svo_machine_model,
                                        $svo_machine_sn,
                                        $svo_technician_name,
                                        $svo_emp_receive,
                                        $svo_emp_id_1,
                                        $svo_emp_id_2,
                                        $svo_emp_id_3,
                                        $svo_emp_id_4,
                                        $svo_emp_id_5,
                                        $svo_license_plate_1,
                                        $svo_license_plate_2,
                                        $svo_license_plate_3,
                                        $svo_license_plate_4,
                                        $svo_license_plate_5,
                                        $svo_active_type,
                                        $svo_status,
                                        $svo_case_break_down,
                                        $svo_detail,
                                        $svo_remark,
                                        $company_id,
                                        $svo_pic_path_1,
                                        $svo_pic_path_2,
                                        $svo_pic_path_3,
                                        $svo_pic_path_4,
                                        $svo_pic_path_5)
	{
		// เช็คก่อนว่า ชื่อซ้ำไหม?
		/*$checking = $this->db->where("svo_id",$svo_id)
						->count_all_results("tbl_service_outside");
			if($checking>0){
				return "same";
			} else {*/
				// ไม่ซ้ำ ดำเนินการบันทึกข้อมูล
				// ดึงข้อมูลสมาชิกส่งไปใช้
				$add_customer = $this->db->set('svo_revision_no',$svo_revision_no)
                                            ->set('svo_date',$svo_date)
                                            ->set('svo_company_name',$svo_company_name)
                                            ->set('svo_machine_model',$svo_machine_model)
                                            ->set('svo_machine_sn',$svo_machine_sn)
                                            ->set('svo_technician_name',$svo_technician_name)
                                            ->set('svo_emp_receive',$svo_emp_receive)
                                            ->set('svo_emp_id_1',$svo_emp_id_1)
                                            ->set('svo_emp_id_2',$svo_emp_id_2)
                                            ->set('svo_emp_id_3',$svo_emp_id_3)
                                            ->set('svo_emp_id_4',$svo_emp_id_4)
                                            ->set('svo_emp_id_5',$svo_emp_id_5)
                                            ->set('svo_license_plate_1',$svo_license_plate_1)
                                            ->set('svo_license_plate_2',$svo_license_plate_2)
                                            ->set('svo_license_plate_3',$svo_license_plate_3)
                                            ->set('svo_license_plate_4',$svo_license_plate_4)
                                            ->set('svo_license_plate_5',$svo_license_plate_5)
                                            ->set('svo_active_type',$svo_active_type)
                                            ->set('svo_status',$svo_status)
                                            ->set('svo_case_break_down',$svo_case_break_down)
                                            ->set('svo_detail',$svo_detail)
                                            ->set('svo_remark',$svo_remark)
                                            ->set('company_id',$company_id)
                                            ->set('svo_pic_path_1',$svo_pic_path_1)
                                            ->set('svo_pic_path_2',$svo_pic_path_2)
                                            ->set('svo_pic_path_3',$svo_pic_path_3)
                                            ->set('svo_pic_path_4',$svo_pic_path_4)
                                            ->set('svo_pic_path_5',$svo_pic_path_5)
									->insert('tbl_service_outside');
						if($add_customer){
							return "success";
						} else {
							return "false";
						}
			//}

	}

	public function _getmember($svo_id)
	{
		$member_info = $this->db->where('svo_id',$svo_id)
							->get('tbl_service_outside')->result();
						return $member_info;
	}

	public function _getmember_by_id($svo_id)
	{
		$member_info = $this->db->where('svo_id',$svo_id)
							->get('tbl_service_outside')->result();
						return $member_info;
	}

	public function _editServiceOutside($svo_id ,
                                $svo_revision_no,
                                $svo_date,
                                $svo_company_name,
                                $svo_machine_model,
                                $svo_machine_sn,
                                $svo_technician_name,
                                $svo_emp_receive,
                                $svo_emp_id_1,
                                $svo_emp_id_2,
                                $svo_emp_id_3,
                                $svo_emp_id_4,
                                $svo_emp_id_5,
                                $svo_license_plate_1,
                                $svo_license_plate_2,
                                $svo_license_plate_3,
                                $svo_license_plate_4,
                                $svo_license_plate_5,
                                $svo_active_type,
                                $svo_status,
                                $svo_case_break_down,
                                $svo_detail,
                                $svo_remark,
                                $company_id,
                                $svo_pic_path_1,
                                $svo_pic_path_2,
                                $svo_pic_path_3,
                                $svo_pic_path_4,
                                $svo_pic_path_5)
	{
		// ดึงข้อมูลสมาชิกส่งไปใช้
		$update_customer = $this->db->where('svo_id',$svo_id)
                                        ->set('svo_revision_no',$svo_revision_no)
                                        ->set('svo_date',$svo_date)
                                        ->set('svo_company_name',$svo_company_name)
                                        ->set('svo_machine_model',$svo_machine_model)
                                        ->set('svo_machine_sn',$svo_machine_sn)
                                        ->set('svo_technician_name',$svo_technician_name)
                                        ->set('svo_emp_receive',$svo_emp_receive)
                                        ->set('svo_emp_id_1',$svo_emp_id_1)
                                        ->set('svo_emp_id_2',$svo_emp_id_2)
                                        ->set('svo_emp_id_3',$svo_emp_id_3)
                                        ->set('svo_emp_id_4',$svo_emp_id_4)
                                        ->set('svo_emp_id_5',$svo_emp_id_5)
                                        ->set('svo_license_plate_1',$svo_license_plate_1)
                                        ->set('svo_license_plate_2',$svo_license_plate_2)
                                        ->set('svo_license_plate_3',$svo_license_plate_3)
                                        ->set('svo_license_plate_4',$svo_license_plate_4)
                                        ->set('svo_license_plate_5',$svo_license_plate_5)
                                        ->set('svo_active_type',$svo_active_type)
                                        ->set('svo_status',$svo_status)
                                        ->set('svo_case_break_down',$svo_case_break_down)
                                        ->set('svo_detail',$svo_detail)
                                        ->set('svo_remark',$svo_remark)
                                        ->set('company_id',$company_id)
                                        ->set('svo_pic_path_1',$svo_pic_path_1)
                                        ->set('svo_pic_path_2',$svo_pic_path_2)
                                        ->set('svo_pic_path_3',$svo_pic_path_3)
                                        ->set('svo_pic_path_4',$svo_pic_path_4)
                                        ->set('svo_pic_path_5',$svo_pic_path_5)
							->update('tbl_service_outside');
				if($update_customer){
					return "success";
				} else {
					return "false";
				}
	}

	public function _delete_ServiceOutside($svo_id)
	{
		$query = $this->db->where("svo_id",$svo_id)
					->get("tbl_service_outside")->result();
			foreach ($query as $aaa) {
				$delete_photo = $aaa->cus_pic_path;
			}
			unlink("theme/photoserviceoutside/".$delete_photo);
			unlink("theme/photoserviceoutsidethumbnail/".$delete_photo);
		
			$delete = $this->db->where("svo_id",$svo_id)
						->delete("tbl_service_outside");
					return $delete;
	}

	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */