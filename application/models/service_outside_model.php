<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Service_outside_model extends CI_Model {

	function __construct(){

		parent::__construct();

	}

	// Status service outside
	// 1. active  พร้อมใช้งาน
	// 2. complete  สำเร็จ
	// 3. cancle  ยกเลิกรายการ

	public function _getAll()
	{
		// ดึงข้อมูล employee ส่งไปใช้งาน
		$query = $this->db->order_by("svo_id","DESC")->get('tbl_service_outside')->result();
			
		return $query;
	}	

	public function _addServiceOutside($svo_requisition_no,
									$svo_get_date,
									$svo_date_working,
									$svo_company_name,
									$svo_company_id,
									$svo_customer_name,
									$svo_customer_id,
									$svo_emp_receive,
									$svo_emp_id_1,
									$svo_emp_id_2,
									$svo_emp_id_3,
									$svo_license_plate_1,
									$svo_license_plate_2,
									$svo_license_plate_3,
									$svo_status,
									$svo_case_break_down,
									$svo_conclusion,
									$svo_province,
									$svo_zipcode,
									$svo_remark,
									$svo_pic_path_1,
									$svo_pic_path_2,
									$svo_pic_path_3,
                                    $user_create,
									$total_price,
									$vat,
									$labor_cost,
									$traveling_expenses,
									$accommodation_cost,
									$total_all_cost
									)
	{
        $create_date = date("Y-m-d H:i:s");
        $add_customer = $this->db->set('svo_requisition_no',$svo_requisition_no)
                                    ->set('svo_get_date',$svo_get_date)
                                    ->set('svo_date_working',$svo_date_working)
                                    ->set('svo_company_name',$svo_company_name)
                                    ->set('svo_company_id',$svo_company_id)
                                    ->set('svo_customer_name',$svo_customer_name)
                                    ->set('svo_customer_id',$svo_customer_id)
                                    ->set('svo_emp_receive',$svo_emp_receive)
                                    ->set('svo_emp_id_1',$svo_emp_id_1)
                                    ->set('svo_emp_id_2',$svo_emp_id_2)
                                    ->set('svo_emp_id_3',$svo_emp_id_3)
                                    ->set('svo_license_plate_1',$svo_license_plate_1)
                                    ->set('svo_license_plate_2',$svo_license_plate_2)
                                    ->set('svo_license_plate_3',$svo_license_plate_3)
                                    ->set('svo_status',$svo_status)
                                    ->set('svo_case_break_down',$svo_case_break_down)
                                    ->set('svo_conclusion',$svo_conclusion)
                                    ->set('svo_province',$svo_province)
                                    ->set('svo_zipcode',$svo_zipcode)
                                    ->set('svo_remark',$svo_remark)
                                    ->set('svo_pic_path_1',$svo_pic_path_1)
                                    ->set('svo_pic_path_2',$svo_pic_path_2)
                                    ->set('svo_pic_path_3',$svo_pic_path_3)
                                    ->set('total_price',$total_price)
                                    ->set('vat',$vat)
                                    ->set('labor_cost',$labor_cost)
                                    ->set('traveling_expenses',$traveling_expenses)
                                    ->set('accommodation_cost',$accommodation_cost)
                                    ->set('total_all_cost',$total_all_cost)
                                    ->set('user_update',$user_create)
                                    ->set('update_date',$create_date)
									->set('user_create',$user_create)
                                    ->set('create_date',$create_date)
                            ->insert('tbl_service_outside');
                if($add_customer){
                    // ดำเนินการ Update status Requisition เป็น used
                    $update_requisition = $this->db->where("rqs_id",$svo_requisition_no)
                                    ->set("rqs_status","used")
                                    ->update("tbl_requisition");
                            if($update_requisition){
                                return "success";
                            } else {
                                return "false";
                            }
                } else {
                    return "false";
                }

	}

	public function _getmember($svo_id)
	{
		$member_info = $this->db->where('svo_id',$svo_id)
							->get('tbl_service_outside')->result();
						return $member_info;
	}

	public function _get_serviceOutside_by_id($svo_id)
	{
		$member_info = $this->db->where('svo_id',$svo_id)
							->get('tbl_service_outside')->result();
						return $member_info;
	}

	public function _count_serviceOutside_by_id($svo_id)
	{
		$count_results = $this->db->where('svo_id',$svo_id)
							->count_all_results('tbl_service_outside');
						return $count_results;
	}

	public function _editServiceOutside($svo_id,
									$svo_requisition_no,
									$svo_get_date,
									$svo_date_working,
									$svo_company_name,
									$svo_company_id,
									$svo_customer_name,
									$svo_customer_id,
									$svo_emp_receive,
									$svo_emp_id_1,
									$svo_emp_id_2,
									$svo_emp_id_3,
									$svo_license_plate_1,
									$svo_license_plate_2,
									$svo_license_plate_3,
									$svo_status,
									$svo_case_break_down,
									$svo_conclusion,
									$svo_province,
									$svo_zipcode,
									$svo_remark,
									$username_update,
									$total_price,
									$vat,
									$labor_cost,
									$traveling_expenses,
									$accommodation_cost,
									$total_all_cost
									)
	{
		// ดึงข้อมูลสมาชิกส่งไปใช้
        $create_date = date("Y-m-d H:i:s");
		$update_customer = $this->db->where('svo_id',$svo_id)
                                    ->set('svo_requisition_no',$svo_requisition_no)
                                    ->set('svo_get_date',$svo_get_date)
                                    ->set('svo_date_working',$svo_date_working)
                                    ->set('svo_company_name',$svo_company_name)
                                    ->set('svo_company_id',$svo_company_id)
                                    ->set('svo_customer_name',$svo_customer_name)
                                    ->set('svo_customer_id',$svo_customer_id)
                                    ->set('svo_emp_receive',$svo_emp_receive)
                                    ->set('svo_emp_id_1',$svo_emp_id_1)
                                    ->set('svo_emp_id_2',$svo_emp_id_2)
                                    ->set('svo_emp_id_3',$svo_emp_id_3)
                                    ->set('svo_license_plate_1',$svo_license_plate_1)
                                    ->set('svo_license_plate_2',$svo_license_plate_2)
                                    ->set('svo_license_plate_3',$svo_license_plate_3)
                                    ->set('svo_status',$svo_status)
                                    ->set('svo_case_break_down',$svo_case_break_down)
                                    ->set('svo_conclusion',$svo_conclusion)
                                    ->set('svo_province',$svo_province)
                                    ->set('svo_zipcode',$svo_zipcode)
                                    ->set('svo_remark',$svo_remark)
                                    ->set('total_price',$total_price)
                                    ->set('vat',$vat)
                                    ->set('labor_cost',$labor_cost)
                                    ->set('traveling_expenses',$traveling_expenses)
                                    ->set('accommodation_cost',$accommodation_cost)
                                    ->set('total_all_cost',$total_all_cost)
                                    ->set('user_update',$username_update)
                                    ->set('update_date',$create_date)
							->update('tbl_service_outside');
				if($update_customer){
					return "success";
				} else {
					return "false";
				}
	}

	public function _delete_ServiceOutside($svo_id,$username)
	{
		$query = $this->db->where("svo_id",$svo_id)
					->get("tbl_service_outside")->result();
			foreach ($query as $aaa) {
				$svo_requisition_no = $aaa->svo_requisition_no; // id ใบเบิก
			}
		
			// ดำเนินการ ยกเลิกการใช้งาน ใบคืน
			$query_requisition  =$this->db->where("rqs_id",$svo_requisition_no)
								->set("rqs_status","active")
								->update("tbl_requisition");
								
		// 	foreach ($query as $aaa) {
		// 		$delete_photo_1 = $aaa->svo_pic_path_1;
		// 		$delete_photo_2 = $aaa->svo_pic_path_2;
		// 		$delete_photo_3 = $aaa->svo_pic_path_3;

		// 	if(empty($delete_photo_1)){  } else {
		// 		unlink("theme/photoserviceoutside/".$delete_photo_1);
		// 		unlink("theme/photoserviceoutsidethumbnail/".$delete_photo_1);
		// 	}

		// 	if(empty($delete_photo_2)){  } else {
		// 		unlink("theme/photoserviceoutside/".$delete_photo_2);
		// 		unlink("theme/photoserviceoutsidethumbnail/".$delete_photo_2);
		// 	}

		// 	if(empty($delete_photo_3)){  } else {
		// 		unlink("theme/photoserviceoutside/".$delete_photo_3);
		// 		unlink("theme/photoserviceoutsidethumbnail/".$delete_photo_3);
		// 	}

		// 	}
		
			$delete = $this->db->where("svo_id",$svo_id)
						->set("svo_status","cancle")
						->set("user_create",$username)
						->update("tbl_service_outside");
					return $delete;
	}

	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */