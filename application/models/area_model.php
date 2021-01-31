<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Area_model extends CI_Model {

	function __construct(){

		parent::__construct();


	}

	public function _getAll()
	{
		// ดึงข้อมูล employee ส่งไปใช้งาน
        $query = $this->db->order_by("id_area","DESC")
                    ->get('tbl_area')->result();
                        return $query;
    }	

	public function _count_area()
	{
		// ดึงข้อมูล employee ส่งไปใช้งาน
        $count_data = $this->db->count_all('tbl_area');
                        return $count_data;
    }

	public function _get_area_by_id($id_area)
	{
		// ดึงข้อมูล employee ส่งไปใช้งาน
        $count_data = $this->db->where('id_area',$id_area)
                        ->get("tbl_area")->result();
                        return $count_data;
    }

    public function _add_area($area_name)
    {
        // Check
        $checking = $this->db->where("area_name",$area_name)
                        ->count_all_results("tbl_area");

            if($checking==0){
                // ไม่มีข้อมูล บันทึกข้อมูลได้
                $query_add = $this->db->set("area_name",$area_name)
                        ->insert("tbl_area");
                    if($query_add){
                        return "success";
                    } else {
                        return "false";
                    }
            } else {
                // ซ้ำ แจ้งกลับไป
                return "same";
                
            }

    }
    
	public function _edit_area($id_area,$area_name)
	{
        // Check
        $checking = $this->db->where("id_area",$id_area)
                        ->count_all_results("tbl_area");
            if($checking>0){
                // มีข้อมูลเดิมอยู่ บันทึกข้อมูลได้
                        $query = $this->db->where("id_area",$id_area)
                                ->set("area_name",$area_name)
                                ->update("tbl_area");

                            if($query){
                                return "success";
                            } else {
                                return "false";
                            }

                    }
    }

    public function _delete_area($id_area)
    {
        // ตรวจสอบว่ามีข้อมูลหรือไม่
        $checking = $this->db->where("id_area",$id_area)
                        ->count_all_results("tbl_area");
                if($checking==0){
                    // ไม่พบข้อมูล
                    return "empty";
                } else {
                    // มีข้อมูล ลบได้
                    $query_delete = $this->db->where("id_area",$id_area)
                                        ->delete("tbl_area");
                                if($query_delete){
                                    return "true";
                                } else {
                                    return "false";
                                }
                }
    }
    

}
