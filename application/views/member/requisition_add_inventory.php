<?
    foreach ($setting_web as $data) {  }
    foreach ($query_requisition as $requisition) {  }
    $rqs_id = $this->uri->segment(4);
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

    <title>Add Inventory to Requisition</title>

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
                            <h3 class="section-title"><i class="fas fa-database"></i> &nbsp;Add Inventory to Requisition</h3>
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
            </div>
                            </div>

                        </div>
                    </div>

<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
<div class="card">
    <div class="card-body">
    <h4 class="text-primary"><i class="fas fa-list-ul"></i> &nbsp; Inventory List</h4> <hr>
        
        <div class="table-responsive-lg" id="tabler_add_invenory">
        <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Serial Number</th>
            <th scope="col">Type</th>
            <th scope="col">Model</th>
            <th scope="col">Brand</th>
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
            <td>
            <a href="<? echo base_url(); ?>member/requisition/update_status_inventory/<? echo $invoices->id_inven_to_invoice; ?>/<? echo $rqs_id; ?>" onclick="return confirm('Confirm to remove this?');"><button class="btn btn-sm btn-danger"><i class="fas fa-minus-circle"></i> Remove</button></a>
            <a href="<? echo base_url(); ?>member/machine/edit_machine/<? echo $invoices->machine_id; ?>"><button class="btn btn-sm btn-success"><i class="fas fa-edit"></i> Edit</button></a>
            </td>
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
    <h4 class="text-success"><i class="fas fa-plus-circle"></i> Add Inventory</h4> <hr>
        
        <div class="table-responsive-lg">
        <?
            if($query_inventory=="" or empty($query_inventory)) {
        ?>
        <div align="center" class="empty_data">
            No inventory  data.
        </div>
        <?
            } else {
        ?>
        <table class="table table-striped" id="dataTable">
        <thead class="thead-dark">
            <tr>
            <th scope="col">Add</th>
            <th scope="col">Serial Number</th>
            <th scope="col">Type</th>
            <th scope="col">Model</th>
            <th scope="col">Brand</th>
            <th scope="col">Price</th>
            <th scope="col">Stock</th>
            </tr>
        </thead>
        <tbody>
        <? foreach ($query_inventory as $inven) { 
            $count_machine = $this->db->where("machine_id",$inven->machine_id)
                                ->where("rqs_id",$rqs_id)
                                ->count_all_results("tbl_add_inventory_to_invoice");
            ?>
            <tr id="invenory_<? echo $inven->machine_id; ?>" <? if($count_machine>0){ ?>style="display: none;"<? } else {  } ?>>
            <th scope="row">
            <a href="<? echo base_url(); ?>member/requisition/add_data_inventory/<? echo $inven->machine_id; ?>/<? echo $rqs_id; ?>"><button class="btn btn-sm btn-success"><i class="fas fa-plus-circle"></i> Add Inventory</button></a>

            </th>
            <td><? echo $inven->machine_serial_no; ?></td>
            <td><? $query_type = $this->db->where("machine_type_id",$inven->machine_type_id)->get("tbl_machine_type")->result();
                foreach ($query_type as $ttt) {
                    echo $ttt->machine_type_name;
                }
            ?></td>
            <td><? $query_model = $this->db->where("model_id",$inven->model_id)->get("tbl_model")->result();
                foreach ($query_model as $mod) {
                    echo $mod->model_name;
                }
            ?></td>
            <td><? $query_brand = $this->db->where("brand_id",$inven->brand_id)->get("tbl_brand")->result();
                foreach ($query_brand as $bbb) {
                    echo $bbb->brand_name;
                }
            ?></td>
            <td><? echo $inven->machine_price; ?></td>
            <td><? echo $inven->machine_stock; ?></td>
            </tr>
        <? } ?>
        </tbody>
        </table>
        <? } ?>
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
<!-- 
    <script>
    $(document).ready(function() {
        $('#vs_name').keyup(function() {
            var query = $('#vs_name').val();
            $('#detail').html('');
            $('.list-group').css('display', 'block');
            if (query.length > 0) {
                $.ajax({
                    url: "<? echo base_url(); ?>member/machine/get_visitor_supplier",
                    method: "POST",
                    data: {
                        query: query
                    },
                    success: function(data) {
                        $('.list-group').html(data);
                    }
                })
            }
            if (query.length == 0) {
                $('.list-group').css('display', 'none');
            }
        });

        $(document).on('click', '.gsearch', function() {
            var vs_company = $(this).text();
            $('#vs_name').val(vs_company);
            $('.list-group').css('display', 'none');
            $.ajax({
                url: "<? echo base_url(); ?>member/machine/get_vs_company_visitor_supplier",
                method: "POST",
                data: {
                    vs_company: vs_company
                },
                success: function(data) {
                    $('#vs_company').val(data);
                }
            })
        });
    });

    function Add_inventory(machine_id,rqs_id) { 
        console.log("machine_id = "+machine_id);
        console.log("rqs_id = "+rqs_id);

        $("#invenory_"+machine_id).fadeOut();
        $("#btn_invent_"+machine_id).attr("disabled","true");

        if(machine_id=="" || rqs_id==""){
            alert("No data.");
            return false;
        } else {
            // ดำเนินการเพิ่ม inventory
            $.ajax({
                type: 'post',
                url: '<? echo base_url(); ?>member/requisition/add_data_inventory',
                data: {
                    machine_id : machine_id,
                    rqs_id : rqs_id
                },
                success: function (response) {
                    console.log(response);
                    var url_refresh = "<? echo base_url(); ?>member/requisition/add_inventory/"+rqs_id;
                    $("#tabler_add_invenory").fadeIn().html("<center>Invoice has been edit. Please refresh for update data. <a href='"+url_refresh+"'><button class='btn btn-sm btn-success'> <i class='fas fa-sync-alt'></i> Refresh </button></a></center>");
                }
            });
            
        }

     }

    function Remove_inventory(id_inven_to_invoice) { 
        if(id_inven_to_invoice==""){
            alert("No data.");
            return false;
        } else {
            // ดำเนินการเพิ่ม inventory
            $.ajax({
                type: 'post',
                url: '<? echo base_url(); ?>member/requisition/update_status_inventory',
                data: {
                    id_inven_to_invoice : id_inven_to_invoice
                },
                success: function (response) {
                    console.log("remove : "+response);
                    $("#remove_inven_in_invoice_"+id_inven_to_invoice).fadeOut();
                    
                }
            });
            
        }
    }
    </script> -->

</body>
 
</html>