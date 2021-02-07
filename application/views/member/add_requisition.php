<!doctype html>
<html lang="en">

 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <? $this->load->view("member/script_css"); ?>

    <title>Add New Requisition</title>
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
                            <h3 class="section-title">Add New Requisition</h3>
                            <hr>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<? echo base_url(); ?>member/requisition" class="breadcrumb-link">Requisition</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add New Requisition</li>
                        </ol>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
        <form action="<? echo base_url(); ?>member/add_requisition" method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="rqs_date">Date <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="rqs_date" name="rqs_date" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="emp_id">ดึง Employee ID มาใช้งาน <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="emp_id" name="emp_id" placeholder="Employee ID" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="rqs_pn">P/N</label>
                    <input type="text" class="form-control" id="rqs_pn" name="rqs_pn" placeholder="P/N">
                </div>
                <div class="form-group col-md-6">
                    <label for="rqs_name">ดึงจาก Visitor Customer <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="rqs_name" name="rqs_name" placeholder="Name" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="company_id">ดึงจาก Factory Name</label>
                    <input type="text" class="form-control" id="company_id" name="company_id" placeholder="Factory Name">
                    
                </div>
                <div class="form-group col-md-12">
                    <label for="supplier_remark">Note/Remark</label>
                    <textarea class="form-control" name="supplier_remark" id="supplier_remark" placeholder="Note/Remark"></textarea>
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