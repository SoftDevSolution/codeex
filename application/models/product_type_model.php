<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_type_model extends CI_Model {

	function __construct(){

		parent::__construct();


    }

    public function _get_product_type()
    {
         
        // ดึงข้อมูลทั้งหมด ไปใช้งาน
        $query = $this->db->order_by("product_type_id","DESC")
                        ->get("tbl_product_type")
                        ->result();
                    return $query;
    }
    
    public function _count_product_type()
    {
        $count = $this->db->count_all("tbl_product_type");
                    return $count;
    }

	public function _add_product_type($product_type_name)
	{
        // Check
        $checking = $this->db->where("product_type_name",$product_type_name)
                        ->count_all_results("tbl_product_type");

            if($checking==0){
                // ไม่มีข้อมูล บันทึกข้อมูลได้
                $query = $this->db->set("product_type_name",$product_type_name)
                        ->insert("tbl_product_type");
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

    public function _delete_product_type($product_type_id)
    {
        // ตรวจสอบว่ามีข้อมูลหรือไม่
        $checking = $this->db->where("product_type_id",$product_type_id)
                        ->count_all_results("tbl_product_type");
                if($checking==0){
                    // ไม่พบข้อมูล
                    return "empty";
                } else {
                    // มีข้อมูล ลบได้
                    $query_delete = $this->db->where("product_type_id",$product_type_id)
                                        ->delete("tbl_product_type");
                                if($query_delete){
                                    return "true";
                                } else {
                                    return "false";
                                }
                }
    }

    public function _query_product_type($product_type_id)
    {
        $query = $this->db->where("product_type_id",$product_type_id)
                        ->get("tbl_product_type")
                        ->result();
                    return $query;
    }

	public function _edit_product_type($product_type_id,$product_type_name)
	{
        // Check
        $checking = $this->db->where("product_type_id",$product_type_id)
                        ->count_all_results("tbl_product_type");

            if($checking>0){
                // ไม่มีข้อมูล บันทึกข้อมูลได้
                $query = $this->db->where("product_type_id",$product_type_id)
                        ->set("product_type_name",$product_type_name)
                        ->update("tbl_product_type");

                    if($query){
                        return "success";
                    } else {
                        return "false";
                    }

            } else {
                // Error
                return "error";
                
            }

        
    }




}
