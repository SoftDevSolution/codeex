<?
    foreach ($setting_web as $data) {  }
    foreach ($query_requisition as $requisition) {  }
    foreach ($query_service_outside as $service) {  }
    $rqs_id = $this->uri->segment(4);

    // หากไม่มีค่า ให้ กลับไปที่ ./member/service_outside
    if(empty($rqs_id) or $rqs_id==""){
        
        redirect(base_url().'member/service_outside');
        // echo "No data";
        
    } else { }
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Edit Service Outside</title>

    <? $this->load->view("member/script_css"); ?>

    <!-- Sweet Alert -->
    <script src="<? echo base_url(); ?>theme/sweetalert/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="<? echo base_url(); ?>theme/sweetalert/sweetalert2.min.css">
    <link href="<? echo base_url(); ?>theme/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />

    <? $this->load->view("member/time_to_datethai_en"); ?>
</head>

<body>
    <div class="dashboard-main-wrapper">
        
        <? $this->load->view("member/navbar"); ?>
        
        <? $this->load->view("member/menusidebar"); ?>

        <? $this->load->view("member/flashsweet"); ?>
        
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pagehader  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="section-block" id="basicform">
                            <h3 class="section-title"><i class="fas fa-database"></i> &nbsp;Edit Service Outside</h3>
                            <hr>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
        <h4 class="text-primary"> <i class="fas fa-database"></i> &nbsp;Requisition Data &nbsp;&nbsp;<a href="<? echo base_url(); ?>member/requisition/edit_requisition/<? echo $rqs_id; ?>"><i class="far fa-edit"></i></a> </h4> <hr>
            <div class="form-row">
                <div class="form-group col-md-3">
                    Date : <span class="text-primary"><? echo set_mytime($requisition->rqs_date); ?></span>
                </div>
                <div class="form-group col-md-3">
                Employee : <span class="text-primary">
                <? $query_emp = $this->db->where("emp_id",$requisition->emp_id)
                                            ->get("tbl_employees")->result();
                        foreach ($query_emp as $emp) {
                            echo $emp->emp_name;
                        }
                 ?>
                </span>
                </div>
                <div class="form-group col-md-3">
                ชื่อบริษัทลูกค้า : <span class="text-primary">
                <? $query_company = $this->db->where("com_cus_id",$requisition->company_id)->get("tbl_company_customer")->result(); 
                    foreach ($query_company as $company) {
                        $my_customer_company =  $company->com_cus_name;
                    }
                        echo $my_customer_company;
                ?>
                </span>
                </div>
                <div class="form-group col-md-3">
                Customer Contact: <span class="text-primary">
                <? $query_visitor_customer = $this->db->where("vs_id",$requisition->vs_id)
                                            ->get("tbl_visitor_customer")->result();
                        foreach ($query_visitor_customer as $visitor) {
                            $my_vs_name = $visitor->vs_name;
                        }
                            echo $my_vs_name;
                 ?>
                </span>
                </div>
                <div class="form-group col-md-3">
                S/N : <span class="text-primary">
                <? echo $requisition->machine_serial_no; ?>
                </span>
                </div>
                <div class="form-group col-md-3">
                Machine Model : <span class="text-primary">
                <? echo $requisition->model_id; ?>
                <? $query_model_id = $this->db->where("model_id",$requisition->model_id)
                                            ->get("tbl_model")->result();
                        foreach ($query_model_id as $model) {
                            echo $model->model_name;
                        }
                 ?>
                </span>
                </div>
                <div class="form-group col-md-3">
                User Update : <span class="text-primary"><? echo $requisition->update_user; ?>
                 (on <? echo set_mytime($requisition->update_date); ?>)
                 </span>
                </div>
                <div class="form-group col-md-3">
                User Created : <span class="text-primary"><? echo $requisition->create_user; ?>
                 (on <? echo set_mytime($requisition->create_date); ?>)
                </span>
                </div>
                <div class="form-group col-md-12">
                Note/Remark : <span class="text-primary"><? echo $requisition->rqs_remark; ?></span>
                </div>
            </div>
                            </div>

                        </div>
                    </div>

