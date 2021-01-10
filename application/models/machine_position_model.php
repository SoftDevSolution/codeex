<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Machine_position_model extends CI_Model {

	function __construct(){

		parent::__construct();


    }
    
    public function _count_machine_position()
    {
        $count = $this->db->count_all("tbl_position");
                    return $count;
    }

	public function _add_machine_position($position_name)
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
    
    public function _get_machine_position_AllData()
    {
         
        // ดึงข้อมูลทั้งหมด ไปใช้งาน
        $query = $this->db->order_by("position_id","DESC")
                        ->get("tbl_position")
                        ->result();
                    return $query;
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

    public function _query_machine_position($position_id)
    {
        $query = $this->db->where("position_id",$position_id)
                        ->get("tbl_position")
                        ->result();
                    return $query;
    }

	public function _edit_machine_position($position_id,$position_name)
	{
        // Check
        $checking = $this->db->where("position_id",$position_id)
                        ->count_all_results("tbl_position");

            if($checking>0){
                // ไม่มีข้อมูล บันทึกข้อมูลได้

                // เช็คว่าข้อมูลซ้ำเดิมหรือไม่
                $check_same = $this->db->where("position_name",$position_name)
                                ->count_all_results("tbl_position");
                    if($check_same>0){
                        // ซ้ำ
                        return "same";
                    } else {
                        // แก้ไขได้
                        $query = $this->db->where("position_id",$position_id)
                                ->set("position_name",$position_name)
                                ->update("tbl_position");

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
