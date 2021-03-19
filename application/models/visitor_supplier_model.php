<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Visitor_supplier_model extends CI_Model {

	function __construct(){

		parent::__construct();


    }
    
    public function _count_visitor_supplier()
    {
        $count = $this->db->count_all("tbl_visitor_supplier");
                    return $count;
    }

    public function _count_visitor_supplier_ById($vs_id)
    {
        $count = $this->db->where("vs_id",$vs_id)
                            ->count_all("tbl_visitor_supplier");
                    return $count;
    }

	public function _add_visitor_supplier($vs_name,
                                    $vs_address,
                                    $vs_position,
                                    $vs_branch,
                                    $vs_tel_1,
                                    $vs_tel_2,
                                    $vs_tel_main,
                                    $vs_mobile_phone,
                                    $vs_email,
                                    $vs_email_personal,
                                    $com_sup_id)
	{
        
                // ไม่มีข้อมูล บันทึกข้อมูลได้
                $query = $this->db->set("vs_name",$vs_name)
                                    ->set("vs_address",$vs_address)
                                    ->set("vs_position",$vs_position)
                                    ->set("vs_branch",$vs_branch)
                                    ->set("vs_tel_1",$vs_tel_1)
                                    ->set("vs_tel_2",$vs_tel_2)
                                    ->set("vs_tel_main",$vs_tel_main)
                                    ->set("vs_mobile_phone",$vs_mobile_phone)
                                    ->set("vs_email",$vs_email)
                                    ->set("vs_email_personal",$vs_email_personal)
                                    ->set("com_sup_id",$com_sup_id)
                        ->insert("tbl_visitor_supplier");
                    if($query){
                        return "success";
                    } else {
                        return "false";
                    }
          

        
    }
    
    public function _get_visitor_supplier_AllData_ByCompanyID($company_id)
    {
         
        // ดึงข้อมูลทั้งหมด ไปใช้งาน
        $query = $this->db->where("com_sup_id",$company_id)
                        ->order_by("vs_id","DESC")
                        ->get("tbl_visitor_supplier")
                        ->result();
                    return $query;
    }

    public function _get_visitor_supplier_AllData()
    {
         
        // ดึงข้อมูลทั้งหมด ไปใช้งาน
        $query = $this->db->order_by("vs_id","DESC")
                        ->join("tbl_company_supplier","tbl_visitor_supplier.com_sup_id = tbl_company_supplier.com_sup_id" , "BOTH")
                        ->get("tbl_visitor_supplier")
                        ->result();
                    return $query;
    }

    public function _get_visitor_supplier_by_vs_name($vs_name)
    {
        // ดึงข้อมูลตามเงื่อนไข ไปใช้งาน
        $query = $this->db->like("vs_name",$vs_name)
                        ->join("tbl_company_supplier","tbl_visitor_supplier.com_sup_id = tbl_company_supplier.com_sup_id" , "BOTH")
                        ->get("tbl_visitor_supplier")
                        ->result();
                    return $query;
    }

    public function _get_visitor_supplier_by_com_sup_id($com_sup_id)
    {
        // ดึงข้อมูลตามเงื่อนไข ไปใช้งาน
        $query = $this->db->where("com_sup_id",$com_sup_id)
                        ->order_by("vs_id","DESC")
                        ->get("tbl_visitor_supplier")
                        ->result();
                    return $query;
    }

    public function _get_company_supplier_by_name($vs_name)
    {
        $query = $this->db->where("vs_name",$vs_name)
                        ->get("tbl_visitor_supplier")
                        ->result();
                    return $query;
    }

    public function _delete_visitor_supplier($vs_id)
    {
       
                    // มีข้อมูล ลบได้
                    $query_delete = $this->db->where("vs_id",$vs_id)
                                        ->delete("tbl_visitor_supplier");
                                if($query_delete){
                                    return "true";
                                } else {
                                    return "false";
                                }
                
    }

    public function _query_visitor_supplier($vs_id)
    {
        $query = $this->db->where("vs_id",$vs_id)
                        ->get("tbl_visitor_supplier")
                        ->result();
                    return $query;
    }

	public function _edit_visitor_supplier($vs_id,
                                $vs_name,
                                $vs_address,
                                $vs_position,
                                $vs_branch,
                                $vs_tel_1,
                                $vs_tel_2,
                                $vs_tel_main,
                                $vs_mobile_phone,
                                $vs_email,
                                $vs_email_personal,
                                $com_sup_id)
	{
      
           
                        // แก้ไขได้
                        $query = $this->db->where("vs_id",$vs_id)
                                ->set("vs_name",$vs_name)
                                ->set("vs_address",$vs_address)
                                ->set("vs_position",$vs_position)
                                ->set("vs_branch",$vs_branch)
                                ->set("vs_tel_1",$vs_tel_1)
                                ->set("vs_tel_2",$vs_tel_2)
                                ->set("vs_tel_main",$vs_tel_main)
                                ->set("vs_mobile_phone",$vs_mobile_phone)
                                ->set("vs_email",$vs_email)
                                ->set("vs_email_personal",$vs_email_personal)
                                ->set("com_sup_id",$com_sup_id)
                                ->update("tbl_visitor_supplier");
                            

                            if($query){
                                //return $query ;
                                return "success";
                            } else {
                                return "false";
                            }

                 

           
        
    }




}
