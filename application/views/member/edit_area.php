<? 
    foreach ($setting_web as $data) {  }
    foreach ($query_data as $ppp) {  }
?>
<!doctype html>
<html lang="en">

 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <? $this->load->view("member/script_css"); ?>

    <title>Edit Area | <? echo $data->nameweb; ?></title>

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
                            <h3 class="section-title">Edit Area</h3>
                        </div>
                    </div>

                    <div class="col-xl-12 col-12">
                        <? $this->load->view("member/flashsweet"); ?>
                    </div>

                    
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" id="machine_type">
                        <div class="card">
                            <div class="card-body">
                                <form action="<? echo base_url(); ?>member/config_area/data_edit_area" method="POST">
                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <label for="area_name">Area</label>
                                            <input type="text" class="form-control" id="area_name" name="area_name" placeholder="Area Name" value="<? echo $ppp->area_name; ?>" required>
                                        </div>
                                    </div>
                                    <center>
                                    <hr>
                                    <input type="hidden" name="id_area" value="<? echo $ppp->id_area; ?>">
                                    <button type="submit" class="btn btn-primary">Save</button> &nbsp;&nbsp;
                                    <a href="<? echo base_url(); ?>member/config_area"><button type="button" class="btn btn-warning">Back</button></a>
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
    
    <? $this->load->view("member/script_js"); ?>


    


</body>
 
</html>