<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Visitor_model extends CI_Model {

	function __construct(){

		parent::__construct();


    }
    
    public function _count_visitor()
    {
        $count = $this->db->count_all("tbl_visitor");
                    return $count;
    }

	public function _add_visitor($vs_name,
                                    $vs_address,
                                    $vs_company,
                                    $vs_position,
                                    $vs_branch,
                                    $vs_tel_1,
                                    $vs_tel_2,
                                    $vs_tel_main,
                                    $vs_mobile_phone,
                                    $vs_email,
                                    $vs_email_personal)
	{
        
                // ไม่มีข้อมูล บันทึกข้อมูลได้
                $query = $this->db->set("vs_name",$vs_name)
                                    ->set("vs_address",$vs_address)
                                    ->set("vs_company",$vs_company)
                                    ->set("vs_position",$vs_position)
                                    ->set("vs_branch",$vs_branch)
                                    ->set("vs_tel_1",$vs_tel_1)
                                    ->set("vs_tel_2",$vs_tel_2)
                                    ->set("vs_tel_main",$vs_tel_main)
                                    ->set("vs_mobile_phone",$vs_mobile_phone)
                                    ->set("vs_email",$vs_email)
                                    ->set("vs_email_personal",$vs_email_personal)
                        ->insert("tbl_visitor");
                    if($query){
                        return "success";
                    } else {
                        return "false";
                    }
          

        
    }
    
    public function _get_visitor_AllData()
    {
         
        // ดึงข้อมูลทั้งหมด ไปใช้งาน
        $query = $this->db->order_by("vs_id","DESC")
                        ->get("tbl_visitor")
                        ->result();
                    return $query;
    }

    public function _delete_visitor($vs_id)
    {
       
                    // มีข้อมูล ลบได้
                    $query_delete = $this->db->where("vs_id",$vs_id)
                                        ->delete("tbl_visitor");
                                if($query_delete){
                                    return "true";
                                } else {
                                    return "false";
                                }
                
    }

    public function _query_visitor($vs_id)
    {
        $query = $this->db->where("vs_id",$vs_id)
                        ->get("tbl_visitor")
                        ->result();
                    return $query;
    }

	public function _edit_visitor($vs_id,
                                $vs_name,
                                $vs_address,
                                $vs_company,
                                $vs_position,
                                $vs_branch,
                                $vs_tel_1,
                                $vs_tel_2,
                                $vs_tel_main,
                                $vs_mobile_phone,
                                $vs_email,
                                $vs_email_personal)
	{
      
           
                        // แก้ไขได้
                        $query = $this->db->where("vs_id",$vs_id)
                                ->set("vs_name",$vs_name)
                                ->set("vs_address",$vs_address)
                                ->set("vs_company",$vs_company)
                                ->set("vs_position",$vs_position)
                                ->set("vs_branch",$vs_branch)
                                ->set("vs_tel_1",$vs_tel_1)
                                ->set("vs_tel_2",$vs_tel_2)
                                ->set("vs_tel_main",$vs_tel_main)
                                ->set("vs_mobile_phone",$vs_mobile_phone)
                                ->set("vs_email",$vs_email)
                                ->set("vs_email_personal",$vs_email_personal)
                                ->update("tbl_visitor");
                            

                            if($query){
                                //return $query ;
                                return "success";
                            } else {
                                return "false";
                            }

                 

           
        
    }




}
