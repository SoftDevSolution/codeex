<!doctype html>
<html lang="en">

 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <? $this->load->view("member/script_css"); ?>

    <title>Add Return Certificate</title>
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
                            <h3 class="section-title">Add Return Certificate</h3>
                            <hr>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<? echo base_url(); ?>member/return_certificate" class="breadcrumb-link">Return Certificate</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Return Certificate</li>
                        </ol>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
        <form action="<? echo base_url(); ?>member/add_data_return_certificate" method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="rqs_id">Reference ID <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="rqs_id" name="rqs_id" placeholder="Reference ID">
                </div>
                <div class="form-group col-md-6">
                    <label for="rtc_pn">P/N <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="rtc_pn" name="rtc_pn" placeholder="P/N">
                </div>
                <div class="form-group col-md-6">
                    <label for="rtc_name">Name</label>
                    <input type="text" class="form-control" id="rtc_name" name="rtc_name" placeholder="Name">
                </div>
                <div class="form-group col-md-6">
                    <label for="rtc_sup_name">Supplier Name</label>
                    <input type="text" class="form-control" id="rtc_sup_name" name="rtc_sup_name" placeholder="Supplier Name">
                </div>
                <div class="form-group col-md-6">
                    <label for="rtc_note">Note/Remark</label>
                    <textarea class="form-control" name="rtc_note" id="rtc_note" placeholder="Note/Remark"></textarea>
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