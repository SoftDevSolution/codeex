<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company_customer_model extends CI_Model {

	function __construct(){

		parent::__construct();


    }
    
    public function _count_company_customer()
    {
        $count = $this->db->count_all("tbl_company_customer");
                    return $count;
    }

    public function _get_company_customer_AllData()
    {
         
        // ดึงข้อมูลทั้งหมด ไปใช้งาน
        $query = $this->db->order_by("com_cus_id","DESC")
                        ->get("tbl_company_customer")
                        ->result();
                    return $query;
    }


    public function _query_company_customer($company_id)
    {
        $query = $this->db->where("com_cus_id",$company_id)
                        ->get("tbl_company_customer")
                        ->result();
                    return $query;
    }



    public function _add_machine_company_customer($company_name,$company_addr1,$company_addr2,$company_addr3,
    $company_city,$company_zip_code,$company_tel,$company_fax,$company_capital_investment,$company_email,
    $company_bussiness_group,$product_type,$company_status,$company_area,
    $company_indust,$company_www,$company_facebook,$company_distance_office,
    $company_googlemap_link,$company_remark)
	{
        // Check
        $checking = $this->db->where("com_cus_name",$company_name)
                        ->count_all_results("tbl_company_customer");

            if($checking==0){
                // ไม่มีข้อมูล บันทึกข้อมูลได้
                $query = $this->db->set("com_cus_name",$company_name)
                ->set("com_cus_addr1",$company_addr1)
                ->set("com_cus_addr2",$company_addr2)
                ->set("com_cus_addr3",$company_addr3)
                ->set("com_cus_city",$company_city)
                ->set("com_cus_zipcode",$company_zip_code)
                ->set("com_cus_tel",$company_tel)
                ->set("com_cus_fax",$company_fax)
                ->set("com_cus_cap_invest",$company_capital_investment)
                ->set("com_cus_email",$company_email)
                ->set("com_cus_group_bussiness",$company_bussiness_group)
                ->set("com_cus_product_type",$product_type)
                ->set("com_cus_status",$company_status)
                ->set("com_cus_area",$company_area)
                ->set("com_cus_indust",$company_indust)
                ->set("com_cus_www",$company_www)
                ->set("com_cus_facebook",$company_facebook)
                ->set("com_cus_distance_office",$company_distance_office)
                ->set("com_cus_googlemap_link",$company_googlemap_link)
                ->set("com_cus_remark",$company_remark)                        
                        ->insert("tbl_company_customer");
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
    
    public function _edit_company_customer($company_id,$company_name,$company_addr1,$company_addr2,$company_addr3,
    $company_city,$company_zip_code,$company_tel,$company_fax,$company_capital_investment,$company_email,
    $company_bussiness_group,$product_type,$company_status,$company_area,
    $company_indust,$company_www,$company_facebook,$company_distance_office,
    $company_googlemap_link,$company_remark)
	{
        // Check
        $checking = $this->db->where("com_cus_id",$company_id)
                        ->count_all_results("tbl_company_customer");

            if($checking>0){
                $query = $this->db->where("com_cus_id",$company_id)
                        ->set("com_cus_name",$company_name)
                        ->set("com_cus_addr1",$company_addr1)
                        ->set("com_cus_addr2",$company_addr2)
                        ->set("com_cus_addr3",$company_addr3)
                        ->set("com_cus_city",$company_city)
                        ->set("com_cus_zipcode",$company_zip_code)
                        ->set("com_cus_tel",$company_tel)
                        ->set("com_cus_fax",$company_fax)
                        ->set("com_cus_cap_invest",$company_capital_investment)
                        ->set("com_cus_email",$company_email)
                        ->set("com_cus_group_bussiness",$company_bussiness_group)
                        ->set("com_cus_product_type",$product_type)
                        ->set("com_cus_status",$company_status)
                        ->set("com_cus_area",$company_area)
                        ->set("com_cus_indust",$company_indust)
                        ->set("com_cus_www",$company_www)
                        ->set("com_cus_facebook",$company_facebook)
                        ->set("com_cus_distance_office",$company_distance_office)
                        ->set("com_cus_googlemap_link",$company_googlemap_link)
                        ->set("com_cus_remark",$company_remark)   
                        ->update("tbl_company_customer");                     

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

    public function _delete_company_customer($company_id)
    {
        // ตรวจสอบว่ามีข้อมูลหรือไม่
        $checking = $this->db->where("com_cus_id",$company_id)
                        ->count_all_results("tbl_company_customer");
                if($checking==0){
                    // ไม่พบข้อมูล
                    return "empty";
                } else {
                    // มีข้อมูล ลบได้
                    $query_delete = $this->db->where("com_cus_id",$company_id)
                                        ->delete("tbl_company_customer");
                                if($query_delete){
                                    return "true";
                                } else {
                                    return "false";
                                }
                }
    }



}
