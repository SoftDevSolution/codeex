<?
    foreach ($setting_web as $data) {  }
    foreach ($query_requisition as $requisition) {  }
    foreach ($query_service_outside as $service) {  }
    $svo_id = $this->uri->segment(4);
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <? $this->load->view("member/script_css"); ?>

    <!-- Sweet Alert -->
    <script src="<? echo base_url(); ?>theme/sweetalert/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="<? echo base_url(); ?>theme/sweetalert/sweetalert2.min.css">
    <link href="<? echo base_url(); ?>theme/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />

    <title>Confirm to Complete Service Outside</title>

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
                            <h3 class="section-title"><i class="fas fa-database"></i> &nbsp;Confirm to Complete Service Outside</h3>
                            <hr>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
        <h4 class="text-primary"> <i class="fas fa-database"></i> &nbsp;Requisition Data</h4> <hr>
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
                        echo $company->com_cus_name;
                    }
                ?>
                </span>
                </div>
                <div class="form-group col-md-3">
                Customer Contact: <span class="text-primary">
                <? $query_visitor_customer = $this->db->where("vs_id",$requisition->vs_id)
                                            ->get("tbl_visitor_customer")->result();
                        foreach ($query_visitor_customer as $visitor) {
                            echo $visitor->vs_name;
                        }
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

                <div class="form-row col-md-12">
                        <div class="form-group col-md-2">
                            <label for="total_price">รวมเงิน    (บาท)&nbsp;</label>
                            <div><input type="number" min="0" class="form-control" id="total_price" name="total_price" value="<? echo $service->total_price; ?>" readonly></div>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="vat">VAT (%)  &nbsp;</label>
                            <div><input type="number" min="0" class="form-control" id="vat" name="vat" value="<? echo $service->vat; ?>" readonly></div>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="labor_cost">ค่าแรง  &nbsp;</label>
                            <input type="number" class="form-control" id="labor_cost" name="labor_cost" value="<? echo $service->labor_cost; ?>" readonly>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="traveling_expenses">ค่าเดินทาง  &nbsp;</label>
                            <input type="number" class="form-control" id="traveling_expenses" name="traveling_expenses" value="<? echo $service->traveling_expenses; ?>" readonly>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="accommodation_cost">ค่าที่พัก  &nbsp;</label>
                            <input type="number" class="form-control" id="accommodation_cost" name="accommodation_cost" value="<? echo $service->accommodation_cost; ?>" readonly>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="total_all_cost">รวมทั้งสิ้น  (บาท)&nbsp;</label>
                            <input type="number" min="0" class="form-control" id="total_all_cost" name="total_all_cost" value="<? echo $service->total_all_cost; ?>" readonly>
                        </div>
                    </div>

                
            </div>
                            </div>

                        </div>
                    </div>

<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
<div class="card">
    <div class="card-body">
    <h4 class="text-primary"><i class="fas fa-undo"></i> &nbsp; Return Inventory</h4> <hr>
        
        <div class="table-responsive-lg" id="tabler_add_invenory">
        <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Serial Number</th>
            <th scope="col">Type</th>
            <th scope="col">Model</th>
            <th scope="col">Brand</th>
            <th scope="col">Quantity</th>
            <th scope="col">Price</th>
            <th scope="col">Remove</th>
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
            <td>
            <a href="<? echo base_url(); ?>member/service_outside/update_status_inventory/<? echo $invoices->id_inven_to_invoice; ?>/<? echo $svo_id; ?>" onclick="return confirm('Confirm to return this inventory?');"><button class="btn btn-sm btn-danger"><i class="fas fa-minus-circle"></i> Return Inventory</button></a>
            </td>
            </tr>
        <? } ?>
        <? } ?>
        </tbody>
        </table>

        <div style="margin: 60px 40px;">
            <center>
            <br>
                <a href="<? echo base_url(); ?>member/service_outside/completejobnow/<? echo $svo_id; ?>" onclick="return confirm(' Confirm to complete your job?');"><button class="btn btn-lg btn-success"><h2 class="text-white"><i class="fas fa-sign-out-alt"></i>&nbsp;Complete job.</h2></button></a>
            </center>
        </div>


        </div>

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
    </script>

</body>
 
</html>