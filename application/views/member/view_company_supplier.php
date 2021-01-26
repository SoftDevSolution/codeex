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

    <!-- production version, optimized for size and speed -->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

    <!-- Sweet Alert -->
    <script src="<? echo base_url(); ?>theme/sweetalert/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="<? echo base_url(); ?>theme/sweetalert/sweetalert2.min.css">


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
                            <h3 class="section-title">Company Supplier (<? echo number_format($count_company_supplier,0); ?> Company)&nbsp;
                            <a href="<? echo base_url(); ?>member/company_supplier/add_company_supplier"><button class="btn btn-sm btn-success"><i class="fas fa-plus-circle"></i> Add New Company Supplier</button></a>
                            </h3>
                        </div>

                        <div class="col-xl-12 col-12">
                            <? $this->load->view("member/flashsweet"); ?>
                        </div>
                        
                        <div class="card">
                            <div class="card-body">
                        <div class="table-responsive-lg">
                        <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Company Supplier</th>
                            <th scope="col">Address 1</th>
                            <th scope="col">Phone </th>
                            <th scope="col">Email </th>
                            <th scope="col">Product Type </th>
                            <th scope="col"><center>Manage</center> </th>
                            </tr>
                        </thead>
                        <tbody>
                                        <? 
                                            foreach ($data_company_supplier as $key => $mach) {
                                                
                                                ?>
                                                            <tr>
                                                            <th scope="row"><? echo $key+1; ?></th>
                                                            <td><? echo $mach->com_sup_name; ?></td>
                                                            <td><? echo $mach->com_sup_addr1; ?></td>
                                                            <td><? echo $mach->com_sup_tel; ?></td>
                                                            <td><? echo $mach->com_sup_email; ?></td>
                                                            <td><? echo $mach->com_sup_product_type; ?></td>
                                                            <td>
                                                            <a href="<? echo base_url(); ?>member/company_supplier/edit_company_supplier/<? echo $mach->com_sup_id; ?>" class="text-dark"><i class="fas fa-edit"></i></a>
                                                            &nbsp;
                                                            <a href="<? echo base_url(); ?>member/company_supplier/delete_company_supplier/<? echo $mach->com_sup_id; ?>" class="text-danger" onclick="return confirm('Comfirm Delete?');"><i class="fas fa-trash"></i></a>
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

</body>
 
</html>