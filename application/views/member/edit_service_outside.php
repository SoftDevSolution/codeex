<? 
    foreach ($setting_web as $data) {  }
    foreach ($query_service_outside as $cus) {  }
?>
<!doctype html>
<html lang="en">

 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <? $this->load->view("member/script_css"); ?>

    <title>Edit Service Outside</title>

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
                            <h3 class="section-title">Edit Service Outside</h3>
                            <hr>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<? echo base_url(); ?>member/service_outside" class="breadcrumb-link">Service Outside</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Service Outside</li>
                        </ol>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
        <form action="<? echo base_url(); ?>member/service_outside/edit_data_service_outside" method="POST" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="svo_revision_no">Revision No.</label>
                    <input type="text" class="form-control" id="svo_revision_no" name="svo_revision_no" value="<? echo $cus->svo_revision_no; ?>"   placeholder="Revision No. (จำนวนที่ทำซ้ำ)">
                </div>
                <div class="form-group col-md-3">
                    <label for="svo_date">Date</label>
                    <input type="date" class="form-control" id="svo_date" name="svo_date" value="<? echo $cus->svo_date; ?>"   placeholder="Date">
                </div>
                <div class="form-group col-md-3">
                    <label for="svo_company_name">Company Name</label>
                    <input type="text" class="form-control" id="svo_company_name" name="svo_company_name" value="<? echo $cus->svo_company_name; ?>"   placeholder="Company Name">
                </div>
                <div class="form-group col-md-3">
                    <label for="svo_machine_model">Machine Model</label>
                    <input type="text" class="form-control" id="svo_machine_model" name="svo_machine_model" value="<? echo $cus->svo_machine_model; ?>"   placeholder="Machine Model">
                </div>
                <div class="form-group col-md-6">
                    <label for="svo_machine_sn">Machine S/N</label>
                    <input type="text" class="form-control" id="svo_machine_sn" name="svo_machine_sn" value="<? echo $cus->svo_machine_sn; ?>"   placeholder="Machine S/N">
                </div>
                <div class="form-group col-md-6">
                    <label for="svo_technician_name">Technician Name</label>
                    <input type="text" class="form-control" id="svo_technician_name" name="svo_technician_name" value="<? echo $cus->svo_technician_name; ?>"   placeholder="Technician Name">
                </div>
                <div class="form-group col-md-4">
                    <label for="svo_emp_receive">คนรับงาน</label>
                    <input type="text" class="form-control" id="svo_emp_receive" name="svo_emp_receive" value="<? echo $cus->svo_emp_receive; ?>"   placeholder="คนรับงาน">
                </div>
                <div class="form-group col-md-4">
                    <label for="svo_emp_id_1">คนทำงาน 1</label>
                    <input type="text" class="form-control" id="svo_emp_id_1" name="svo_emp_id_1" value="<? echo $cus->svo_emp_id_1; ?>"   placeholder="คนทำงาน 1">
                </div>
                <div class="form-group col-md-4">
                    <label for="svo_emp_id_2">คนทำงาน 2</label>
                    <input type="text" class="form-control" id="svo_emp_id_2" name="svo_emp_id_2" value="<? echo $cus->svo_emp_id_2; ?>"   placeholder="คนทำงาน 1">
                </div>
                <div class="form-group col-md-4">
                    <label for="svo_emp_id_3">คนทำงาน 3</label>
                    <input type="text" class="form-control" id="svo_emp_id_3" name="svo_emp_id_3" value="<? echo $cus->svo_emp_id_3; ?>"   placeholder="คนทำงาน 1">
                </div>
                <div class="form-group col-md-4">
                    <label for="svo_emp_id_4">คนทำงาน 4</label>
                    <input type="text" class="form-control" id="svo_emp_id_4" name="svo_emp_id_4" value="<? echo $cus->svo_emp_id_4; ?>"   placeholder="คนทำงาน 1">
                </div>
                <div class="form-group col-md-4">
                    <label for="svo_emp_id_5">คนทำงาน 5</label>
                    <input type="text" class="form-control" id="svo_emp_id_5" name="svo_emp_id_5" value="<? echo $cus->svo_emp_id_5; ?>"   placeholder="คนทำงาน 1">
                </div>
                <div class="form-group col-md-4">
                    <label for="svo_license_plate_1">ทะเบียนรถใช้งาน 1</label>
                    <input type="text" class="form-control" id="svo_license_plate_1" name="svo_license_plate_1" value="<? echo $cus->svo_license_plate_1; ?>"   placeholder="ทะเบียนรถใช้งาน 1">
                </div>
                <div class="form-group col-md-4">
                    <label for="svo_license_plate_2">ทะเบียนรถใช้งาน 2</label>
                    <input type="text" class="form-control" id="svo_license_plate_2" name="svo_license_plate_2" value="<? echo $cus->svo_license_plate_2; ?>"   placeholder="ทะเบียนรถใช้งาน 2">
                </div>
                <div class="form-group col-md-4">
                    <label for="svo_license_plate_3">ทะเบียนรถใช้งาน 3</label>
                    <input type="text" class="form-control" id="svo_license_plate_3" name="svo_license_plate_3" value="<? echo $cus->svo_license_plate_3; ?>"   placeholder="ทะเบียนรถใช้งาน 3">
                </div>
                <div class="form-group col-md-4">
                    <label for="svo_license_plate_4">ทะเบียนรถใช้งาน 4</label>
                    <input type="text" class="form-control" id="svo_license_plate_4" name="svo_license_plate_4" value="<? echo $cus->svo_license_plate_4; ?>"   placeholder="ทะเบียนรถใช้งาน 4">
                </div>
                <div class="form-group col-md-4">
                    <label for="svo_license_plate_5">ทะเบียนรถใช้งาน 5</label>
                    <input type="text" class="form-control" id="svo_license_plate_5" name="svo_license_plate_5" value="<? echo $cus->svo_license_plate_5; ?>"   placeholder="ทะเบียนรถใช้งาน 5">
                </div>
                <div class="form-group col-md-4">
                    <label for="svo_active_type">Activity Type</label>
                    <input type="text" class="form-control" id="svo_active_type" name="svo_active_type" value="<? echo $cus->svo_active_type; ?>"   placeholder="Activity Type">
                </div>
                <div class="form-group col-md-4">
                    <label for="svo_status">Status</label>
                    <input type="text" class="form-control" id="svo_status" name="svo_status" value="<? echo $cus->svo_status; ?>"   placeholder="Status">
                </div>
                <div class="form-group col-md-4">
                    <label for="svo_case_break_down">อาการเสียหลัก</label>
                    <select class="form-control" name="svo_case_break_down" id="svo_case_break_down">
                        <option value="">-- Select --</option>
                        <option value="aaa">aaa</option>
                        <option value="bbb">bbb</option>
                        <option value="ccc">ccc</option>
                        <option value="ddd">ddd</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="svo_detail">รายละเอียด</label>
                    <input type="number" min="0" class="form-control" id="svo_detail" name="svo_detail" value="<? echo $cus->svo_detail; ?>"   placeholder="รายละเอียด">
                </div>
                
                <div class="form-group col-md-3">
                    <label for="picture_1">Picture 1</label>
                    <input type="file" class="form-control" id="picture_1" name="picture_1">
                </div>
                <div class="form-group col-md-3">
                    <label for="picture_2">Picture 2</label>
                    <input type="file" class="form-control" id="picture_2" name="picture_2">
                </div>
                <div class="form-group col-md-3">
                    <label for="picture_3">Picture 3</label>
                    <input type="file" class="form-control" id="picture_3" name="picture_3">
                </div>
                <div class="form-group col-md-3">
                    <label for="picture_4">Picture 4</label>
                    <input type="file" class="form-control" id="picture_4" name="picture_4">
                </div>
                <div class="form-group col-md-3">
                    <label for="picture_5">Picture 5</label>
                    <input type="file" class="form-control" id="picture_5" name="picture_5">
                </div>
                <div class="form-group col-md-4">
                    <label for="svo_case_break_down">Company ID</label>
                    <select class="form-control" name="svo_case_break_down" id="svo_case_break_down">
                        <option value="">-- Select --</option>
                        <option value="aaa">aaa</option>
                        <option value="bbb">bbb</option>
                        <option value="ccc">ccc</option>
                        <option value="ddd">ddd</option>
                    </select>
                </div>
                <div class="form-group col-md-12">
                    <label for="svo_remark">Note/Remark</label>
                    <textarea class="form-control" name="svo_remark" id="svo_remark" placeholder="Note/Remark"><? echo $cus->svo_remark; ?></textarea>
                </div>

            </div>

            <center>
            <hr>
            <input type="text" name="svo_id" value="<? echo $cus->svo_id; ?>">
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