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

    <title>Config Industrial Estate | <? echo $data->nameweb; ?></title>

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
                            <h3 class="section-title">Industrial Estate (<? echo number_format($count_industrial_estate,0); ?>)</h3>
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
                                    if(empty($count_industrial_estate) or $count_industrial_estate==0){
                                ?>
                                    <div align="center" style="padding: 65px 20px;"> No Data. </div>
                                <? } else { ?>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Industrial Estate</th>
                                            <th scope="col">Process</th>
                                            </tr>
                                        </thead>
                                        <tbody id="showmydata">
                                <? 
                                    foreach ($data_industrial_estate as $key => $estate) {
                                        
                                ?>
                                            <tr>
                                            <th scope="row"><? echo $key+1; ?></th>
                                            <td><? echo $estate->name_industrial_estate; ?></td>
                                            <td>
                                            <a href="<? echo base_url(); ?>member/config_industrial_estate/edit_industrial_estate/<? echo $estate->id_industrial_estate; ?>" class="text-dark"><i class="fas fa-edit"></i></a>
                                            &nbsp;
                                            <a href="<? echo base_url(); ?>member/config_industrial_estate/delete_industrial_estate/<? echo $estate->id_industrial_estate; ?>" class="text-danger" onclick="return confirm('Comfirm Delete?');"><i class="fas fa-trash"></i></a>
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
                                <form action="<? echo base_url(); ?>member/config_industrial_estate/data_add_industrial_estate" method="POST">
                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <label for="name_industrial_estate">Add New Industrial Estate</label>
                                            <input type="text" class="form-control" id="name_industrial_estate" name="name_industrial_estate" placeholder="Industrial Estate" required>
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