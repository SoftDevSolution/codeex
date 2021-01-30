<? 
    foreach ($setting_web as $data) {  }
    foreach ($query_assets as $cus) {  }
?>
<!doctype html>
<html lang="en">

 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <? $this->load->view("member/script_css"); ?>

    <title>Edit New Assets</title>
    <!-- Sweet Alert -->
    <script src="<? echo base_url(); ?>theme/sweetalert/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="<? echo base_url(); ?>theme/sweetalert/sweetalert2.min.css">

    <style>
        .img_thmb {
            width: 80px;
        }
    </style>
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
                            <h3 class="section-title">Edit New Asset</h3>
                            <hr>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<? echo base_url(); ?>member/assets" class="breadcrumb-link">Assets</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit New Asset</li>
                        </ol>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
        <form action="<? echo base_url(); ?>member/assets/edit_data_assets" method="POST" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="asset_desc">Description <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="asset_desc" id="asset_desc" required><? echo $cus->asset_desc; ?></textarea>
                </div>
                <div class="form-group col-md-12">
                    <label for="asset_guarantee">การรับประกันจากร้านค้า</label>
                    <input type="text" class="form-control" id="asset_guarantee" name="asset_guarantee"  value="<? echo $cus->asset_guarantee; ?>"   placeholder="การรับประกันจากร้านค้า">
                </div>
                <div class="form-group col-md-12">
                    <label for="asset_condition">สภาพทรัพย์สิน</label>
                    <input type="text" class="form-control" id="asset_condition" name="asset_condition"  value="<? echo $cus->asset_condition; ?>"   placeholder="สภาพทรัพย์สิน">
                </div>
                <div class="form-group col-md-12">
                    <label for="asset_destroy">เมื่อทำลายหรือจำหน่าย</label>
                    <input type="text" class="form-control" id="asset_destroy" name="asset_destroy"  value="<? echo $cus->asset_destroy; ?>"   placeholder="เมื่อทำลายหรือจำหน่าย">
                </div>
                <div class="form-group col-md-12">
                    <label for="asset_storage_location">สถานที่จัดเก็บ</label>
                    <input type="text" class="form-control" id="asset_storage_location" name="asset_storage_location"  value="<? echo $cus->asset_storage_location; ?>"   placeholder="สถานที่จัดเก็บ">
                </div>
                <div class="form-group col-md-3">
                    <label for="asset_amount">จำนวน</label>
                    <input type="number" min="0" class="form-control" id="asset_amount" name="asset_amount"  value="<? echo $cus->asset_amount; ?>"   placeholder="จำนวน">
                </div>
                <div class="form-group col-md-3">
                    <label for="asset_unit">หน่วยเป็น</label>
                    <input type="text" class="form-control" id="asset_unit" name="asset_unit"  value="<? echo $cus->asset_unit; ?>"   placeholder="หน่วยเป็น">
                </div>
                <div class="form-group col-md-3">
                    <label for="asset_doc_no">เลขที่เอกสาร</label>
                    <input type="text" class="form-control" id="asset_doc_no" name="asset_doc_no"  value="<? echo $cus->asset_doc_no; ?>"   placeholder="หน่วยเป็น">
                </div>
                <div class="form-group col-md-3">
                    <label for="asset_movement">รายการเคลื่อนไหว</label>
                    <select class="form-control" name="asset_movement" id="asset_movement">
                        <option value="">-- Select --</option>
                        <option value="รับมา">รับมา</option>
                        <option value="ตัดออก">ตัดออก</option>
                        <option value="คงเหลือ">คงเหลือ</option>
                    </select>
                </div>
                <div class="form-group col-md-12">
                    <label for="asset_borrow">ทรัพย์สินยืม/สาธิต</label>
                    <input type="text" class="form-control" id="asset_borrow" name="asset_borrow"  value="<? echo $cus->asset_borrow; ?>"   placeholder="ทรัพย์สินยืม/สาธิต">
                </div>
                <div class="form-group col-md-12">
                    <label for="asset_schedule_borrow">กำหนดการติดการยืม/สาธิตทรัพย์สิน</label>
                    <input type="text" class="form-control" id="asset_schedule_borrow" name="asset_schedule_borrow"  value="<? echo $cus->asset_schedule_borrow; ?>"   placeholder="กำหนดการติดการยืม/สาธิตทรัพย์สิน">
                </div>
                <div class="form-group col-md-12">
                    <label for="asset_pending_sale">ทรัพย์สินชำรุดรอจำหน่าย</label>
                    <input type="text" class="form-control" id="asset_pending_sale" name="asset_pending_sale"  value="<? echo $cus->asset_pending_sale; ?>"   placeholder="ทรัพย์สินชำรุดรอจำหน่าย">
                </div>
                <div class="form-group col-md-4">
                    <label for="asset_balance">จำนวนคงเหลือในระบบ</label>
                    <input type="number" min="0" class="form-control" id="asset_balance" name="asset_balance"  value="<? echo $cus->asset_balance; ?>"   placeholder="จำนวนคงเหลือในระบบ">
                </div>
                <div class="form-group col-md-4">
                    <label for="asset_real_stock">ตรวจนับสต็อคจริง</label>
                    <input type="number" min="0" class="form-control" id="asset_real_stock" name="asset_real_stock"  value="<? echo $cus->asset_real_stock; ?>"   placeholder="ตรวจนับสต็อคจริง">
                </div>
                <div class="form-group col-md-4">
                    <label for="asset_difference">ผลต่าง</label>
                    <input type="number" min="0" class="form-control" id="asset_difference" name="asset_difference"  value="<? echo $cus->asset_difference; ?>"   placeholder="ผลต่าง">
                </div>
                <div class="form-group col-md-12">
                    <label for="asset_councilor">ผู้ตรวจนับ</label>
                    <input type="text" class="form-control" id="asset_councilor" name="asset_councilor"  value="<? echo $cus->asset_councilor; ?>"   placeholder="ผู้ตรวจนับ">
                </div>
                <div class="form-group col-md-9">
                    <label for="asset_cause_difference">สาเหตุผลต่าง</label>
                    <input type="text" class="form-control" id="asset_cause_difference" name="asset_cause_difference"  value="<? echo $cus->asset_cause_difference; ?>"   placeholder="สาเหตุผลต่าง">
                </div>
                <div class="form-group col-md-3">
                    <label for="company_id">Company</label>
                    <select class="form-control" name="company_id" id="company_id">
                        <option value="">-- Select --</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="picture_1">Picture 1</label>
                    <center><img class="img_thmb" src="<? echo base_url(); ?>theme/photoassetsthumbnail/<? echo $cus->asset_pic_path_1; ?>" alt="<? echo $cus->asset_pic_path_1; ?>"></center>
                </div>
                <div class="form-group col-md-3">
                    <label for="picture_1">Picture 1</label>
                    <input type="file" class="form-control" id="picture_1" name="asset_pic_path_1">
                </div>
                <div class="form-group col-md-3">
                    <label for="picture_2">Picture 2</label>
                    <center><img class="img_thmb" src="<? echo base_url(); ?>theme/photoassetsthumbnail/<? echo $cus->asset_pic_path_2; ?>" alt="<? echo $cus->asset_pic_path_2; ?>"></center>
                </div>
                <div class="form-group col-md-3">
                    <label for="picture_2">Picture 2</label>
                    <input type="file" class="form-control" id="picture_2" name="asset_pic_path_2">
                </div>
                <div class="form-group col-md-3">
                    <label for="picture_3">Picture 3</label>
                    <center><img class="img_thmb" src="<? echo base_url(); ?>theme/photoassetsthumbnail/<? echo $cus->asset_pic_path_3; ?>" alt="<? echo $cus->asset_pic_path_3; ?>"></center>
                </div>
                <div class="form-group col-md-3">
                    <label for="picture_3">Picture 3</label>
                    <input type="file" class="form-control" id="picture_3" name="asset_pic_path_3">
                </div>
                <div class="form-group col-md-3">
                    <label for="picture_4">Picture 4</label>
                    <center><img class="img_thmb" src="<? echo base_url(); ?>theme/photoassetsthumbnail/<? echo $cus->asset_pic_path_4; ?>" alt="<? echo $cus->asset_pic_path_4; ?>"></center>
                </div>
                <div class="form-group col-md-3">
                    <label for="picture_4">Picture 4</label>
                    <input type="file" class="form-control" id="picture_4" name="asset_pic_path_4">
                </div>
                <div class="form-group col-md-3">
                    <label for="picture_5">Picture 5</label>
                    <center><img class="img_thmb" src="<? echo base_url(); ?>theme/photoassetsthumbnail/<? echo $cus->asset_pic_path_5; ?>" alt="<? echo $cus->asset_pic_path_5; ?>"></center>
                </div>
                <div class="form-group col-md-3">
                    <label for="picture_5">Picture 5</label>
                    <input type="file" class="form-control" id="picture_5" name="asset_pic_path_5">
                </div>
                <div class="form-group col-md-3">
                    <label for="picture_6">Picture 6</label>
                    <center><img class="img_thmb" src="<? echo base_url(); ?>theme/photoassetsthumbnail/<? echo $cus->asset_pic_path_6; ?>" alt="<? echo $cus->asset_pic_path_6; ?>"></center>
                </div>
                <div class="form-group col-md-3">
                    <label for="picture_6">Picture 6</label>
                    <input type="file" class="form-control" id="picture_6" name="asset_pic_path_6">
                </div>
                <div class="form-group col-md-3">
                    <label for="picture_7">Picture 7</label>
                    <center><img class="img_thmb" src="<? echo base_url(); ?>theme/photoassetsthumbnail/<? echo $cus->asset_pic_path_7; ?>" alt="<? echo $cus->asset_pic_path_7; ?>"></center>
                </div>
                <div class="form-group col-md-3">
                    <label for="picture_7">Picture 7</label>
                    <input type="file" class="form-control" id="picture_7" name="asset_pic_path_7">
                </div>
                <div class="form-group col-md-3">
                    <label for="picture_8">Picture 8</label>
                    <center><img class="img_thmb" src="<? echo base_url(); ?>theme/photoassetsthumbnail/<? echo $cus->asset_pic_path_8; ?>" alt="<? echo $cus->asset_pic_path_8; ?>"></center>
                </div>
                <div class="form-group col-md-3">
                    <label for="picture_8">Picture 8</label>
                    <input type="file" class="form-control" id="picture_8" name="asset_pic_path_8">
                </div>
                <div class="form-group col-md-3">
                    <label for="picture_9">Picture 9</label>
                    <center><img class="img_thmb" src="<? echo base_url(); ?>theme/photoassetsthumbnail/<? echo $cus->asset_pic_path_9; ?>" alt="<? echo $cus->asset_pic_path_9; ?>"></center>
                </div>
                <div class="form-group col-md-3">
                    <label for="picture_9">Picture 9</label>
                    <input type="file" class="form-control" id="picture_9" name="asset_pic_path_9">
                </div>
                <div class="form-group col-md-3">
                    <label for="picture_10">Picture 10</label>
                    <center><img class="img_thmb" src="<? echo base_url(); ?>theme/photoassetsthumbnail/<? echo $cus->asset_pic_path_10; ?>" alt="<? echo $cus->asset_pic_path_10; ?>"></center>
                </div>
                <div class="form-group col-md-3">
                    <label for="picture_10">Picture 10</label>
                    <input type="file" class="form-control" id="picture_10" name="asset_pic_path_10">
                </div>
                <div class="form-group col-md-12">
                    <label for="asset_remark">Note/Remark</label>
                    <textarea class="form-control" name="asset_remark" id="asset_remark"  placeholder="Note/Remark"><? echo $cus->asset_remark; ?></textarea>
                </div>

            </div>

            <center>
            <hr>
            <input type="hidden" name="asset_id" value="<? echo $cus->asset_id; ?>">
            <button type="submit" class="btn btn-primary">Edit</button> &nbsp;&nbsp;
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