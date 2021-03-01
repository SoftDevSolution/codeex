<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Machine_type_model extends CI_Model {

	function __construct(){

		parent::__construct();


    }
    
    public function _count_machine_type()
    {
        $count = $this->db->count_all("tbl_machine_type");
                    return $count;
    }

	public function _add_machine_type($machine_type_name)
	{
        // Check
        $checking = $this->db->where("machine_type_name",$machine_type_name)
                        ->count_all_results("tbl_machine_type");

            if($checking==0){
                // ไม่มีข้อมูล บันทึกข้อมูลได้
                $query = $this->db->set("machine_type_name",$machine_type_name)
                        ->insert("tbl_machine_type");
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
    
    public function _get_machine_type_AllData()
    {
         
        // ดึงข้อมูลทั้งหมด ไปใช้งาน
        $query = $this->db->order_by("machine_type_id","DESC")
                        ->get("tbl_machine_type")
                        ->result();
                    return $query;
    }

    public function _delete_machine_type($machine_type_id)
    {
        // ตรวจสอบว่ามีข้อมูลหรือไม่
        $checking = $this->db->where("machine_type_id",$machine_type_id)
                        ->count_all_results("tbl_machine_type");
                if($checking==0){
                    // ไม่พบข้อมูล
                    return "empty";
                } else {
                    // มีข้อมูล ลบได้
                    $query_delete = $this->db->where("machine_type_id",$machine_type_id)
                                        ->delete("tbl_machine_type");
                                if($query_delete){
                                    return "true";
                                } else {
                                    return "false";
                                }
                }
    }

    public function _query_machine_type($machine_type_id)
    {
        $query = $this->db->where("machine_type_id",$machine_type_id)
                        ->get("tbl_machine_type")
                        ->result();
                    return $query;
    }

	public function _edit_machine_type($machine_type_id,$machine_type_name)
	{
        // แก้ไขได้
        $query = $this->db->where("machine_type_id",$machine_type_id)
                ->set("machine_type_name",$machine_type_name)
                ->update("tbl_machine_type");

                if($query){
                    return "success";
                } else {
                    return "false";
                }
        
    }




}
