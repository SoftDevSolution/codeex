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

    <title>Factory Customer | <? echo $data->nameweb; ?></title>

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
                            <h3 class="section-title">Factory Customer (<? echo number_format($count_factory_customer,0); ?> Factory)&nbsp;
                            <a href="<? echo base_url(); ?>member/factory_customer/add_factory_customer"><button class="btn btn-sm btn-success"><i class="fas fa-plus-circle"></i> Add New Factory Customer</button></a>
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
                            <th scope="col">Factory Customer</th>
                            <th scope="col">Phone </th>
                            <th scope="col">Email </th>
                            <th scope="col">Address 1</th>
                            <th scope="col">Product Type </th>
                            <th scope="col"><center>Manage</center> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <? 
                                foreach ($data_factory_customer as $key => $factsub) {
                                    
                            ?>
                                <tr>
                                <th scope="row"><? echo $key+1; ?></th>
                                <td><? echo $factsub->com_cus_name; ?></td>
                                <td><? echo $factsub->com_cus_tel; ?></td>
                                <td><? echo $factsub->com_cus_email; ?></td>
                                <td><? echo $factsub->com_cus_addr1; ?></td>
                                <td>
                                    <? 
                                    $query_sup_product_type = $this->db->where("product_type_id",$factsub->com_cus_product_type)
                                                ->get("tbl_product_type")->result();
                                    foreach ($query_sup_product_type as $products) {
                                        echo $products->product_type_name;
                                    } ?> 
                                </td>
                                <td>
                                <a href="<? echo base_url(); ?>member/factory_customer/edit_factory_customer/<? echo $factsub->com_cus_id; ?>" class="text-dark"><i class="fas fa-edit"></i></a>
                                &nbsp;
                                <a href="<? echo base_url(); ?>member/factory_customer/delete_factory_customer/<? echo $factsub->com_cus_id; ?>" class="text-danger" onclick="return confirm('Comfirm Delete?');"><i class="fas fa-trash"></i></a>
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