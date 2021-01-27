<? 
    foreach ($setting_web as $data) {  }
    foreach ($query_supplier as $cus) {  }
?>
<!doctype html>
<html lang="en">

 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <? $this->load->view("member/script_css"); ?>

    <title>Edit Supplier | <? echo $data->nameweb; ?></title>
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
                            <h3 class="section-title">Edit Supplier</h3>
                            <hr>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<? echo base_url(); ?>member/supplier" class="breadcrumb-link">Customers</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Supplier</li>
                        </ol>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
        <form action="<? echo base_url(); ?>member/supplier/edit_data_supplier" method="POST" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="supplier_name">Contact Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="supplier_name" name="supplier_name" placeholder="Contact Name" value="<? echo $cus->supplier_name; ?>" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="supplier_mobile_phone">Mobile Phone</label>
                    <input type="text" class="form-control" id="supplier_mobile_phone" name="supplier_mobile_phone" placeholder="Mobile Phone" value="<? echo $cus->supplier_mobile_phone; ?>">
                </div>
                <div class="form-group col-md-5">
                    <label for="supplier_email">Email</label>
                    <input type="text" class="form-control" id="supplier_email" name="supplier_email" placeholder="Email" value="<? echo $cus->supplier_email; ?>">
                </div>
              
                <div class="form-group col-md-3">
                    <label for="supplier_birth_date">BirthDay</label>
                    <input type="date" class="form-control" id="supplier_birth_date" name="supplier_birth_date" value="<? echo $cus->supplier_birth_date; ?>">
                </div>


                <div class="form-group col-md-3">
                    <label for="supplier_pic_path">Old Picture</label>
                    <center><img class="img_thumnail" src="<? echo base_url(); ?>theme/photosupplierthumbnail/<? echo $cus->supplier_pic_path; ?>" alt="<? echo $cus->supplier_name; ?>"></center>
                </div>
                <div class="form-group col-md-3">
                    <label for="supplier_pic_path">Picture</label>
                    <input type="file" class="form-control" id="supplier_pic_path" name="supplier_pic_path">
                </div>
               
                <div class="form-group col-md-6">
                    <label for="supplier_posion">Supplier Position</label>
                    <input type="number" class="form-control" id="supplier_posion" name="supplier_posion" placeholder="Company" value="<? echo $cus->supplier_posion; ?>">
                </div>

                <div class="form-group col-md-6">
                    <label for="com_sup_id">Supplier Company</label>
                    <input type="number" class="form-control" id="com_sup_id" name="com_sup_id" placeholder="Company" value="<? echo $cus->com_sup_id; ?>">
                </div>


                <div class="form-group col-md-12">
                    <label for="supplier_remark">Note/Remark</label>
                    <textarea class="form-control" name="supplier_remark" id="supplier_remark" placeholder="Note/Remark"><? echo $cus->supplier_remark; ?></textarea>
                </div>
            </div>

            <center>
            <hr>
            <input type="hidden" name="supplier_id" value="<? echo $cus->supplier_id; ?>">
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