<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
<div class="card">
    <div class="card-body">
    <h4 class="text-primary"><i class="fas fa-list-ul"></i> &nbsp; Inventory List</h4> <hr>
        
        <div class="table-responsive-lg" id="tabler_add_invenory">
        <table class="table table-striped" id="dataTable">
        <thead class="thead-dark">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Serial Number</th>
            <th scope="col">Type</th>
            <th scope="col">Model</th>
            <th scope="col">Brand</th>
            <th scope="col">Quantity</th>
            <th scope="col">Price</th>
            </tr>
        </thead>
        <tbody>
        <? foreach ($query_invent_in_invoice as $key => $invoices) { 
            $get_machine_id = $invoices->machine_id;
            $query_machine = $this->db->where("machine_id",$get_machine_id)
                                ->get("tbl_machine")->result();
            foreach ($query_machine as $invo) {
            ?>
            <tr id="remove_inven_in_invoice_<? echo $invoices->id_inven_to_invoice; ?>">
            <td><? echo $key+1; ?>. </td>
            <td><? echo $invo->machine_serial_no; ?></td>
            <td><? $query_type = $this->db->where("machine_type_id",$invo->machine_type_id)->get("tbl_machine_type")->result();
                foreach ($query_type as $ttt) {
                    echo $ttt->machine_type_name;
                }
            ?></td>
            <td><? $query_model = $this->db->where("model_id",$invo->model_id)->get("tbl_model")->result();
                foreach ($query_model as $mod) {
                    echo $mod->model_name;
                }
            ?></td>
            <td><? $query_brand = $this->db->where("brand_id",$invo->brand_id)->get("tbl_brand")->result();
                foreach ($query_brand as $bbb) {
                    echo $bbb->brand_name;
                }
            ?></td>
            <td><center><? echo number_format($invo->machine_stock,0); ?></center></td>
            <td><? echo number_format($invo->machine_price,0); ?></td>
            </tr>
        <? } ?>
        <? } ?>
        </tbody>
        </table>
        </div>

    </div>

</div>
</div>


