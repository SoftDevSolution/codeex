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

    <title>Edit User Type | <? echo $data->nameweb; ?></title>

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
                            <h3 class="section-title">Edit New User Type</h3>
                            <hr>
                        </div>
                    </div>

                    <div class="col-xl-12 col-12">
                        <? $this->load->view("member/flashsweet"); ?>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" id="user_type">
                        <div class="card">
                            <div class="card-body">
                        <?
                            foreach ($get_data_user_type as $mach) {
                                
                            }
                        ?>
                                <form action="<? echo base_url(); ?>member/config_user_type/edit_data_config_user_type" method="POST">
                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <label for="user_type_name">user Type</label>
                                            <input type="text" class="form-control" id="user_type_name" name="user_type_name" placeholder="user Type" value="<? echo $mach->user_type_name; ?>">
                                        </div>
                                    </div>
                                    <center>
                                    <hr>
                                    <input type="hidden" name="user_type_id" value="<? echo $mach->user_type_id; ?>">
                                    <button type="submit" class="btn btn-primary">Edit</button> &nbsp;&nbsp;
                                    <a href="<? echo base_url(); ?>member/config_user_type"><button type="button" class="btn btn-warning">Back</button></a>
                                    </center>
                                </form>
                            </div>

                            <!-- <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <label for="user_type_name">user Type</label>
                                            <input type="text" class="form-control" id="user_type_name" v-model="user_type_name" placeholder="user Type" required>
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
    

</body>
 
</html>