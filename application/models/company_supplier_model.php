<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company_supplier_model extends CI_Model {

	function __construct(){

		parent::__construct();


    }
    
    public function _count_company_supplier()
    {
        $count = $this->db->count_all("tbl_company_supplier");
                    return $count;
    }

    public function _get_company_supplier_AllData()
    {
         
        // ดึงข้อมูลทั้งหมด ไปใช้งาน
        $query = $this->db->order_by("com_sup_id","DESC")
                        ->get("tbl_company_supplier")
                        ->result();
                    return $query;
    }


    public function _query_company_supplier($company_id)
    {
        $query = $this->db->where("com_sup_id",$company_id)
                        ->get("tbl_company_supplier")
                        ->result();
                    return $query;
    }



    public function _add_machine_company_supplier($company_name,$company_addr1,$company_addr2,$company_addr3,
    $company_city,$company_zip_code,$company_tel,$company_fax,$company_capital_investment,$company_email,
    $company_bussiness_group,$product_type,$company_status,$company_area,
    $company_indust,$company_www,$company_facebook,$company_distance_office,
    $company_googlemap_link,$company_remark)
	{
        // Check
        $checking = $this->db->where("com_sup_name",$company_name)
                        ->count_all_results("tbl_company_supplier");

            if($checking==0){
                // ไม่มีข้อมูล บันทึกข้อมูลได้
                $query = $this->db->set("com_sup_name",$company_name)
                ->set("com_sup_addr1",$company_addr1)
                ->set("com_sup_addr2",$company_addr2)
                ->set("com_sup_addr3",$company_addr3)
                ->set("com_sup_city",$company_city)
                ->set("com_sup_zipcode",$company_zip_code)
                ->set("com_sup_tel",$company_tel)
                ->set("com_sup_fax",$company_fax)
                ->set("com_sup_cap_invest",$company_capital_investment)
                ->set("com_sup_email",$company_email)
                ->set("com_sup_group_bussiness",$company_bussiness_group)
                ->set("com_sup_product_type",$product_type)
                ->set("com_sup_status",$company_status)
                ->set("com_sup_area",$company_area)
                ->set("com_sup_indust",$company_indust)
                ->set("com_sup_www",$company_www)
                ->set("com_sup_facebook",$company_facebook)
                ->set("com_sup_distance_office",$company_distance_office)
                ->set("com_sup_googlemap_link",$company_googlemap_link)
                ->set("com_sup_remark",$company_remark)                        
                        ->insert("tbl_company_supplier");
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
    


    
    

    public function _edit_company_supplier($company_id,$company_name,$company_addr1,$company_addr2,$company_addr3,
    $company_city,$company_zip_code,$company_tel,$company_fax,$company_capital_investment,$company_email,
    $company_bussiness_group,$product_type,$company_status,$company_area,
    $company_indust,$company_www,$company_facebook,$company_distance_office,
    $company_googlemap_link,$company_remark)
	{
        // Check
        $checking = $this->db->where("com_sup_id",$company_id)
                        ->count_all_results("tbl_company_supplier");

            if($checking>0){
                // ไม่มีข้อมูล บันทึกข้อมูลได้

                // เช็คว่าข้อมูลซ้ำเดิมหรือไม่
                $check_same = $this->db->where("com_sup_name",$company_name)
                                ->count_all_results("tbl_company_supplier");
                    if($check_same>0){
                        // ซ้ำ
                        return "same";
                    } else {
                        // แก้ไขได้
                        $query = $this->db->where("com_sup_id",$company_id)
                                ->set("com_sup_name",$company_name)
                                ->set("com_sup_addr1",$company_addr1)
                                ->set("com_sup_addr2",$company_addr2)
                                ->set("com_sup_addr3",$company_addr3)
                                ->set("com_sup_city",$company_city)
                                ->set("com_sup_zipcode",$company_zip_code)
                                ->set("com_sup_tel",$company_tel)
                                ->set("com_sup_fax",$company_fax)
                                ->set("com_sup_cap_invest",$company_capital_investment)
                                ->set("com_sup_email",$company_email)
                                ->set("com_sup_group_bussiness",$company_bussiness_group)
                                ->set("com_sup_product_type",$product_type)
                                ->set("com_sup_status",$company_status)
                                ->set("com_sup_area",$company_area)
                                ->set("com_sup_indust",$company_indust)
                                ->set("com_sup_www",$company_www)
                                ->set("com_sup_facebook",$company_facebook)
                                ->set("com_sup_distance_office",$company_distance_office)
                                ->set("com_sup_googlemap_link",$company_googlemap_link)
                                ->set("com_sup_remark",$company_remark)   
                                ->update("tbl_company_supplier");                     

                            if($query){
                                return "success";
                            } else {
                                return "false";
                            }

                    }

            } else {
                // Error
                return "error";
                
            }

        
    }


    public function _delete_company_supplier($company_id)
    {
        // ตรวจสอบว่ามีข้อมูลหรือไม่
        $checking = $this->db->where("com_sup_id",$company_id)
                        ->count_all_results("tbl_company_supplier");
                if($checking==0){
                    // ไม่พบข้อมูล
                    return "empty";
                } else {
                    // มีข้อมูล ลบได้
                    $query_delete = $this->db->where("com_sup_id",$company_id)
                                        ->delete("tbl_company_supplier");
                                if($query_delete){
                                    return "true";
                                } else {
                                    return "false";
                                }
                }
    }



}
