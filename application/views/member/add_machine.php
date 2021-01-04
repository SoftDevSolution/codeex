<!doctype html>
<html lang="en">

 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <? $this->load->view("member/script_css"); ?>

    <title>Add New Machine</title>
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
                            <h3 class="section-title">Add New Machine</h3>
                            <hr>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<? echo base_url(); ?>member/company" class="breadcrumb-link">Machine</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add New Machine</li>
                        </ol>
                        </div>
                        <div class="card">
                            <div
                                div class="card-body">
        <form action="<? echo base_url(); ?>member/add_data_machine" method="POST">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="machine_status">Machine Status <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="machine_status" name="machine_status" placeholder="Machine Status" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="machine_type">Machine Type</label>
                    <input type="text" class="form-control" id="machine_type" name="machine_type" placeholder="Type">
                </div>
                <div class="form-group col-md-4">
                    <label for="model_id">Machine Model</label>
                    <select class="form-control" name="model_id" id="model_id">
                        <option value="">-- Select --</option>
                        <option value="aaa">aaa</option>
                        <option value="bbb">bbb</option>
                        <option value="ccc">ccc</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="machine_serial_no">Machine S/N</label>
                    <input type="text" class="form-control" id="machine_serial_no" name="machine_serial_no" placeholder="Machine S/N">
                </div>
                <div class="form-group col-md-6">
                    <label for="brand_id">Brand</label>
                    <select class="form-control" name="brand_id" id="brand_id">
                        <option value="">-- Select --</option>
                        <option value="aaa">aaa</option>
                        <option value="bbb">bbb</option>
                        <option value="ccc">ccc</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="machine_sup_inv_no">Supplier Inv. No.</label>
                    <input type="text" class="form-control" id="machine_sup_inv_no" name="machine_sup_inv_no" placeholder="Supplier Inv. No.">
                </div>
                <div class="form-group col-md-6">
                    <label for="machine_sup_inv_date">Supplier Inv. Date</label>
                    <input type="date" class="form-control" id="machine_sup_inv_date" name="machine_sup_inv_date" placeholder="Date">
                </div>
                <div class="form-group col-md-4">
                    <label for="machine_warranty_year">Warranty from Supplier ( Year )</label>
                    <input type="text" class="form-control" id="machine_warranty_year" name="machine_warranty_year" placeholder="Year">
                </div>
                <div class="form-group col-md-4">
                    <label for="machine_warranty_start_date">Warranty from Supplier ( Date Start)</label>
                    <input type="date" class="form-control" id="machine_warranty_start_date" name="machine_warranty_start_date" placeholder="Warranty from Supplier ( Date Start)">
                </div>
                <div class="form-group col-md-4">
                    <label for="machine_warranty_stop_date">Warranty from Supplier ( Date Stop)</label>
                    <input type="date" class="form-control" id="machine_warranty_stop_date" name="machine_warranty_stop_date" placeholder="Warranty from Supplier ( Date Stop)">
                </div>
                <div class="form-group col-md-6">
                    <label for="machine_company_inv_no">Company Inv No.</label>
                    <input type="text" class="form-control" id="machine_company_inv_no" name="machine_company_inv_no" placeholder="Supplier Inv. No.">
                </div>
                <div class="form-group col-md-6">
                    <label for="machine_company_inv_date">Company Inv Date</label>
                    <input type="date" class="form-control" id="machine_company_inv_date" name="machine_company_inv_date" placeholder="Date">
                </div>
                <div class="form-group col-md-4">
                    <label for="machine_warranty_comp_year">Warranty from Company ( Year )</label>
                    <input type="text" class="form-control" id="machine_warranty_comp_year" name="machine_warranty_comp_year" placeholder="Year">
                </div>
                <div class="form-group col-md-4">
                    <label for="machine_warranty_comp_start_date">Warranty from Company ( Date Start )</label>
                    <input type="date" class="form-control" id="machine_warranty_comp_start_date" name="machine_warranty_comp_start_date" placeholder="Warranty from Company ( Date Start)">
                </div>
                <div class="form-group col-md-4">
                    <label for="machine_warranty_comp_stop_date">Warranty from Company ( Date Stop )</label>
                    <input type="date" class="form-control" id="machine_warranty_comp_stop_date" name="machine_warranty_comp_stop_date" placeholder="Warranty from Company ( Date Stop )">
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