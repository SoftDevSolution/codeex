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

    <title>Config Area | <? echo $data->nameweb; ?></title>

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
                            <h3 class="section-title">Area (<? echo number_format($count_area,0); ?> areas)</h3>
                        </div>
                    </div>

                    <div class="col-xl-12 col-12">
                        <? $this->load->view("member/flashsweet"); ?>
                    </div>

                    <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive-lg">
                                <? 
                                    if(empty($count_area) or $count_area==0){
                                ?>
                                    <div align="center" style="padding: 65px 20px;"> No Data. </div>
                                <? } else { ?>
                                    <table class="table table-striped" id="dataTable">
                                        <thead>
                                            <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Machine Type</th>
                                            <th scope="col">Process</th>
                                            </tr>
                                        </thead>
                                        <tbody id="showmydata">
                                <? 
                                    foreach ($data_area as $key => $area) {
                                        
                                ?>
                                            <tr>
                                            <th scope="row"><? echo $key+1; ?></th>
                                            <td><? echo $area->area_name; ?></td>
                                            <td>
                                            <a href="<? echo base_url(); ?>member/config_area/edit_area/<? echo $area->id_area; ?>" class="text-dark"><i class="fas fa-edit"></i></a>
                                            &nbsp;
                                            <a href="<? echo base_url(); ?>member/config_area/delete_area/<? echo $area->id_area; ?>" class="text-danger" onclick="return confirm('Comfirm Delete?');"><i class="fas fa-trash"></i></a>
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

                    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12" id="machine_type">
                        <div class="card">
                            <div class="card-body">
                                <form action="<? echo base_url(); ?>member/config_area/data_add_area" method="POST">
                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <label for="area_name">Add New Area</label>
                                            <input type="text" class="form-control" id="area_name" name="area_name" placeholder="Area Name" required>
                                        </div>
                                    </div>
                                    <center>
                                    <hr>
                                    <button type="submit" class="btn btn-primary">Save</button> &nbsp;&nbsp;
                                    <button type="reset" class="btn btn-warning">Reset</button>
                                    </center>
                                </form>
                            </div>

                            <!-- <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <label for="machine_type_name">Machine Type</label>
                                            <input type="text" class="form-control" id="machine_type_name" v-model="machine_type_name" placeholder="Machine Type" required>
                                        </div>
                                    </div>
                                    <center>
                                    <hr>
                                    <div id="results"></div>
                                    <br>
                                    <button type="button" class="btn btn-primary" @click="AddData();">Save</button> &nbsp;&nbsp;
                                    <button type="reset" class="btn btn-warning" @click="ResetData();">Reset</button>
                                    </center>
                            </div> -->

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