<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
<form action="<? echo base_url(); ?>member/service_outside/edit_data_service_outside" method="POST" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="svo_requisition_no">Requisition No. แนบใบเบิก(เลขที่) <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="svo_requisition_no" value="<? echo $requisition->rqs_id; ?>" required readonly>
                </div>
                <div class="form-group col-md-4">
                    <label for="svo_get_date">Date วันที่รับแจ้ง <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="svo_get_date" name="svo_get_date" placeholder="Date" value="<? echo $service->svo_get_date; ?>" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="svo_date_working">Date วันที่ทำงาน <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="svo_date_working" name="svo_date_working" placeholder="Date" value="<? echo $service->svo_date_working; ?>" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="svo_company_name">Company Name (ชื่อบริษัทลูกค้า) <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="svo_company_name" name="svo_company_name" placeholder="Company Name" value="<? echo $my_customer_company; ?>" required readonly>
                    <input type="hidden" name="svo_company_id" id="svo_company_id" value="<? echo $service->svo_company_id; ?>" >
                </div>
                <div class="form-group col-md-4">
                    <label for="svo_customer_name">ลูกค้าที่ติดต่อ <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="svo_customer_name" name="svo_customer_name" placeholder="Customer Name" value="<? echo $my_vs_name; ?>" required readonly>
                    <input type="hidden" class="form-control" id="svo_customer_id" name="svo_customer_id" value="<? echo $service->svo_customer_id; ?>" readonly>
                </div>
                <div class="form-group col-md-4">
                    <label for="svo_emp_receive">คนรับงาน <span class="text-danger">*</span></label>
                    <select class="form-control" name="svo_emp_receive" id="svo_emp_receive" required>
                        <option value="">-- กรุณาเลือก --</option>
                        <? foreach ($query_employee as $aaa) { ?>
                        <option value="<? echo $aaa->emp_id; ?>" <? if($aaa->emp_id==$service->svo_emp_receive){ echo "selected"; } else { } ?>><? echo $aaa->emp_name; ?></option>
                    <? } ?>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="svo_emp_id_1">คนทำงาน 1 </label>
                    <select class="form-control" name="svo_emp_id_1" id="svo_emp_id_1">
                        <option value="">-- กรุณาเลือก --</option>
                        <? foreach ($query_employee as $aaa) { ?>
                        <option value="<? echo $aaa->emp_id; ?>" <? if($aaa->emp_id==$service->svo_emp_id_1){ echo "selected"; } else { } ?>><? echo $aaa->emp_name; ?></option>
                    <? } ?>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="svo_emp_id_2">คนทำงาน 2</label>
                    <select class="form-control" name="svo_emp_id_2" id="svo_emp_id_2">
                        <option value="">-- กรุณาเลือก --</option>
                        <? foreach ($query_employee as $aaa) { ?>
                        <option value="<? echo $aaa->emp_id; ?>" <? if($aaa->emp_id==$service->svo_emp_id_2 ){ echo "selected"; } else { } ?>><? echo $aaa->emp_name; ?></option>
                    <? } ?>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="svo_emp_id_3">คนทำงาน 3</label>
                    <select class="form-control" name="svo_emp_id_3" id="svo_emp_id_3">
                        <option value="">-- กรุณาเลือก --</option>
                        <? foreach ($query_employee as $aaa) { ?>
                        <option value="<? echo $aaa->emp_id; ?>" <? if($aaa->emp_id==$service->svo_emp_id_3){ echo "selected"; } else { } ?>><? echo $aaa->emp_name; ?></option>
                    <? } ?>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="svo_license_plate_1">ทะเบียนรถใช้งาน 1</label>
                    <input type="text" class="form-control" id="svo_license_plate_1" name="svo_license_plate_1" placeholder="ทะเบียนรถใช้งาน 1" value="<? echo $service->svo_license_plate_1; ?>">
                </div>
                <div class="form-group col-md-3">
                    <label for="svo_license_plate_2">ทะเบียนรถใช้งาน 2</label>
                    <input type="text" class="form-control" id="svo_license_plate_2" name="svo_license_plate_2" placeholder="ทะเบียนรถใช้งาน 2" value="<? echo $service->svo_license_plate_2; ?>">
                </div>
                <div class="form-group col-md-3">
                    <label for="svo_license_plate_3">ทะเบียนรถใช้งาน 3</label>
                    <input type="text" class="form-control" id="svo_license_plate_3" name="svo_license_plate_3" placeholder="ทะเบียนรถใช้งาน 3" value="<? echo $service->svo_license_plate_3; ?>">
                </div>
                <div class="form-group col-md-3">
                    <label for="svo_status">Status</label>
                    <input type="text" class="form-control" id="svo_status" name="svo_status" placeholder="Status" value="<? echo $service->svo_status; ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="svo_case_break_down">อาการเสียหลัก</label>
                    <textarea name="svo_case_break_down" id="svo_case_break_down" class="form-control" rows="6"> <? echo $service->svo_case_break_down; ?> </textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="svo_conclusion">ข้อสรุปของปัญหา</label>
                    <textarea name="svo_conclusion" id="svo_conclusion" class="form-control" rows="6"><? echo $service->svo_conclusion; ?></textarea>
                </div>
                
                <div class="form-group col-md-4">
                    <labe>ภาพเดิม 1</labe>
                    <img class="img-fluid" src="<? echo base_url(); ?>theme/photoserviceoutsidethumbnail/<? echo $service->svo_pic_path_1; ?>" alt="">
                </div>
                <div class="form-group col-md-4">
                    <label>ภาพเดิม 2</label>
                    <img class="img-fluid" src="<? echo base_url(); ?>theme/photoserviceoutsidethumbnail/<? echo $service->svo_pic_path_2; ?>" alt="">
                </div>
                <div class="form-group col-md-4">
                    <label>ภาพเดิม 3</label>
                    <img class="img-fluid" src="<? echo base_url(); ?>theme/photoserviceoutsidethumbnail/<? echo $service->svo_pic_path_3; ?>" alt="">
                </div>

                <div class="form-group col-md-4">
                    <label for="svo_pic_path_1">Picture 1</label>
                    <input type="file" class="form-control" id="svo_pic_path_1" name="svo_pic_path_1" value="<? echo $service->svo_pic_path_1; ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="svo_pic_path_2">Picture 2</label>
                    <input type="file" class="form-control" id="svo_pic_path_2" name="svo_pic_path_2" value="<? echo $service->svo_pic_path_2; ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="svo_pic_path_3">Picture 3</label>
                    <input type="file" class="form-control" id="svo_pic_path_3" name="svo_pic_path_3" value="<? echo $service->svo_pic_path_3; ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="svo_province">Province (จังหวัด)</label>
                    <input type="text" class="form-control" id="svo_province" name="svo_province" value="<? echo $service->svo_province; ?>" autocomplete="off">
                </div>
                <div class="form-group col-md-6">
                    <label for="svo_zipcode">Zipcode (รหัสไปรษณีย์)</label>
                    <input type="text" class="form-control" id="svo_zipcode" name="svo_zipcode" value="<? echo $service->svo_zipcode; ?>" onkeypress="return IsNumeric(event,'zipcode');">
                    <span id="zipcode" style="color: Red; display: none">* Please enter number (0 - 9)</span>
                </div>
                
                <div class="form-group col-md-12">
                    <div class="row">
                    <div class="form-group col-md-6">
                        <div class="form-group col-md-12">
                            <label for="svo_remark">Note/Remark</label>
                            <textarea class="form-control" name="svo_remark" id="svo_remark" placeholder="Note/Remark"></textarea>
                        </div>
                    </div>
                    <div class="form-row col-md-6">
                        <div class="form-group col-md-12">
                            <label for="total_price">รวมเงิน    (บาท)&nbsp;</label>
                            <div><input type="number" min="0" class="form-control" id="total_price" name="total_price" value="<? echo $service->total_price; ?>" readonly></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="vat">VAT (%)  &nbsp;</label>
                            <div><input type="number" min="0" class="form-control" id="vat" name="vat" value="<? echo $service->vat; ?>" onchange="Cal_total_price();"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="labor_cost">ค่าแรง  &nbsp;</label>
                            <input type="number" class="form-control" id="labor_cost" name="labor_cost" value="<? echo $service->labor_cost; ?>" onchange="Cal_total_price();">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="traveling_expenses">ค่าเดินทาง  &nbsp;</label>
                            <input type="number" class="form-control" id="traveling_expenses" name="traveling_expenses" value="<? echo $service->traveling_expenses; ?>" onchange="Cal_total_price();">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="accommodation_cost">ค่าที่พัก  &nbsp;</label>
                            <input type="number" class="form-control" id="accommodation_cost" name="accommodation_cost" value="<? echo $service->accommodation_cost; ?>" onchange="Cal_total_price();">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="total_all_cost">รวมทั้งสิ้น  (บาท)&nbsp;</label>
                            <input type="number" min="0" class="form-control" id="total_all_cost" name="total_all_cost" value="<? echo $service->total_all_cost; ?>" readonly>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

            <center>
            <hr>
            <input type="hidden" name="svo_id" value="<? echo $service->svo_id; ?>">
            <button type="submit" class="btn btn-primary">Edit Service Outside</button> &nbsp;&nbsp;
            <button type="reset" class="btn btn-warning">Reset</button>&nbsp;&nbsp;
            <a href="<? echo base_url(); ?>member/service_outside"><button type="button" class="btn btn-danger">Back</button></a>
            </center>
        </form>
                            </div>

                        </div>
                    </div>


