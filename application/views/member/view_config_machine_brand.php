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

    <title>Config Machine Brand | <? echo $data->nameweb; ?></title>

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
                            <h3 class="section-title">Add New Machine brand (<? echo number_format($count_machine_brand,0); ?> Types)</h3>
                            <hr>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<? echo base_url(); ?>member/machine" class="breadcrumb-link">Machine</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add New Machine Brand</li>
                        </ol>
                        </div>
                    </div>

                    <div class="col-xl-12 col-12">
                        <? $this->load->view("member/flashsweet"); ?>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive-lg">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Machine Brand</th>
                                            <th scope="col">Process</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <? 
                                            foreach ($data_machine_brand as $key => $mach) {
                                                
                                                ?>
                                                            <tr>
                                                            <th scope="row"><? echo $key+1; ?></th>
                                                            <td><? echo $mach->brand_name; ?></td>
                                                            <td>
                                                            <a href="<? echo base_url(); ?>member/config_machine_brand/edit_machine_brand/<? echo $mach->brand_id; ?>" class="text-dark"><i class="fas fa-edit"></i></a>
                                                            &nbsp;
                                                            <a href="<? echo base_url(); ?>member/config_machine_brand/delete_machine_brand/<? echo $mach->brand_id; ?>" class="text-danger" onclick="return confirm('Comfirm Delete?');"><i class="fas fa-trash"></i></a>
                                                            </td>
                                                            </tr>
                                                <? } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">

                                <form action="<? echo base_url(); ?>member/config_machine_brand/add_config_machine_brand" method="POST" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <label for="brand_name">Machine Brand</label>
                                            <input type="text" class="form-control" id="brand_name" name="brand_name" placeholder="Machine Brand" required>
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