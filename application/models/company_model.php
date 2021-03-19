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

    public function _get_all_visitor_supplier()
    {
        // ดึงข้อมูลทั้งหมด ไปใช้งาน
        $query = $this->db->order_by("vs_id","DESC")
                        ->get("tbl_visitor_supplier")
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

    public function _get_inventory_in_invoice($id_invoice)
    {
        $query = $this->db->where("invoice_id",$id_invoice)
                    // ->join("tbl_invoice","tbl_machine.invoice_id = tbl_invoice.id_invoice")
                    ->order_by("machine_id","DESC")
                    ->get("tbl_machine")->result();
                return $query;
    }

    public function _get_inventory_by_factory($company_id)
    {
        // get company id
        $query_company = $this->db->where("vs_id",$company_id)
                        ->get("tbl_visitor_supplier")->result();
                        foreach ($query_company as $key => $aaa) {
                            $vs_name = $aaa->vs_name;
                        }

        $query = $this->db->where("vs_name",$vs_name)
                    // ->join("tbl_invoice","tbl_machine.invoice_id = tbl_invoice.id_invoice")
                    ->order_by("id_invoice","DESC")
                    ->get("tbl_invoice")->result();
                return $query;
    }

    public function _count_inventory_in_invoice($id_invoice)
    {
        $count_data = $this->db->where("invoice_id",$id_invoice)
                    // ->join("tbl_invoice","tbl_machine.invoice_id = tbl_invoice.id_invoice")
                    ->count_all_results("tbl_machine");
                return $count_data;
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

    public function _query_machine($machine_id)
    {
        $query = $this->db->where("machine_id",$machine_id)
                    ->get("tbl_machine")->result();
                        return $query;
    }

    public function _add_new_machine($invoice_id,$machine_type_id,$model_id,$machine_status,$machine_serial_no,$brand_id,$machine_price,$machine_stock,$machine_sup_inv_no,$machine_sup_inv_date,$machine_warranty_year,$machine_warranty_start_date,$machine_warranty_stop_date,$machine_company_inv_no,$machine_company_inv_date,$machine_warranty_comp_year,$machine_warranty_comp_start_date,$machine_warranty_comp_stop_date)
	{
        // Check
        $checking = $this->db->where("machine_serial_no",$machine_serial_no)
                        ->count_all_results("tbl_machine");

            if($checking==0){
                // ไม่มีข้อมูล บันทึกข้อมูลได้
                $query = $this->db->set("machine_type_id",$machine_type_id)
                        ->set("invoice_id",$invoice_id)
                        ->set("model_id",$model_id)
                        ->set("machine_status",$machine_status)
                        ->set("machine_serial_no",$machine_serial_no)
                        ->set("brand_id",$brand_id)
                        ->set("machine_price",$machine_price)
                        ->set("machine_stock",$machine_stock)
                        ->set("machine_sup_inv_no",$machine_sup_inv_no)
                        ->set("machine_sup_inv_date",$machine_sup_inv_date)
                        ->set("machine_warranty_year",$machine_warranty_year)                      
                        ->set("machine_warranty_start_date",$machine_warranty_start_date)                      
                        ->set("machine_warranty_stop_date",$machine_warranty_stop_date)                      
                        ->set("machine_company_inv_no",$machine_company_inv_no)                      
                        ->set("machine_company_inv_date",$machine_company_inv_date)                      
                        ->set("machine_warranty_comp_year",$machine_warranty_comp_year)                      
                        ->set("machine_warranty_comp_start_date",$machine_warranty_comp_start_date)                      
                        ->set("machine_warranty_comp_stop_date",$machine_warranty_comp_stop_date)    
                        ->set("status_machine","active")          
                        ->insert("tbl_machine");
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

    public function _edit_machine($invoice_id,$machine_id,$machine_type_id,$model_id,$machine_status,$machine_serial_no,$brand_id,$machine_price,$machine_stock,$machine_sup_inv_no,$machine_sup_inv_date,$machine_warranty_year,$machine_warranty_start_date,$machine_warranty_stop_date,$machine_company_inv_no,$machine_company_inv_date,$machine_warranty_comp_year,$machine_warranty_comp_start_date,$machine_warranty_comp_stop_date)
	{
        // Check
        $checking = $this->db->where("machine_id",$machine_id)
                        ->count_all_results("tbl_machine");

            if($checking>0){
                // มีข้อมูล บันทึกข้อมูลได้
                $query = $this->db->where("machine_id",$machine_id)
                        ->set("invoice_id",$invoice_id)
                        ->set("machine_type_id",$machine_type_id)
                        ->set("model_id",$model_id)
                        ->set("machine_status",$machine_status)
                        ->set("machine_serial_no",$machine_serial_no)
                        ->set("brand_id",$brand_id)
                        ->set("machine_price",$machine_price)
                        ->set("machine_stock",$machine_stock)
                        ->set("machine_sup_inv_no",$machine_sup_inv_no)
                        ->set("machine_sup_inv_date",$machine_sup_inv_date)
                        ->set("machine_warranty_year",$machine_warranty_year)                      
                        ->set("machine_warranty_start_date",$machine_warranty_start_date)                      
                        ->set("machine_warranty_stop_date",$machine_warranty_stop_date)                      
                        ->set("machine_company_inv_no",$machine_company_inv_no)                      
                        ->set("machine_company_inv_date",$machine_company_inv_date)                      
                        ->set("machine_warranty_comp_year",$machine_warranty_comp_year)                      
                        ->set("machine_warranty_comp_start_date",$machine_warranty_comp_start_date)                      
                        ->set("machine_warranty_comp_stop_date",$machine_warranty_comp_stop_date)      
                        ->update("tbl_machine");
                        return $query;

            } else {
                // ไม่มีข้อมูล ไม่สามารถบันทึกข้อมูลได้
                return false;
            }

        
    }

    public function _delete_inventory($machine_id)
    {
        // ตรวจสอบว่ามีข้อมูลหรือไม่
        $checking = $this->db->where("machine_id",$machine_id)
                        ->count_all_results("tbl_machine");
                if($checking==0){
                    // ไม่พบข้อมูล
                    return false;
                } else {
                    // มีข้อมูล ลบได้
                    $query_delete = $this->db->where("machine_id",$machine_id)
                                        ->set("status_machine","nonactive")
                                        ->update("tbl_machine");
                                    return $query_delete;
                }
    }

    public function _add_invoice($rqs_id,$rtc_pn,$vs_id,$com_sup_id)
    {
        // ดึงข้อมูล vs_name มาใช้งาน
        $query_vs_id  = $this->db->where("vs_id",$vs_id)
                        ->get("tbl_visitor_supplier")->result();
                foreach ($query_vs_id as $vs) {
                    $vs_name = $vs->vs_name;
                }

        $datenow = date("Y-m-d H:i:s"); // เวลา
        $add_invoice = $this->db->set("rqs_id",$rqs_id)
                        ->set("rtc_pn",$rtc_pn)
                        ->set("vs_id",$vs_id)
                        ->set("vs_name",$vs_name)
                        ->set("com_sup_id",$com_sup_id)
                        ->set("create_date",$datenow)
                        ->insert("tbl_invoice");
                    return $add_invoice;
    }

    public function _get_invoice()
    {
        $query = $this->db->order_by("id_invoice","DESC")
                        ->get("tbl_invoice")->result();
                    return $query;
    }

    public function _get_invoice_active()
    {
        $query = $this->db->where("status_machine","active")
                        ->order_by("machine_id","DESC")
                        ->get("tbl_machine")->result();
                    return $query;
    }

    public function _delete_invoice($id_invoice)
    {
        $query_inventory = $this->db->where("invoice_id",$id_invoice)
                        ->get("tbl_machine")->result();
            if($query_inventory=="" or empty($query_inventory)){
                // ไม่มี inventory
                $remove_invoice = $this->db->where("id_invoice",$id_invoice)
                                ->delete("tbl_invoice");
                           return $remove_invoice;
            } else {
                // มี inventory ให้ลบ inventory ก่อน
                foreach ($query_inventory as $aaa) {
                    $remove_inventory = $this->db->where("invoice_id",$aaa->invoice_id)
                                ->delete("tbl_machine");
                }

                // ลบ invoice (ลบใบนำส่งสินค้า)
                $remove_invoice = $this->db->where("id_invoice",$id_invoice)
                                ->delete("tbl_invoice");
                           return $remove_invoice;
            }

    }

    public function _add_inventory_to_requisition($machine_id,$rqs_id,$username_member)
    {
        $save_date = date("Y-m-d H:i:s");
        $add_inven_to_invoice = $this->db->set("machine_id",$machine_id)
                            ->set("rqs_id",$rqs_id)
                            ->set("user_create",$username_member)
                            ->set("date_create",$save_date)
                            ->set("save_date",$save_date)
                            ->insert("tbl_add_inventory_to_invoice");
            if($add_inven_to_invoice){
                // Update machine_id
                $update_machine_id = $this->db->set("status_machine","used")
                                    ->where("machine_id",$machine_id)
                                    ->update("tbl_machine");
                            return $update_machine_id;
            } else {
                return false;
            }
    }

    public function _return_requisition($id_inven_to_invoice,$svo_id)
    {
        $query = $this->db->where("id_inven_to_invoice",$id_inven_to_invoice)
                    ->get("tbl_add_inventory_to_invoice")->result();
                foreach ($query as $aaa) {
                    $rqs_id = $aaa->rqs_id; // ดึง ID ใบเบิก ออกมาใช้งาน

                    // ลบเงินออกจาก Service Outside ก่อน
                    $decreate_cost = $this->db->where("machine_id",$aaa->machine_id)
                                        ->get("tbl_machine")->result();
                        foreach ($decreate_cost as $cost) {
                            $get_price = $cost->machine_price;  // ได้เงินออกมา เอาไปลบออกจาก Service Outside
                        }
                        // เอาค่ามา คำนวณใหม่
                        $query_service_outside_by_id = $this->db->where("svo_id",$svo_id)
                                                    ->get("tbl_service_outside")->result();
                                foreach ($query_service_outside_by_id as $bbb) {
                                    $total_price = $bbb->total_price;
                                    $vat = $bbb->vat;
                                    $labor_cost = $bbb->labor_cost;
                                    $traveling_expenses = $bbb->traveling_expenses;
                                    $accommodation_cost = $bbb->accommodation_cost;
                                }
                                $new_total_price = $total_price-$get_price;
                                $new_vat = ($new_total_price*$vat)/100;

                                $new_total_all_cost = $new_total_price + $new_vat + $labor_cost + $traveling_expenses + $accommodation_cost;

                        // ดำเนินการ คืนเงิน
                        $update_service_outside = $this->db->where("svo_id",$svo_id)
                                                ->set("total_price",$new_total_price)
                                                ->set("total_all_cost",$new_total_all_cost)
                                                ->update("tbl_service_outside");

                    // ดึงข้อมูล machine_id ออกมา update status กลับคืน เป็น active
                    $update_status_machine_id = $this->db->where("machine_id",$aaa->machine_id)
                                                ->set("status_machine","active")
                                                ->update("tbl_machine");
                }
        // ลบ id_inven_to_invoice ออก
        $remove_id_inven_to_invoice = $this->db->where("id_inven_to_invoice",$id_inven_to_invoice)
                                            ->delete("tbl_add_inventory_to_invoice");
                                return $remove_id_inven_to_invoice;
    }


}
