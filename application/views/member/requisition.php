<?
    foreach ($setting_web as $data) {  }
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <? $this->load->view("member/script_css"); ?>

    <title>Requisition | <? echo $data->nameweb; ?></title>

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
                            <h3 class="section-title">Requisition &nbsp;
                            <a href="<? echo base_url(); ?>member/requisition/add_requisition"><button class="btn btn-sm btn-success"><i class="fas fa-plus-circle"></i> Create New Requisition</button></a>
                            </h3>
                        </div>
                        <div class="card">
                            <div class="card-body">
                        <div class="table-responsive-lg">
                        <? if(empty($query_requisition) or $query_requisition==""){  ?>
                        <div class="empty_data">
                            <center>
                                No data.
                            </center>

                        </div>
                        <? } else { ?>
                        <table class="table table-striped" id="dataTableRequisition">
                        <thead>
                            <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Date</th>
                            <th scope="col">Employee</th>
                            <th scope="col">P/N</th>
                            <th scope="col">Visitor Customer</th>
                            <th scope="col">Factory Name</th>
                            <th scope="col">Total</th>
                            <th scope="col">Status</th>
                            <th scope="col"><center>Manage</center> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <? foreach ($query_requisition as $key => $req) { ?>
                            <tr>
                            <th scope="row"><center>No. <? echo $req->rqs_id; ?></center></th>
                            <td><? echo set_mytime($req->rqs_date); ?></td>
                            <td>
                            <? // แสดง Employee
                            $query_emp = $this->db->where("emp_id",$req->emp_id)
                                            ->get("tbl_employees")->result();
                                    foreach ($query_emp as $emp) {
                                        $emp_name = $emp->emp_name;
                                    }
                                    echo $emp_name;
                            
                            ?>
                            </td>
                            <td><? echo $req->rqs_pn; ?></td>
                            <td>
                            <? // แสดง Visitor Customer
                            $query_emp = $this->db->where("vs_id",$req->vs_id)
                                            ->get("tbl_visitor_customer")->result();
                                    foreach ($query_emp as $vs) {
                                        $vs_name = $vs->vs_name;
                                    }
                                    echo $vs_name;
                            
                            ?>
                            </td>
                            <td>
                            <? // แสดง Factory Name
                            $query_factory = $this->db->where("com_cus_id",$req->company_id)
                                            ->get("tbl_company_customer")->result();
                                    foreach ($query_factory as $qft) {
                                        $com_cus_name = $qft->com_cus_name;
                                    }
                                    echo $com_cus_name;
                            
                            ?></td>
                            <td>
                            <?
                            $count_inventory = $this->db->where("rqs_id",$req->rqs_id)->count_all_results("tbl_add_inventory_to_invoice");
                                    echo $count_inventory;
                            ?>
                            </td>
                            <td>
                                <? if($req->rqs_status=="active"){ ?>
                                <span class="texyt-default">active</span>
                                <? } else if($req->rqs_status=="cancel"){ ?>
                                <span class="text-danger">cancel</span>
                                <?  } else { ?>
                                <span class="text-success"><? echo $req->rqs_status; ?></span>
                                <? } ?>
                            
                            </td>
                                <? 
                                    if($req->rqs_status == "active"){
                                ?>
                                <td>
                                    <center>
                                        <a href="<? echo base_url(); ?>member/requisition/add_inventory/<? echo $req->rqs_id; ?>"><span class="text-dark"><button class="btn btn-sm btn-success"><i class="fas fa-plus-circle"></i> Add inventory</button></span></a>
                                        &nbsp;
                                        <a href="<? echo base_url(); ?>member/requisition/edit_requisition/<? echo $req->rqs_id; ?>"><span class="text-dark"><i class="fas fa-edit"></i></span></a>
                                        &nbsp;
                                        <a href="<? echo base_url(); ?>member/requisition/remove_requisition/<? echo $req->rqs_id; ?>" onclick="return confirm('Confirm to delete?');"><span class="text-danger"><i class="fas fa-trash"></i></span></a>
                                    </center>
                                </td>
                                <? 
                                    }
                                ?>
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
            $('#dataTableRequisition').DataTable();
        });

        function IsNumeric(e, display) {
            var specialKeys = new Array();
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 46 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
            document.getElementById(display).style.display = ret ? "none" : "inline";
            return ret;
        }
    </script>

</body>
 
</html>