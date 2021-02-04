<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Industrial_estate_model extends CI_Model {

	function __construct(){

		parent::__construct();


	}

	public function _getAll()
	{
		// ดึงข้อมูล employee ส่งไปใช้งาน
        $query = $this->db->order_by("id_industrial_estate","DESC")
                    ->get('tbl_industrial_estate')->result();
                        return $query;
    }	

	public function _count_industrial_estate()
	{
		// ดึงข้อมูล employee ส่งไปใช้งาน
        $count_data = $this->db->count_all('tbl_industrial_estate');
                        return $count_data;
    }

	public function _get_industrial_estate_by_id($id_industrial_estate)
	{
		// ดึงข้อมูล employee ส่งไปใช้งาน
        $count_data = $this->db->where('id_industrial_estate',$id_industrial_estate)
                        ->get("tbl_industrial_estate")->result();
                        return $count_data;
    }

    public function _add_industrial_estate($name_industrial_estate)
    {
        // Check
        $checking = $this->db->where("name_industrial_estate",$name_industrial_estate)
                        ->count_all_results("tbl_industrial_estate");

            if($checking==0){
                // ไม่มีข้อมูล บันทึกข้อมูลได้
                $query_add = $this->db->set("name_industrial_estate",$name_industrial_estate)
                        ->insert("tbl_industrial_estate");
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
    
	public function _edit_area($id_industrial_estate,$name_industrial_estate)
	{
        // Check
        $checking = $this->db->where("id_industrial_estate",$id_industrial_estate)
                        ->count_all_results("tbl_industrial_estate");
            if($checking>0){
                // มีข้อมูลเดิมอยู่ บันทึกข้อมูลได้
                        $query = $this->db->where("id_industrial_estate",$id_industrial_estate)
                                ->set("name_industrial_estate",$name_industrial_estate)
                                ->update("tbl_industrial_estate");

                            if($query){
                                return "success";
                            } else {
                                return "false";
                            }

                    }
    }

    public function _delete_industrial_estate($id_industrial_estate)
    {
        // ตรวจสอบว่ามีข้อมูลหรือไม่
        $checking = $this->db->where("id_industrial_estate",$id_industrial_estate)
                        ->count_all_results("tbl_industrial_estate");
                if($checking==0){
                    // ไม่พบข้อมูล
                    return "empty";
                } else {
                    // มีข้อมูล ลบได้
                    $query_delete = $this->db->where("id_industrial_estate",$id_industrial_estate)
                                        ->delete("tbl_industrial_estate");
                                if($query_delete){
                                    return "true";
                                } else {
                                    return "false";
                                }
                }
    }
    

}
