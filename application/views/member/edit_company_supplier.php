<!doctype html>
<html lang="en">

 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <? $this->load->view("member/script_css"); ?>

    <title>Edit Company Supplier Data</title>

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
                            <h3 class="section-title">Edit Company Supplier Data</h3>
                            <hr>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<? echo base_url(); ?>member/company_supplier" class="breadcrumb-link">Company Supplier Data</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Company Supplier Data</li>
                            </ol>
                        </div>
                        <div class="col-xl-12 col-12">
                            <? $this->load->view("member/flashsweet"); ?>
                        </div>

                        <div class="card">
                            <div class="card-body">

                            <?
                                    foreach ($get_data_company_supplier as $mach) {
                                        
                                    }
                                ?>

        <!-- <form action="<? echo base_url(); ?>member/add_new_company" method="POST"> -->
        <form action="<? echo base_url(); ?>member/company_supplier/edit_data_company_supplier" method="POST"  enctype="multipart/form-data">
            <div class="form-group">
                <label for="company_name">Company Supplier Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Company Name" value="<? echo $mach->com_sup_name; ?>" required>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="company_addr1">Address 1</label>
                    <textarea class="form-control" name="company_addr1" id="company_addr1" placeholder="Address 1" ><? echo htmlspecialchars($mach->com_sup_addr1); ?></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="company_addr2">Address 2</label>
                    <textarea class="form-control" name="company_addr2" id="company_addr2" placeholder="Address 2" ><? echo htmlspecialchars($mach->com_sup_addr2); ?></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="company_city">Address 3</label>
                    <textarea class="form-control" name="company_addr3" id="company_addr3" placeholder="Address 3" ><? echo htmlspecialchars($mach->com_sup_addr3); ?></textarea>
                </div>
                <div class="form-group col-md-4">
                    <label for="company_city">City</label>
                    <input type="text" class="form-control" id="company_city" name="company_city" placeholder="City" value="<? echo $mach->com_sup_city; ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="company_zip_code">ZipCode</label>
                    <input type="number" min="0" value="0" class="form-control" id="company_zip_code" name="company_zip_code" placeholder="ZipCode" value="<? echo $mach->com_sup_zipcode; ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="company_tel">Tel.</label>
                    <input type="text" class="form-control" id="company_tel" name="company_tel" placeholder="Tel" value="<? echo $mach->com_sup_tel; ?>">
                </div>
                 
                <div class="form-group col-md-6">
                    <label for="company_fax">Fax</label>
                    <input type="text" class="form-control" id="company_fax" name="company_fax" placeholder="Fax" value="<? echo $mach->com_sup_fax; ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="company_capital_investment">Capital Investment</label>
                    <input type="text" class="form-control" id="company_capital_investment" name="company_capital_investment" placeholder="Capital Investment" value="<? echo $mach->com_sup_cap_invest; ?>">
                </div>


                <div class="form-group col-md-6">
                    <label for="company_email">Email</label>
                    <input type="text" class="form-control" id="company_email" name="company_email" placeholder="Email" value="<? echo $mach->com_sup_email; ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="company_bussiness_group">Bussiness Group</label>
                    <input type="text" class="form-control" id="company_bussiness_group" name="company_bussiness_group" placeholder="Bussiness Group" value="<? echo $mach->com_sup_group_bussiness; ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="product_type">Product Type</label>
                    <input type="text" class="form-control" id="product_type" name="product_type" placeholder="Product Type" value="<? echo $mach->com_sup_product_type; ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="company_status">Status</label>
                    <select class="form-control" name="company_status" id="company_status">
                        <option value="">-- Select --</option>
                        <option value="Customer">Customer</option>
                        <option value="Suspect">Suspect</option>
                        <option value="Propect">Propect</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="company_area">Area</label>
                    <select class="form-control" name="company_area" id="company_area">
                        <option value="">-- Select --</option>
                        <option value="North">North</option>
                        <option value="East">East</option>
                        <option value="West">West</option>
                        <option value="South">South</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="company_indust">Industrial Estate</label>
                    <input type="text" class="form-control" id="company_indust" name="company_indust" placeholder="Industrial Estate" value="<? echo $mach->com_sup_indust; ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="company_www">Website</label>
                    <input type="text" class="form-control" id="company_www" name="company_www" placeholder="URL Website" value="<? echo $mach->com_sup_www; ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="company_facebook">Facebook</label>
                    <input type="text" class="form-control" id="company_facebook" name="company_facebook" placeholder="URL Facebook" value="<? echo $mach->com_sup_facebook; ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="company_distance_office">Distance from Office</label>
                    <input type="number" min="0" value="0" class="form-control" id="company_distance_office" name="company_distance_office" placeholder="Distance" value="<? echo $mach->com_sup_distance_office; ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="company_googlemap_link">Google Maps Link</label>
                    <input type="text" class="form-control" id="company_googlemap_link" name="company_googlemap_link" placeholder="Google Maps Link" value="<? echo $mach->com_sup_googlemap_link; ?>">
                </div>
                <div class="form-group col-md-12">
                    <label for="company_remark">Note/Remark </label>
                    <textarea class="form-control" name="company_remark" id="company_remark" placeholder="Note" ><? echo htmlspecialchars($mach->com_sup_remark); ?></textarea>
                </div>
                
            </div>


            <center>
            <hr>
            <input type="hidden" name="company_id" value="<? echo $mach->com_sup_id; ?>">
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