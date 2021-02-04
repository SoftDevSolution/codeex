<? 
    foreach ($setting_web as $data) {  }
    //foreach ($get_data_visitor as $cus) {  }
?>
<!doctype html>
<html lang="en">

 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <? $this->load->view("member/script_css"); ?>

    <title>Config Visitor</title>

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
                            <h3 class="section-title">Edit New Visitor</h3>
                            <hr>
                        </div>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" id="visitor">
                        <div class="card">
                            <div class="card-body">
                        <?
                            foreach ($get_data_visitor as $mach) {
                                
                            }
                        ?>
                                <form action="<? echo base_url(); ?>member/visitor/edit_data_visitor" method="POST">
                                    <div class="form-row">

                                    <div class="form-group col-12">
                                            <label for="vs_name">ชื่อ นามสกุล</label>
                                            <input type="text" class="form-control" id="vs_name" name="vs_name" value="<? echo $mach->vs_name; ?>"  placeholder="ชื่อ นามสกุล" required>
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="vs_address">ที่อยู่ปัจจุบัน</label>
                                            <input type="text" class="form-control" id="vs_address" name="vs_address" value="<? echo $mach->vs_address; ?>"  placeholder="ที่อยู่ปัจจุบัน" >
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="vs_company">ชื่อบริษัทลูกค้า</label>
                                            <input type="text" class="form-control" id="vs_company" name="vs_company" value="<? echo $mach->vs_company; ?>"  placeholder="ชื่อบริษัทลูกค้า" >
                                        </div>

                                        <div class="form-group col-12">
                                            <label for="vs_position">ตำแหน่ง</label>
                                            <input type="text" class="form-control" id="vs_position" name="vs_position" value="<? echo $mach->vs_position; ?>"  placeholder="ตำแหน่ง" >
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="vs_branch">แผนก</label>
                                            <input type="text" class="form-control" id="vs_branch" name="vs_branch" value="<? echo $mach->vs_branch; ?>"  placeholder="แผนก" >
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="vs_tel_1">Tel.1</label>
                                            <input type="text" class="form-control" id="vs_tel_1" name="vs_tel_1" value="<? echo $mach->vs_tel_1; ?>"  placeholder="Tel.1" >
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="vs_tel_2">Tel.2</label>
                                            <input type="text" class="form-control" id="vs_tel_2" name="vs_tel_2" value="<? echo $mach->vs_tel_2; ?>"  placeholder="Tel.2" >
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="vs_tel_main">เบอร์ติดต่อหลัก</label>
                                            <input type="text" class="form-control" id="vs_tel_main" name="vs_tel_main" value="<? echo $mach->vs_tel_main; ?>"  placeholder="เบอร์ติดต่อหลัก" >
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="vs_mobile_phone">Mobile Phone</label>
                                            <input type="text" class="form-control" id="vs_mobile_phone" name="vs_mobile_phone" value="<? echo $mach->vs_mobile_phone; ?>"  placeholder="Mobile Phone" >
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="vs_email">Email</label>
                                            <input type="text" class="form-control" id="vs_email" name="vs_email" value="<? echo $mach->vs_email; ?>"  placeholder="Email" >
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="vs_email_personal">Personel Email</label>
                                            <input type="text" class="form-control" id="vs_email_personal" name="vs_email_personal" value="<? echo $mach->vs_email_personal; ?>"  placeholder="Personel Email" >
                                        </div>

                                            </div>
                                    <center>
                                    <hr>
                                    <input type="hidden" id="vs_id" name="vs_id" value="<? echo $mach->vs_id; ?>">
                                    <button type="submit" class="btn btn-primary">Edit</button> &nbsp;&nbsp;
                                    <a href="<? echo base_url(); ?>member/visitor"><button type="button" class="btn btn-warning">Back</button></a>
                                    </center>
                                </form>
                            </div>

                            <!-- <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <label for="model_name">Machine Type</label>
                                            <input type="text" class="form-control" id="model_name" v-model="model_name" value="<? echo $mach->position_id; ?>"  value="<? echo $mach->br_return_date; ?>"  placeholder="Machine Type" >
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