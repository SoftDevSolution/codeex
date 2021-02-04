<? 
    foreach ($setting_web as $data) {  }
    foreach ($query_employee as $emp) {  }
?>
<!doctype html>
<html lang="en">

 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <? $this->load->view("member/script_css"); ?>

    <title>Edit Employee | <? echo $data->nameweb; ?></title>
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
                            <h3 class="section-title">Edit Employee</h3>
                            <hr>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<? echo base_url(); ?>member/employees" class="breadcrumb-link">Employees</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Employee</li>
                        </ol>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
        <form action="<? echo base_url(); ?>member/employees/data_edit_employee" method="POST" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="emp_name">Fullname <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="emp_name" name="emp_name" placeholder="Fullname" value="<? echo $emp->emp_name; ?>" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="emp_username">Username <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="emp_username" name="emp_username" placeholder="Username" value="<? echo $emp->emp_username; ?>" readonly>
                </div>
                <div class="form-group col-md-3">
                    <label for="emp_password">Old Password</label>
                    <input type="text" class="form-control" value="<? echo base64_decode($emp->emp_password);?>" disabled>
                </div>
                <div class="form-group col-md-3">
                    <label for="emp_password">Set New Password</label>
                    <input type="text" class="form-control" id="emp_password" name="emp_password" placeholder="Password">
                </div>
                <div class="form-group col-md-12">
                    <label for="emp_address">Address</label>
                    <textarea class="form-control" name="emp_address" id="emp_address" placeholder="Address"> <? echo $emp->emp_address; ?></textarea>
                </div>
                <div class="form-group col-md-4">
                    <label for="position_id">Position</label>
                    <select class="form-control" name="position_id" id="position_id">
                    <?
                        // ดึงข้อมูล Position ID มาใช้งาน
                        $query_position_id = $this->db->order_by("position_id","desc")
                                                ->get("tbl_position")->result();
                            foreach ($query_position_id as $pos) {
                    ?>
                        <option value="<? echo $pos->position_id; ?>" <? if($emp->position_id==$pos->position_id){ ?>selected<? } else {  } ?>><? echo $pos->position_name; ?></option>
                    <? } ?>
                    </select>
                </div>
                
                <div class="form-group col-md-4">
                    <label for="emp_tel">Tel.</label>
                    <input type="text" class="form-control" id="emp_tel" name="emp_tel" placeholder="Tel" value="<? echo $emp->emp_tel; ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="emp_mobile_phone">Mobile Phone <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="emp_mobile_phone" name="emp_mobile_phone" placeholder="Mobile Phone" value="<? echo $emp->emp_mobile_phone; ?>" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="emp_personal_email">Personal Email</label>
                    <input type="text" class="form-control" id="emp_personal_email" name="emp_personal_email" placeholder="Personal Email" value="<? echo $emp->emp_personal_email; ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="emp_company_email">Company Email</label>
                    <input type="text" class="form-control" id="emp_company_email" name="emp_company_email" placeholder="Company Email" value="<? echo $emp->emp_company_email; ?>">
                </div>
                <div class="form-group col-md-3">
                    <label for="emp_birth_date">BirthDay</label>
                    <input type="date" class="form-control" id="emp_birth_date" name="emp_birth_date" placeholder="BirthDay" value="<? echo $emp->emp_birth_date; ?>">
                </div>
                <div class="form-group col-md-3">
                    <label for="emp_age">Age</label>
                    <input type="number" min="10" class="form-control" id="emp_age" name="emp_age" placeholder="Age" value="<? echo $emp->emp_age; ?>">
                </div>
                <div class="form-group col-md-3">
                    <label for="emp_work_start_date">Work Start Date</label>
                    <input type="date" class="form-control" id="emp_work_start_date" name="emp_work_start_date" placeholder="Work Start Date" value="<? echo $emp->emp_work_start_date; ?>">
                </div>
                <div class="form-group col-md-3">
                    <label for="emp_work_stop_date">Work Stop Date</label>
                    <input type="date" class="form-control" id="emp_work_stop_date" name="emp_work_stop_date" placeholder="Work Stop Date" value="<? echo $emp->emp_work_stop_date; ?>">
                </div>
                <div class="form-group col-md-3">
                    <label for="emp_sarary_start">Sarary Start</label>
                    <input type="number" min="1" class="form-control" id="emp_sarary_start" name="emp_sarary_start" placeholder="Sarary Start" value="<? echo $emp->emp_sarary_start; ?>">
                </div>
                <div class="form-group col-md-3">
                    <label for="emp_sarary_now">Sarary Now</label>
                    <input type="number" min="1" class="form-control" id="emp_sarary_now" name="emp_sarary_now" placeholder="Sarary Now" value="<? echo $emp->emp_sarary_now; ?>">
                </div>
                <div class="form-group col-md-3">
                    <label for="emp_pic_path">Picture</label>
                    <center><a href="<? echo base_url(); ?>theme/photo_employees_thumbnail/<? echo $emp->emp_pic_path; ?>" target="_blank"><img src="<? echo base_url(); ?>theme/photo_employees_thumbnail/<? echo $emp->emp_pic_path; ?>" alt="<? echo $emp->emp_pic_path; ?>" style="max-width: 120px;"></a></center>
                </div>
                <div class="form-group col-md-3">
                    <label for="emp_pic_path">Change Picture</label>
                    <input type="file" class="form-control" id="emp_pic_path" name="emp_pic_path" placeholder="Picture">
                </div>
                <div class="form-group col-md-12">
                    <label for="emp_remark">Note/Remark</label>
                    <textarea class="form-control" name="emp_remark" id="emp_remark" placeholder="Note/Remark"><? echo $emp->emp_remark; ?></textarea>
                </div>
                <div class="form-group col-md-2">
                    <label for="emp_status">Status</label>
                    <!-- <input type="text" class="form-control" id="emp_status" name="emp_status" placeholder="Status"> -->
                    <select class="form-control" name="emp_status" id="emp_status">
                        <option value="" <? if($emp->emp_status=="Single"){ echo "selected"; } else {  } ?>>-- Select --</option>
                        <option value="Single" <? if($emp->emp_status=="Single"){ echo "selected"; } else {  } ?>>Single</option>
                        <option value="Married" <? if($emp->emp_status=="Married"){ echo "selected"; } else {  } ?>>Married</option>
                        <option value="Widow" <? if($emp->emp_status=="Widow"){ echo "selected"; } else {  } ?>>Widow</option>
                        <option value="Etc." <? if($emp->emp_status=="Etc."){ echo "selected"; } else {  } ?>>Etc.</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="emp_blood_group">Blood Group</label>
                    <select class="form-control" name="emp_blood_group" id="emp_blood_group">
                        <option value="" <? if($emp->emp_blood_group==""){ echo "selected"; } else {  } ?>>-- Select --</option>
                        <option value="A" <? if($emp->emp_blood_group=="A"){ echo "selected"; } else {  } ?>>A</option>
                        <option value="B" <? if($emp->emp_blood_group=="B"){ echo "selected"; } else {  } ?>>B</option>
                        <option value="AB" <? if($emp->emp_blood_group=="AB"){ echo "selected"; } else {  } ?>>AB</option>
                        <option value="O" <? if($emp->emp_blood_group=="O"){ echo "selected"; } else {  } ?>>O</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="emp_gender">Gender</label>
                    <select class="form-control" name="emp_gender" id="emp_gender">
                        <option value="" <? if($emp->emp_gender==""){ echo "selected"; } else {  } ?>>-- Select --</option>
                        <option value="Man" <? if($emp->emp_gender=="Man"){ echo "selected"; } else {  } ?>>Man</option>
                        <option value="Women" <? if($emp->emp_gender=="Women"){ echo "selected"; } else {  } ?>>Woman</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="emp_height">Height</label>
                    <input type="number" min="1" class="form-control" id="emp_height" name="emp_height" placeholder="Height" value="<? echo $emp->emp_height; ?>">
                </div>
                <div class="form-group col-md-3">
                    <label for="emp_weight">Weight</label>
                    <input type="number" min="1" class="form-control" id="emp_weight" name="emp_weight" placeholder="Weight" value="<? echo $emp->emp_weight; ?>">
                </div>
            </div>

            <center>
            <hr>
            <input type="hidden" name="emp_id" value="<? echo $emp->emp_id; ?>">
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