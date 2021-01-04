<!doctype html>
<html lang="en">

 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <? $this->load->view("member/script_css"); ?>

    <title>Add New Employees</title>
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
                            <h3 class="section-title">Add New Employees</h3>
                            <hr>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<? echo base_url(); ?>member/employees" class="breadcrumb-link">Employees</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add New Employees</li>
                        </ol>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
        <form action="<? echo base_url(); ?>member/add_employee" method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="emp_name">Fullname <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="emp_name" name="emp_name" placeholder="Machine Status" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="emp_username">Username <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="emp_username" name="emp_username" placeholder="Type">
                </div>
                <div class="form-group col-md-3">
                    <label for="emp_password">Password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="emp_password" name="emp_password" placeholder="Type">
                </div>
                <div class="form-group col-md-12">
                    <label for="emp_address">Address</label>
                    <textarea class="form-control" name="emp_address" id="emp_address" placeholder="Address"></textarea>
                </div>
                <div class="form-group col-md-4">
                    <label for="position_id">Position</label>
                    <select class="form-control" name="position_id" id="position_id">
                        <option value="">-- Select --</option>
                        <option value="position_id1">position_id1</option>
                        <option value="position_id2">position_id2</option>
                    </select>
                </div>
                
                <div class="form-group col-md-4">
                    <label for="emp_tel">Tel.</label>
                    <input type="text" class="form-control" id="emp_tel" name="emp_tel" placeholder="Tel">
                </div>
                <div class="form-group col-md-4">
                    <label for="emp_mobile_phone">Mobile Phone</label>
                    <input type="text" class="form-control" id="emp_mobile_phone" name="emp_mobile_phone" placeholder="Mobile Phone">
                </div>
                <div class="form-group col-md-6">
                    <label for="emp_personal_email">Personal Email</label>
                    <input type="text" class="form-control" id="emp_personal_email" name="emp_personal_email" placeholder="Mobile Phone">
                </div>
                <div class="form-group col-md-6">
                    <label for="emp_company_email">Company Email</label>
                    <input type="text" class="form-control" id="emp_company_email" name="emp_company_email" placeholder="Mobile Phone">
                </div>
                <div class="form-group col-md-3">
                    <label for="emp_birth_date">BirthDay</label>
                    <input type="date" class="form-control" id="emp_birth_date" name="emp_birth_date" placeholder="BirthDay">
                </div>
                <div class="form-group col-md-3">
                    <label for="emp_age">Age</label>
                    <input type="number" min="10" class="form-control" id="emp_age" name="emp_age" placeholder="Age">
                </div>
                <div class="form-group col-md-3">
                    <label for="emp_work_start_date">Work Start Date</label>
                    <input type="date" class="form-control" id="emp_work_start_date" name="emp_work_start_date" placeholder="Work Start Date">
                </div>
                <div class="form-group col-md-3">
                    <label for="emp_work_stop_date">Work Stop Date</label>
                    <input type="date" class="form-control" id="emp_work_stop_date" name="emp_work_stop_date" placeholder="Work Stop Date">
                </div>
                <div class="form-group col-md-3">
                    <label for="emp_sarary_start">Sarary Start</label>
                    <input type="number" min="1" class="form-control" id="emp_sarary_start" name="emp_sarary_start" placeholder="Sarary Start">
                </div>
                <div class="form-group col-md-3">
                    <label for="emp_sarary_now">Sarary Now</label>
                    <input type="number" min="1" class="form-control" id="emp_sarary_now" name="emp_sarary_now" placeholder="Sarary Now">
                </div>
                <div class="form-group col-md-6">
                    <label for="emp_pic_path">Picture</label>
                    <input type="file" class="form-control" id="emp_pic_path" name="emp_pic_path" placeholder="Picture">
                </div>
                <div class="form-group col-md-12">
                    <label for="emp_remark">Note/Remark</label>
                    <textarea class="form-control" name="emp_remark" id="emp_remark" placeholder="Note/Remark"></textarea>
                </div>
                <div class="form-group col-md-2">
                    <label for="emp_status">Status</label>
                    <!-- <input type="text" class="form-control" id="emp_status" name="emp_status" placeholder="Status"> -->
                    <select class="form-control" name="emp_status" id="emp_status">
                        <option value="">-- Select --</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Widow">Widow</option>
                        <option value="Etc.">Etc.</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="emp_blood_group">Blood Group</label>
                    <select class="form-control" name="emp_blood_group" id="emp_blood_group">
                        <option value="">-- Select --</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="AB">AB</option>
                        <option value="O">O</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="emp_gender">Gender</label>
                    <select class="form-control" name="emp_gender" id="emp_gender">
                        <option value="">-- Select --</option>
                        <option value="Man">Man</option>
                        <option value="Women">Woman</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="emp_height">Height</label>
                    <input type="number" min="1" class="form-control" id="emp_height" name="emp_height" placeholder="Height">
                </div>
                <div class="form-group col-md-3">
                    <label for="emp_weight">Weight</label>
                    <input type="number" min="1" class="form-control" id="emp_weight" name="emp_weight" placeholder="Weight">
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