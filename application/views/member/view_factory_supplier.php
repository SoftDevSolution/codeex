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

    <title>Company Supplier | <? echo $data->nameweb; ?></title>
    <!-- Sweet Alert -->
    <script src="<? echo base_url(); ?>theme/sweetalert/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="<? echo base_url(); ?>theme/sweetalert/sweetalert2.min.css">
    <link href="<? echo base_url(); ?>theme/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />


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
                            <h3 class="section-title">Company Supplier (<? echo number_format($count_factory_supplier,0); ?> Factory)&nbsp;
                            <a href="<? echo base_url(); ?>member/factory_supplier/add_factory_supplier"><button class="btn btn-sm btn-success"><i class="fas fa-plus-circle"></i> Add New Company Supplier</button></a>
                            </h3>
                        </div>

                        <div class="col-xl-12 col-12">
                            <? $this->load->view("member/flashsweet"); ?>
                        </div>
                        
                        <div class="card">
                            <div class="card-body">
                        <div class="table-responsive-lg">
                        <table class="table table-striped" id="dataTable">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Company Supplier</th>
                            <th scope="col">Phone </th>
                            <th scope="col">Email </th>
                            <th scope="col">Address 1</th>
                            <th scope="col">Product Type </th>
                            <th scope="col"><center>Manage</center> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <? 
                                foreach ($data_factory_supplier as $key => $factsub) {
                                    
                            ?>
                                <tr>
                                <th scope="row"><? echo $key+1; ?></th>
                                <td><? echo $factsub->com_sup_name; ?></td>
                                <td><? echo $factsub->com_sup_tel; ?></td>
                                <td><? echo $factsub->com_sup_email; ?></td>
                                <td><? echo $factsub->com_sup_addr1; ?></td>
                                <td>
                                    <? 
                                    $query_sup_product_type = $this->db->where("product_type_id",$factsub->com_sup_product_type)
                                                ->get("tbl_product_type")->result();
                                    foreach ($query_sup_product_type as $products) {
                                        echo $products->product_type_name;
                                    } ?> 
                                </td>
                                <td>
                                <a href="<? echo base_url(); ?>member/factory_supplier/edit_factory_supplier/<? echo $factsub->com_sup_id; ?>" class="text-dark"><i class="fas fa-edit"></i></a>
                                &nbsp;
                                <a href="<? echo base_url(); ?>member/factory_supplier/delete_factory_supplier/<? echo $factsub->com_sup_id; ?>" class="text-danger" onclick="return confirm('Comfirm Delete?');"><i class="fas fa-trash"></i></a>
                                </td>
                                </tr>
                            <? } ?>
                        </tbody>

                        </table>
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