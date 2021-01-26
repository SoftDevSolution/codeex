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

    <title>Add New Customers | <? echo $data->nameweb; ?></title>
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
                            <h3 class="section-title">Add New Customers</h3>
                            <hr>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<? echo base_url(); ?>member/customers" class="breadcrumb-link">Customers</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add New Customers</li>
                        </ol>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
        <form action="<? echo base_url(); ?>member/customers/add_data_customer" method="POST" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="cus_name">Contact Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="cus_name" name="cus_name" placeholder="Contact Name" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="cus_mobile_phone">Mobile Phone</label>
                    <input type="text" class="form-control" id="cus_mobile_phone" name="cus_mobile_phone" placeholder="Mobile Phone">
                </div>
                <div class="form-group col-md-5">
                    <label for="cus_email">Email</label>
                    <input type="text" class="form-control" id="cus_email" name="cus_email" placeholder="Email">
                </div>
                <div class="form-group col-md-4">
                    <label for="cus_birth_date">BirthDay</label>
                    <input type="date" class="form-control" id="cus_birth_date" name="cus_birth_date">
                </div>
                <div class="form-group col-md-4">
                    <label for="cus_pic_path">Picture</label>
                    <input type="file" class="form-control" id="cus_pic_path" name="cus_pic_path">
                </div>
                <div class="form-group col-md-4">
                    <label for="company_id">Factory</label>
                    <input type="text" class="form-control" id="company_id" name="company_id" placeholder="Factory ID">
                </div>
                <div class="form-group col-md-12">
                    <label for="cus_remark">Note/Remark</label>
                    <textarea class="form-control" name="cus_remark" id="cus_remark" placeholder="Note/Remark"></textarea>
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