<!doctype html>
<html lang="en">

 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <? $this->load->view("member/script_css"); ?>

    <title>Add Service Outside</title>

    <!-- production version, optimized for size and speed -->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

    <!-- Sweet Alert -->
    <script src="<? echo base_url(); ?>theme/sweetalert/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="<? echo base_url(); ?>theme/sweetalert/sweetalert2.min.css">

    <? $this->load->view("member/time_to_datethai_en"); ?>


</head>

<body>
    <div class="dashboard-main-wrapper">
        
        <? $this->load->view("member/navbar"); ?>
        
        <? $this->load->view("member/menusidebar"); ?>
        
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pagehader  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="section-block" id="basicform">
                            <h3 class="section-title"><i class="fas fa-database"></i> Create Service Outside</h3>
                            <hr>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<? echo base_url(); ?>member/service_outside" class="breadcrumb-link">Service Outside</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Service Outside</li>
                        </ol>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
    <h4 class="text-primary"><i class="fas fa-list-ul"></i> &nbsp;Select Requisition</h4>
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
                            <th scope="col">S/N</th>
                            <th scope="col">Visitor Customer</th>
                            <th scope="col">Factory Name</th>
                            <th scope="col"><center>Total</center></th>
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
                            <td>
                            <? $query_model_id = $this->db->where("model_id",$req->model_id)
                                            ->get("tbl_model")->result();
                                    foreach ($query_model_id as $model) {
                                        echo $model->model_name;
                                    }
                            ?>
                            </td>
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
                            <center>
                            <?
                            $count_inventory = $this->db->where("rqs_id",$req->rqs_id)->count_all_results("tbl_add_inventory_to_invoice");
                                    echo $count_inventory;
                            ?>
                            </center>
                            </td>
                            <td><? echo $req->rqs_status; ?></td>
                            <td>
                                <center>
                                    <a href="<? echo base_url(); ?>member/service_outside/create_service_outside/<? echo $req->rqs_id; ?>"><span class="text-dark"><button class="btn btn-sm btn-success"><i class="fas fa-plus-circle"></i> Select Requisition No. <? echo $req->rqs_id; ?></button></span></a>
                                </center>
                            </td>
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

</body>
 
</html>