</div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <? $this->load->view("member/footer"); ?>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <? $this->load->view("member/script_js"); ?>

    <script src="<? echo base_url(); ?>theme/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="<? echo base_url(); ?>theme/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>

    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });

        function Cal_total_price() {

            var total_price = $("#total_price").val();
            var vat = $("#vat").val();
            var labor_cost = $("#labor_cost").val();
            var traveling_expenses = $("#traveling_expenses").val();
            var accommodation_cost = $("#accommodation_cost").val();

            var total_all_cost = Number(total_price) + Number((total_price*(vat/100))) + Number(labor_cost) + Number(traveling_expenses) + Number(accommodation_cost) ;

            $("#total_all_cost").val(total_all_cost);
         }
    </script>

    <script>
        function GetRequisitionData() { 
            var svo_requisition_no = $("#svo_requisition_no").val();
            console.log(svo_requisition_no);

            if(svo_requisition_no==""){

            } else {
                // ค้นหาข้อมูล ใบเบิก มาใช้งาน
                $.ajax({
                    type: 'post',
                    url: '<? echo base_url(); ?>member/service_outside/query_requisition',
                    data: {
                        svo_requisition_no : svo_requisition_no
                    },
                    success: function (response) {
                        console.log(response);
                        var res = response.split("/");
                        $("#svo_customer_name").val(res[0]);
                        $("#svo_company_name").val(res[1]);
                        $("#svo_customer_id").val(res[2]);
                        $("#svo_company_name").val(res[3]);
                        $("#svo_company_id").val(res[4]);
                        
                    }
                });
            }
         }

        function IsNumeric(e,display) {
                var specialKeys = new Array();
                var keyCode = e.which ? e.which : e.keyCode
                var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
                document.getElementById(display).style.display = ret ? "none" : "inline";
                return ret;
            }
    </script>

</body>
 
</html>