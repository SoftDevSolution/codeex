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

    <title>Config Product Type | <? echo $data->nameweb; ?></title>

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
                            <h3 class="section-title">Product Type (<? echo number_format($count_product_type,0); ?> types)</h3>
                        </div>
                    </div>

                    <div class="col-xl-12 col-12">
                        <? $this->load->view("member/flashsweet"); ?>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive-lg">
                                <? 
                                    if(empty($count_product_type) or $count_product_type==0){
                                ?>
                                    <div align="center" style="padding: 65px 20px;"> No Data. </div>
                                <? } else { ?>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Product Type</th>
                                            <th scope="col">Process</th>
                                            </tr>
                                        </thead>
                                        <tbody id="showmydata">
                                <? 
                                    foreach ($data_product_type as $key => $products) {
                                ?>
                                            <tr>
                                            <th scope="row"><? echo $key+1; ?></th>
                                            <td><? echo $products->product_type_name; ?></td>
                                            <td>
                                            <a href="<? echo base_url(); ?>member/config_product_type/edit_product_type/<? echo $products->product_type_id; ?>" class="text-dark"><i class="fas fa-edit"></i></a>
                                            &nbsp;
                                            <a href="<? echo base_url(); ?>member/config_product_type/delete_product_type/<? echo $products->product_type_id; ?>" class="text-danger" onclick="return confirm('Comfirm Delete?');"><i class="fas fa-trash"></i></a>
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

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" id="machine_type">
                        <div class="card">
                            <div class="card-body">
                                <form action="<? echo base_url(); ?>member/config_product_type/data_add_product_type" method="POST">
                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <label for="product_type_name">Add New Product Type</label>
                                            <input type="text" class="form-control" id="product_type_name" name="product_type_name" placeholder="Product Type" required>
                                        </div>
                                    </div>
                                    <center>
                                    <hr>
                                    <button type="submit" class="btn btn-primary">Save</button> &nbsp;&nbsp;
                                    <button type="reset" class="btn btn-warning">Reset</button>
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

    

</body>
 
</html>