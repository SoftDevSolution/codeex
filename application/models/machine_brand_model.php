<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Machine_brand_model extends CI_Model {

	function __construct(){

		parent::__construct();


    }
    
    public function _count_machine_brand()
    {
        $count = $this->db->count_all("tbl_brand");
                    return $count;
    }

	public function _add_machine_brand($brand_name)
	{
        // Check
        $checking = $this->db->where("brand_name",$brand_name)
                        ->count_all_results("tbl_brand");

            if($checking==0){
                // ไม่มีข้อมูล บันทึกข้อมูลได้
                $query = $this->db->set("brand_name",$brand_name)
                        ->insert("tbl_brand");
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
    
    public function _get_machine_brand_AllData()
    {
         
        // ดึงข้อมูลทั้งหมด ไปใช้งาน
        $query = $this->db->order_by("brand_id","DESC")
                        ->get("tbl_brand")
                        ->result();
                    return $query;
    }

    public function _delete_machine_brand($brand_id)
    {
        // ตรวจสอบว่ามีข้อมูลหรือไม่
        $checking = $this->db->where("brand_id",$brand_id)
                        ->count_all_results("tbl_brand");
                if($checking==0){
                    // ไม่พบข้อมูล
                    return "empty";
                } else {
                    // มีข้อมูล ลบได้
                    $query_delete = $this->db->where("brand_id",$brand_id)
                                        ->delete("tbl_brand");
                                if($query_delete){
                                    return "true";
                                } else {
                                    return "false";
                                }
                }
    }

    public function _query_machine_brand($brand_id)
    {
        $query = $this->db->where("brand_id",$brand_id)
                        ->get("tbl_brand")
                        ->result();
                    return $query;
    }

	public function _edit_machine_brand($brand_id,$brand_name)
	{
        // Check
        $checking = $this->db->where("brand_id",$brand_id)
                        ->count_all_results("tbl_brand");

            if($checking>0){
                // ไม่มีข้อมูล บันทึกข้อมูลได้

                // เช็คว่าข้อมูลซ้ำเดิมหรือไม่
                $check_same = $this->db->where("brand_name",$brand_name)
                                ->count_all_results("tbl_brand");
                    if($check_same>0){
                        // ซ้ำ
                        return "same";
                    } else {
                        // แก้ไขได้
                        $query = $this->db->where("brand_id",$brand_id)
                                ->set("brand_name",$brand_name)
                                ->update("tbl_brand");

                            if($query){
                                return "success";
                            } else {
                                return "false";
                            }

                    }

            } else {
                // Error
                return "error";
                
            }

        
    }




}
