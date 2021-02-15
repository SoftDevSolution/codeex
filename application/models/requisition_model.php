<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Requisition_model extends CI_Model {

	function __construct(){

		parent::__construct();


	}

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

	public function _add_new_requisition($rqs_date,$emp_id,$rqs_pn,$vs_id,$company_id,$rqs_remark,$rqs_status,$username_member)
	{
        // ดำเนินการ อัพเดทข้อมูล
			$save_date = date("Y-m-d H:i:s");
			$insert_data = $this->db->set("rqs_date",$rqs_date)
							->set("emp_id",$emp_id)
							->set("rqs_pn",$rqs_pn)
							->set("vs_id",$vs_id)
							->set("company_id",$company_id)
							->set("rqs_remark",$rqs_remark)
							->set("rqs_status",$rqs_status)
							->set("create_user",$username_member)
							->set("create_date",$save_date)
							->set("update_user","")
							->set("update_date",$save_date)
							->insert("tbl_requisition");
                        return $insert_data;
	}

	public function _edit_requisition($rqs_id,$rqs_date,$emp_id,$rqs_pn,$vs_id,$company_id,$rqs_remark,$rqs_status,$update_user)
	{
        // ดำเนินการ อัพเดทข้อมูล
			$save_date = date("Y-m-d H:i:s");
			$update_data = $this->db->where("rqs_id",$rqs_id)
							->set("rqs_date",$rqs_date)
							->set("emp_id",$emp_id)
							->set("rqs_pn",$rqs_pn)
							->set("vs_id",$vs_id)
							->set("company_id",$company_id)
							->set("rqs_remark",$rqs_remark)
							->set("rqs_status",$rqs_status)
							->set("update_user",$update_user)
							->set("update_date",$save_date)
							->update("tbl_requisition");
                        return $update_data;
	}

	public function _remove_requisition($rqs_id)
	{
		// ค้นหา requisition_id 

		// Update 
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


}
