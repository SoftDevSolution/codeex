<!doctype html>
<html lang="en">

 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <? $this->load->view("member/script_css"); ?>

    <title>Add Sub Requisition</title>
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
                            <h3 class="section-title">Add Sub Requisition</h3>
                            <hr>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<? echo base_url(); ?>member/requisition" class="breadcrumb-link">Requisition</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Sub Requisition</li>
                        </ol>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
        <form action="<? echo base_url(); ?>member/add_sub_requisition" method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="rqs_id">เบิก สินค้าหลักหรือ Part <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="rqs_id" name="rqs_id" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="machine_id">Machine Detail ID<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="machine_id" name="machine_id" placeholder="Machine Detail ID">
                </div>
                <div class="form-group col-md-6">
                    <label for="sub_rqs_pn">P/N <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="sub_rqs_pn" name="sub_rqs_pn" placeholder="P/N">
                </div>
                <div class="form-group col-md-6">
                    <label for="sub_rqs_sn">Serial Number</label>
                    <input type="text" class="form-control" id="sub_rqs_sn" name="sub_rqs_sn" placeholder="Serial Number">
                </div>
                <div class="form-group col-md-6">
                    <label for="sub_rqs_station_location">สถานที่จัดเก็บ</label>
                    <input type="text" class="form-control" id="sub_rqs_station_location" name="sub_rqs_station_location" placeholder="สถานที่จัดเก็บ">
                    
                </div>
                <div class="form-group col-md-6">
                    <label for="sub_rqs_mch_type">ประเภทของสินค้าทางบัญชี</label>
                    <input type="text" class="form-control" id="sub_rqs_mch_type" name="sub_rqs_mch_type" placeholder="ประเภทของสินค้าทางบัญชี">
                </div>
                
                <div class="form-group col-md-12">
                    <label for="sub_rqs_remark">Note/Remark</label>
                    <textarea class="form-control" name="sub_rqs_remark" id="sub_rqs_remark" placeholder="Note/Remark"></textarea>
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