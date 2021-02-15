<!doctype html>
<html lang="en">

 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <? $this->load->view("member/script_css"); ?>

    <title>Add Service Outside</title>

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
                            <h3 class="section-title">Add Service Outside</h3>
                            <hr>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<? echo base_url(); ?>member/service_outside" class="breadcrumb-link">Service Outside</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Service Outside</li>
                        </ol>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
        <form action="<? echo base_url(); ?>member/service_outside/add_data_service_outside" method="POST" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="svo_requisition_no">Requisition No. แนบใบเบิก(เลขที่) <span class="text-danger">*</span></label>
                    <select class="form-control" name="svo_requisition_no" id="svo_requisition_no" onchange="return GetRequisitionData();" required>
                        <option value="">--Selecte--</option>
                    <? foreach ($query_requisition as $req) {  ?>
                        <option value="<? echo $req->rqs_id; ?>">
                        No. <? echo $req->rqs_id; ?>
                        </option>
                    <? } ?>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="svo_get_date">Date วันที่รับแจ้ง <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="svo_get_date" name="svo_get_date" placeholder="Date" value="<? echo date("Y-m-d"); ?>" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="svo_date_working">Date วันที่ทำงาน <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="svo_date_working" name="svo_date_working" placeholder="Date" value="<? echo date("Y-m-d"); ?>" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="svo_company_name">Company Name (บริษัทผู้ให้บริการ) <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="svo_company_name" name="svo_company_name" placeholder="Company Name" required readonly>
                    <input type="hidden" name="svo_company_id" id="svo_company_id">
                </div>
                <div class="form-group col-md-3">
                    <label for="svo_machine_sn">Machine S/N</label>
                    <input type="text" class="form-control" id="svo_machine_sn" name="svo_machine_sn" placeholder="Machine S/N">
                </div>
                <div class="form-group col-md-3">
                    <label for="svo_machine_model">Machine Model</label>
                    <input type="text" class="form-control" id="svo_machine_model" name="svo_machine_model" placeholder="Machine Model">
                </div>
                <div class="form-group col-md-3">
                    <label for="svo_machine_status">Machine Status</label>
                    <input type="text" class="form-control" id="svo_machine_status" name="svo_machine_status" placeholder="Machine Status">
                </div>
                <div class="form-group col-md-3">
                    <label for="svo_customer_name">ลูกค้าที่ติดต่อ <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="svo_customer_name" name="svo_customer_name" placeholder="Customer Name" required readonly>
                    <input type="hidden" class="form-control" id="svo_customer_id" name="svo_customer_id" readonly>
                </div>
                <div class="form-group col-md-3">
                    <label for="svo_emp_receive">คนรับงาน</label>
                    <select class="form-control" name="svo_emp_receive" id="svo_emp_receive">
                        <option value="">-- กรุณาเลือก --</option>
                        <? foreach ($query_employee as $aaa) { ?>
                        <option value="<? echo $aaa->emp_id; ?>"><? echo $aaa->emp_name; ?></option>
                    <? } ?>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="svo_emp_id_1">คนทำงาน 1</label>
                    <select class="form-control" name="svo_emp_id_1" id="svo_emp_id_1">
                        <option value="">-- กรุณาเลือก --</option>
                        <? foreach ($query_employee as $aaa) { ?>
                        <option value="<? echo $aaa->emp_id; ?>"><? echo $aaa->emp_name; ?></option>
                    <? } ?>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="svo_emp_id_2">คนทำงาน 2</label>
                    <select class="form-control" name="svo_emp_id_2" id="svo_emp_id_2">
                        <option value="">-- กรุณาเลือก --</option>
                        <? foreach ($query_employee as $aaa) { ?>
                        <option value="<? echo $aaa->emp_id; ?>"><? echo $aaa->emp_name; ?></option>
                    <? } ?>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="svo_emp_id_3">คนทำงาน 3</label>
                    <select class="form-control" name="svo_emp_id_3" id="svo_emp_id_3">
                        <option value="">-- กรุณาเลือก --</option>
                        <? foreach ($query_employee as $aaa) { ?>
                        <option value="<? echo $aaa->emp_id; ?>"><? echo $aaa->emp_name; ?></option>
                    <? } ?>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="svo_license_plate_1">ทะเบียนรถใช้งาน 1</label>
                    <input type="text" class="form-control" id="svo_license_plate_1" name="svo_license_plate_1" placeholder="ทะเบียนรถใช้งาน 1">
                </div>
                <div class="form-group col-md-3">
                    <label for="svo_license_plate_2">ทะเบียนรถใช้งาน 2</label>
                    <input type="text" class="form-control" id="svo_license_plate_2" name="svo_license_plate_2" placeholder="ทะเบียนรถใช้งาน 2">
                </div>
                <div class="form-group col-md-3">
                    <label for="svo_license_plate_3">ทะเบียนรถใช้งาน 3</label>
                    <input type="text" class="form-control" id="svo_license_plate_3" name="svo_license_plate_3" placeholder="ทะเบียนรถใช้งาน 3">
                </div>
                <div class="form-group col-md-3">
                    <label for="svo_status">Status</label>
                    <input type="text" class="form-control" id="svo_status" name="svo_status" placeholder="Status">
                </div>
                <div class="form-group col-md-6">
                    <label for="svo_case_break_down">อาการเสียหลัก</label>
                    <textarea name="svo_case_break_down" id="svo_case_break_down" class="form-control" rows="6"></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="svo_conclusion">ข้อสรุปของปัญหา</label>
                    <textarea name="svo_conclusion" id="svo_conclusion" class="form-control" rows="6"></textarea>
                </div>
                
                <div class="form-group col-md-4">
                    <label for="picture_1">Picture 1</label>
                    <input type="file" class="form-control" id="picture_1" name="picture_1">
                </div>
                <div class="form-group col-md-4">
                    <label for="picture_2">Picture 2</label>
                    <input type="file" class="form-control" id="picture_2" name="picture_2">
                </div>
                <div class="form-group col-md-4">
                    <label for="picture_3">Picture 3</label>
                    <input type="file" class="form-control" id="picture_3" name="picture_3">
                </div>
                <div class="form-group col-md-6">
                    <label for="svo_province">Province (จังหวัด)</label>
                    <input type="text" class="form-control" id="svo_province" name="svo_province" autocomplete="off">
                </div>
                <div class="form-group col-md-6">
                    <label for="svo_zipcode">Zipcode (รหัสไปรษณีย์)</label>
                    <input type="text" class="form-control" id="svo_zipcode" name="svo_zipcode" onkeypress="return IsNumeric(event,'zipcode');">
                    <span id="zipcode" style="color: Red; display: none">* Please enter number (0 - 9)</span>
                </div>
                <div class="form-group col-md-12">
                    <label for="svo_remark">Note/Remark</label>
                    <textarea class="form-control" name="svo_remark" id="svo_remark" placeholder="Note/Remark"></textarea>
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

    <script>
        function GetRequisitionData() { 
            var svo_requisition_no = $("#svo_requisition_no").val();
            console.log(svo_requisition_no);

            if(svo_requisition_no==""){

            } else {
                // ค้นหาข้อมูล ใบเบิก มาใช้งาน
                $.ajax({
                    type: 'post',
                    url: '<? echo base_url(); ?>member/service_outside/query_requisition',
                    data: {
                        svo_requisition_no : svo_requisition_no
                    },
                    success: function (response) {
                        console.log(response);
                        var res = response.split("/");
                        $("#svo_customer_name").val(res[0]);
                        $("#svo_company_name").val(res[1]);
                        $("#svo_customer_id").val(res[2]);
                        $("#svo_company_name").val(res[3]);
                        $("#svo_company_id").val(res[4]);
                        
                    }
                });
            }
         }

        function IsNumeric(e,display) {
                var specialKeys = new Array();
                var keyCode = e.which ? e.which : e.keyCode
                var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
                document.getElementById(display).style.display = ret ? "none" : "inline";
                return ret;
            }
    </script>

</body>
 
</html>