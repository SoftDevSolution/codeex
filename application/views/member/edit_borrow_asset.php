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

    <title>Config Position | <? echo $data->nameweb; ?></title>

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
                            <h3 class="section-title">Edit New Position</h3>
                            <hr>
                        </div>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" id="machine_position">
                        <div class="card">
                            <div class="card-body">
                        <?
                            foreach ($get_data_borrow_asset as $mach) {
                                
                            }
                        ?>
                                <form action="<? echo base_url(); ?>member/borrow_asset/edit_data_borrow_asset" method="POST">
                                    <div class="form-row">

                                                <div class="form-group col-12">
                                                    <label for="asset_id">Asset ID</label>
                                                    <input type="text" class="form-control" id="asset_id" name="asset_id" value="<? echo $mach->asset_id; ?>"  placeholder="Asset ID" required>
                                                </div>
                                                <div class="form-group col-12">
                                                    <label for="br_cause">สาเหตุที่ยืม</label>
                                                    <input type="text" class="form-control" id="br_cause" name="br_cause" value="<? echo $mach->br_cause; ?>"  placeholder="สาเหตุที่ยืม" >
                                                </div>
                                                <div class="form-group col-12">
                                                    <label for="br_work">ยืมเพื่องาน</label>
                                                    <input type="text" class="form-control" id="br_work" name="br_work" value="<? echo $mach->br_work; ?>"  placeholder="ยืมเพื่องาน" >
                                                </div>

                                                <div class="form-group col-12">
                                                    <label for="br_detail">รายละเอียดการยืม</label>
                                                    <input type="text" class="form-control" id="br_detail" name="br_detail" value="<? echo $mach->br_detail; ?>"  placeholder="รายละเอียดการยืม" >
                                                </div>
                                                <div class="form-group col-12">
                                                    <label for="br_no">เลขใบสั่งซื้อ</label>
                                                    <input type="text" class="form-control" id="br_no" name="br_no" value="<? echo $mach->br_no; ?>"  placeholder="เลขใบสั่งซื้อ" >
                                                </div>
                                                <div class="form-group col-12">
                                                    <label for="br_return_date">วันที่จะคืน</label>
                                                    <input type="date" class="form-control" id="br_return_date" name="br_return_date" value="<? echo $mach->br_return_date; ?>"  placeholder="วันที่จะคืน" >
                                                </div>
                                                <div class="form-group col-12">
                                                    <label for="br_user">ผู้เบิก</label>
                                                    <input type="text" class="form-control" id="br_user" name="br_user" value="<? echo $mach->br_user; ?>"  placeholder="ผู้เบิก" >
                                                </div>
                                                <div class="form-group col-12">
                                                    <label for="br_accept">ผู้อนุมัติ/ปล่อยของ</label>
                                                    <input type="text" class="form-control" id="br_accept" name="br_accept" value="<? echo $mach->br_accept; ?>"  placeholder="ผู้อนุมัติ/ปล่อยของ" >
                                                </div>
                                                <div class="form-group col-12">
                                                    <label for="br_date">วันที่ปล่อยของ</label>
                                                    <input type="date" class="form-control" id="br_date" name="br_date" value="<? echo $mach->br_date; ?>"  placeholder="วันที่ปล่อยของ" >
                                                </div>

                                            </div>
                                    <center>
                                    <hr>
                                    <input type="hidden" name="br_id" value="<? echo $mach->br_id; ?>">
                                    <button type="submit" class="btn btn-primary">Edit</button> &nbsp;&nbsp;
                                    <a href="<? echo base_url(); ?>member/borrow_asset"><button type="button" class="btn btn-warning">Back</button></a>
                                    </center>
                                </form>
                            </div>

                            <!-- <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <label for="model_name">Machine Type</label>
                                            <input type="text" class="form-control" id="model_name" v-model="model_name" value="<? echo $mach->position_id; ?>"  placeholder="Machine Type" >
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