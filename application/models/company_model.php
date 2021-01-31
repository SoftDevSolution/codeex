<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company_model extends CI_Model {

	function __construct(){

		parent::__construct();


    }
    
    public function _count_company()
    {
        $count = $this->db->count_all("tbl_company");
                    return $count;
    }

    public function _get_company_AllData()
    {
         
        // ดึงข้อมูลทั้งหมด ไปใช้งาน
        $query = $this->db->order_by("company_id","DESC")
                        ->get("tbl_company")
                        ->result();
                    return $query;
    }


    public function _query_company($company_id)
    {
        $query = $this->db->where("company_id",$company_id)
                        ->get("tbl_company")
                        ->result();
                    return $query;
    }



    public function _add_machine_company($company_name,$company_addr1,$company_addr2,$company_addr3,
    $company_city,$company_zip_code,$company_tel,$company_fax,$company_capital_investment,$company_email,
    $company_bussiness_group,$product_type,$company_status,$company_area,
    $company_indust,$company_www,$company_facebook,$company_distance_office,
    $company_googlemap_link,$company_remark)
	{
        // Check
        $checking = $this->db->where("company_name",$company_name)
                        ->count_all_results("tbl_company");

            if($checking==0){
                // ไม่มีข้อมูล บันทึกข้อมูลได้
                $query = $this->db->set("company_name",$company_name)
                        ->set("company_addr1",$company_addr1)
                        ->set("company_addr2",$company_addr2)
                        ->set("company_addr3",$company_addr3)
                        ->set("company_city",$company_city)
                        ->set("company_zip_code",$company_zip_code)
                        ->set("company_tel",$company_tel)
                        ->set("company_fax",$company_fax)
                        ->set("company_capital_investment",$company_capital_investment)
                        ->set("company_email",$company_email)
                        ->set("company_bussiness_group",$company_bussiness_group)
                        ->set("company_product_type",$product_type)
                        ->set("company_status",$company_status)
                        ->set("company_area",$company_area)
                        ->set("company_indust",$company_indust)
                        ->set("company_www",$company_www)
                        ->set("company_facebook",$company_facebook)
                        ->set("company_distance_office",$company_distance_office)
                        ->set("company_googlemap_link",$company_googlemap_link)
                        ->set("company_remark",$company_remark)                        
                        ->insert("tbl_company");
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
    


    
    

    public function _edit_company($company_id,$company_name,$company_addr1,$company_addr2,$company_addr3,
    $company_city,$company_zip_code,$company_tel,$company_fax,$company_capital_investment,$company_email,
    $company_bussiness_group,$product_type,$company_status,$company_area,
    $company_indust,$company_www,$company_facebook,$company_distance_office,
    $company_googlemap_link,$company_remark)
	{
        // Check
        $checking = $this->db->where("company_id",$company_id)
                        ->count_all_results("tbl_company");

            if($checking>0){
                // ไม่มีข้อมูล บันทึกข้อมูลได้
                $query = $this->db->where("company_id",$company_id)
                        ->set("company_name",$company_name)
                        ->set("company_addr1",$company_addr1)
                        ->set("company_addr2",$company_addr2)
                        ->set("company_addr3",$company_addr3)
                        ->set("company_city",$company_city)
                        ->set("company_zip_code",$company_zip_code)
                        ->set("company_tel",$company_tel)
                        ->set("company_fax",$company_fax)
                        ->set("company_capital_investment",$company_capital_investment)
                        ->set("company_email",$company_email)
                        ->set("company_bussiness_group",$company_bussiness_group)
                        ->set("company_product_type",$product_type)
                        ->set("company_status",$company_status)
                        ->set("company_area",$company_area)
                        ->set("company_indust",$company_indust)
                        ->set("company_www",$company_www)
                        ->set("company_facebook",$company_facebook)
                        ->set("company_distance_office",$company_distance_office)
                        ->set("company_googlemap_link",$company_googlemap_link)
                        ->set("company_remark",$company_remark)   
                        ->update("tbl_company");

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


    public function _delete_company($company_id)
    {
        // ตรวจสอบว่ามีข้อมูลหรือไม่
        $checking = $this->db->where("company_id",$company_id)
                        ->count_all_results("tbl_company");
                if($checking==0){
                    // ไม่พบข้อมูล
                    return "empty";
                } else {
                    // มีข้อมูล ลบได้
                    $query_delete = $this->db->where("company_id",$company_id)
                                        ->delete("tbl_company");
                                if($query_delete){
                                    return "true";
                                } else {
                                    return "false";
                                }
                }
    }


    public function _get_factory_group()
    {
         
        // ดึงข้อมูลทั้งหมด ไปใช้งาน
        $query = $this->db->order_by("id_factory_group","DESC")
                        ->get("tbl_factory_group")
                        ->result();
                    return $query;
    }

    public function _count_factory_group()
    {
        $count = $this->db->count_all("tbl_factory_group");
                    return $count;
    }

    public function _query_factory_group($id_factory_group)
    {
        $query = $this->db->where("id_factory_group",$id_factory_group)
                        ->get("tbl_factory_group")
                        ->result();
                    return $query;
    }

    public function _add_factory_group($name_factory_group)
	{
        // Check
        $checking = $this->db->where("name_factory_group",$name_factory_group)
                        ->count_all_results("tbl_factory_group");

            if($checking==0){
                // ไม่มีข้อมูล บันทึกข้อมูลได้
                $query = $this->db->set("name_factory_group",$name_factory_group)
                        ->insert("tbl_factory_group");
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

    public function _edit_factory_group($id_factory_group,$name_factory_group)
	{
        // Check
        $checking = $this->db->where("id_factory_group",$id_factory_group)
                        ->count_all_results("tbl_factory_group");

            if($checking>0){
                // ไม่มีข้อมูล บันทึกข้อมูลได้
                $query = $this->db->where("id_factory_group",$id_factory_group)
                        ->set("name_factory_group",$name_factory_group) 
                        ->update("tbl_factory_group");

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

    public function _delete_factory_group($id_factory_group)
    {
        // ตรวจสอบว่ามีข้อมูลหรือไม่
        $checking = $this->db->where("id_factory_group",$id_factory_group)
                        ->count_all_results("tbl_factory_group");
                if($checking==0){
                    // ไม่พบข้อมูล
                    return "empty";
                } else {
                    // มีข้อมูล ลบได้
                    $query_delete = $this->db->where("id_factory_group",$id_factory_group)
                                        ->delete("tbl_factory_group");
                                if($query_delete){
                                    return "true";
                                } else {
                                    return "false";
                                }
                }
    }



}
