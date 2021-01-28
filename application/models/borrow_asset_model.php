<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Borrow_asset_model extends CI_Model {

	function __construct(){

		parent::__construct();


    }
    
    public function _count_borrow_asset()
    {
        $count = $this->db->count_all("tbl_borrow_asset");
                    return $count;
    }

	public function _add_borrow_asset($asset_id,
                                        $br_cause,
                                        $br_work,
                                        $br_detail,
                                        $br_no,
                                        $br_return_date,
                                        $br_user,
                                        $br_accept,
                                        $br_date)
	{
       
                // ไม่มีข้อมูล บันทึกข้อมูลได้
                $query = $this->db->set("asset_id",$asset_id)
                                    ->set("br_cause",$br_cause)
                                    ->set("br_work",$br_work)
                                    ->set("br_detail",$br_detail)
                                    ->set("br_no",$br_no)
                                    ->set("br_return_date",$br_return_date)
                                    ->set("br_user",$br_user)                                    
                                    ->set("br_accept",$br_accept)
                                    ->set("br_date",$br_date)
                                    ->insert("tbl_borrow_asset");
                    if($query){
                        return "success";
                    } else {
                        return "false";
                    }
            

        
    }
    
    public function _get_borrow_asset_AllData()
    {
         
        // ดึงข้อมูลทั้งหมด ไปใช้งาน
        $query = $this->db->order_by("br_id","DESC")
                        ->get("tbl_borrow_asset")
                        ->result();
                    return $query;
    }

    public function _delete_borrow_asset($br_id)
    {
       
                    // มีข้อมูล ลบได้
                    $query_delete = $this->db->where("br_id",$br_id)
                                        ->delete("tbl_borrow_asset");
                                if($query_delete){
                                    return "true";
                                } else {
                                    return "false";
                                }
              
    }

    public function _query_borrow_asset($br_id)
    {
        $query = $this->db->where("br_id",$br_id)
                        ->get("tbl_borrow_asset")
                        ->result();
                    return $query;
    }

	public function _edit_borrow_asset($br_id,
                                        $asset_id,
                                        $br_cause,
                                        $br_work,
                                        $br_detail,
                                        $br_no,
                                        $br_return_date,
                                        $br_user,
                                        $br_accept,
                                        $br_date)
	{
      
                        // แก้ไขได้
                        $query = $this->db->where("br_id",$br_id)
                                            ->set("asset_id",$asset_id)
                                            ->set("br_cause",$br_cause)
                                            ->set("br_work",$br_work)
                                            ->set("br_detail",$br_detail)
                                            ->set("br_no",$br_no)
                                            ->set("br_return_date",$br_return_date)
                                            ->set("br_user",$br_user)                                    
                                            ->set("br_accept",$br_accept)
                                            ->set("br_date",$br_date)
                                            ->update("tbl_borrow_asset");

                            if($query){
                                return "success";
                            } else {
                                return "false";
                            }

                    
        
    }




}
