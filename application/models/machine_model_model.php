<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Machine_model_model extends CI_Model {

	function __construct(){

		parent::__construct();


    }

    public function _get_machine_model_AllData()
    {
         
        // ดึงข้อมูลทั้งหมด ไปใช้งาน
        $query = $this->db->order_by("model_id","DESC")
                        ->get("tbl_model")
                        ->result();
                    return $query;
    }
    
    public function _count_machine_model()
    {
        $count = $this->db->count_all("tbl_model");
                    return $count;
    }

	public function _add_machine_model($model_name)
	{
        // Check
        $checking = $this->db->where("model_name",$model_name)
                        ->count_all_results("tbl_model");

            if($checking==0){
                // ไม่มีข้อมูล บันทึกข้อมูลได้
                $query = $this->db->set("model_name",$model_name)
                        ->insert("tbl_model");
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

    public function _delete_machine_model($model_id)
    {
        // ตรวจสอบว่ามีข้อมูลหรือไม่
        $checking = $this->db->where("model_id",$model_id)
                        ->count_all_results("tbl_model");
                if($checking==0){
                    // ไม่พบข้อมูล
                    return "empty";
                } else {
                    // มีข้อมูล ลบได้
                    $query_delete = $this->db->where("model_id",$model_id)
                                        ->delete("tbl_model");
                                if($query_delete){
                                    return "true";
                                } else {
                                    return "false";
                                }
                }
    }

    public function _query_machine_model($model_id)
    {
        $query = $this->db->where("model_id",$model_id)
                        ->get("tbl_model")
                        ->result();
                    return $query;
    }

	public function _edit_machine_model($model_id,$model_name)
	{
        $query = $this->db->where("model_id",$model_id)
                        ->set("model_name",$model_name)
                        ->update("tbl_model");
                if($query){
                    return "success";
                } else {
                    return "false";
                }
    }

}
