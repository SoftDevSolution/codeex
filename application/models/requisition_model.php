<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Requisition_model extends CI_Model {

	function __construct(){

		parent::__construct();

	}

	// Status Requisition
	// 1. active  พร้อมใช้งาน
	// 2. used  กำลังใช้งาน2
	// 3. complete  สำเร็จ
	// 4. cancle  ยกเลิกรายการ

	public function _get_all()
	{
		$query = $this->db->order_by("rqs_id","DESC")
					->get("tbl_requisition")->result();
				return $query;
	}

	public function _get_all_active()
	{
		$query = $this->db->order_by("rqs_id","DESC")
					->where("rqs_status","active")
					->get("tbl_requisition")->result();
				return $query;
	}

	public function _get_requisition_by_id($rqs_id)
	{
		$query = $this->db->where("rqs_id",$rqs_id)
					->get("tbl_requisition")->result();
				return $query;
	}

	public function _get_requisition_by_company_id($company_id)
	{
		$query = $this->db->where("company_id",$company_id)
					->get("tbl_requisition")->result();
				return $query;
	}

	public function _add_new_requisition($rqs_date,$emp_id,$vs_id,$company_id,$machine_serial_no,$model_id,$rqs_remark,$rqs_status,$username_member)
	{
        // ดำเนินการ อัพเดทข้อมูล
			$save_date = date("Y-m-d H:i:s");
			$insert_data = $this->db->set("rqs_date",$rqs_date)
							->set("emp_id",$emp_id)
							->set("vs_id",$vs_id)
							->set("company_id",$company_id)
							->set("machine_serial_no",$machine_serial_no)
							->set("model_id",$model_id)
							->set("rqs_remark",$rqs_remark)
							->set("rqs_status",$rqs_status)
							->set("create_user",$username_member)
							->set("create_date",$save_date)
							->set("update_user","")
							->set("update_date",$save_date)
							->insert("tbl_requisition");
                        return $insert_data;
	}

	public function _edit_requisition($rqs_id,$rqs_date,$emp_id,$vs_id,$company_id,$machine_serial_no,$model_id,$rqs_remark,$rqs_status,$username_member)
	{
        // ดำเนินการ อัพเดทข้อมูล
			$save_date = date("Y-m-d H:i:s");
			$update_data = $this->db->where("rqs_id",$rqs_id)
							->set("rqs_date",$rqs_date)
							->set("emp_id",$emp_id)
							->set("vs_id",$vs_id)
							->set("company_id",$company_id)
							->set("machine_serial_no",$machine_serial_no)
							->set("model_id",$model_id)
							->set("rqs_remark",$rqs_remark)
							->set("rqs_status",$rqs_status)
							->set("update_user",$username_member)
							->set("update_date",$save_date)
							->update("tbl_requisition");
                        return $update_data;
	}

	

	public function _get_inventory_in_invoice($rqs_id)
	{
		// Check data
		if($rqs_id=="" or empty($rqs_id)){
			return false;
		} else {
			// ดำเนินการ ดึงข้อมูลไปใช้งาน
			$query = $this->db->where("rqs_id",$rqs_id)
							->order_by("id_inven_to_invoice","DESC")
							->get("tbl_add_inventory_to_invoice")->result();
						return $query;

		}
	}

	public function _get_visitor_customer($vs_id)
	{
		$query = $this->db->where("vs_id",$vs_id)
					->get("tbl_visitor_customer")->result();
				return $query;
	}


	public function _edit_machine_status($machine_id)
    {
        $query = $this->db->where("machine_id",$machine_id)
                    ->set("status_machine","active")
                    ->update("tbl_machine");

                if($query){
                    return "success";
                } else {
                    return "false";
                }
    }

	public function _edit_requisition_status($rqs_id,$update_user)
    {
		$save_date = date("Y-m-d H:i:s");
		
        $query = $this->db->where("rqs_id",$rqs_id)
                    ->set("rqs_status","cancel")
					->set("update_date",$save_date)
					->set("update_user",$update_user)
                    ->update("tbl_requisition");

                if($query){
                    return "success";
                } else {
                    return "false";
                }
    }

	public function _get_all_inventory_to_invoice($rqs_id)
	{
		$query = $this->db->where("rqs_id",$rqs_id)
					->get("tbl_add_inventory_to_invoice")->result();
				return $query;
	}

	public function _remove_requisition($rqs_id)
	{
		// ค้นหา requisition_id 
			$delete = $this->db->where("rqs_id",$rqs_id)
						->delete("tbl_add_inventory_to_invoice");
					return $delete;
					


		// Update 
	}


}
