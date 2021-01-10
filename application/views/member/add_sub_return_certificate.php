<!doctype html>
<html lang="en">

 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <? $this->load->view("member/script_css"); ?>

    <title>Add Sub Return Certificate</title>
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
                            <h3 class="section-title">Add Sub Return Certificate</h3>
                            <hr>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<? echo base_url(); ?>member/return_certificate" class="breadcrumb-link">Return Certificate</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Sub Return Certificate</li>
                        </ol>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
        <form action="<? echo base_url(); ?>member/add_data_sub_return_certificate" method="POST">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="rtc_id">Requisition ID <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="rtc_id" name="rtc_id" placeholder="Requisition ID">
                </div>
                <div class="form-group col-md-4">
                    <label for="machine_id">Machine Detail ID  <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="machine_id" name="machine_id" placeholder="Machine Detail ID ">
                </div>
                <div class="form-group col-md-4">
                    <label for="sub_rtc_date_in">Date (วันรับเข้า)</label>
                    <input type="date" class="form-control" id="sub_rtc_date_in" name="sub_rtc_date_in" placeholder="Date (วันรับเข้า)">
                </div>
                <div class="form-group col-md-6">
                    <label for="sub_rtc_pn">P/N</label>
                    <input type="text" class="form-control" id="sub_rtc_pn" name="sub_rtc_pn" placeholder="P/N">
                </div>
                <div class="form-group col-md-6">
                    <label for="sub_rtc_sn">Serial Number<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="sub_rtc_sn" name="sub_rtc_sn" placeholder="Serial Number">
                </div>
                <div class="form-group col-md-6">
                    <label for="sub_rtc_station_location">สถานที่จัดเก็บ</label>
                    <input type="number" min="0" class="form-control" id="sub_rtc_station_location" name="sub_rtc_station_location" placeholder="สถานที่จัดเก็บ">
                </div>
                <div class="form-group col-md-6">
                    <label for="sub_rtc_mch_type">ประเภทของสินค้าทางบัญชี</label>
                    <input type="text" class="form-control" id="sub_rtc_mch_type" name="sub_rtc_mch_type" placeholder="ประเภทของสินค้าทางบัญชี">
                </div>
                <div class="form-group col-md-6">
                    <label for="sub_rtc_rqs_no">หมายเลขใบเบิกสินค้า</label>
                    <input type="text" class="form-control" id="sub_rtc_rqs_no" name="sub_rtc_rqs_no" placeholder="หมายเลขใบเบิกสินค้า">
                </div>
                <div class="form-group col-md-6">
                    <label for="sub_rtc_ivn_no">Invoice Number</label>
                    <input type="text" class="form-control" id="sub_rtc_ivn_no" name="sub_rtc_ivn_no" placeholder="Invoice Number">
                </div>
                <div class="form-group col-md-6">
                    <label for="sub_rtc_waranty_period">Waranty Period</label>
                    <input type="text" class="form-control" id="sub_rtc_waranty_period" name="sub_rtc_waranty_period" placeholder="Waranty Period">
                </div>
                <div class="form-group col-md-6">
                    <label for="sub_rtc_sup_waranty_end">Supplier Waranty End</label>
                    <input type="text" class="form-control" id="sub_rtc_sup_waranty_end" name="sub_rtc_sup_waranty_end" placeholder="Supplier Waranty End">
                </div>
                <div class="form-group col-md-12">
                    <label for="sub_rtc_remark">Note/Remark</label>
                    <textarea class="form-control" name="sub_rtc_remark" id="sub_rtc_remark" placeholder="Note/Remark"></textarea>
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