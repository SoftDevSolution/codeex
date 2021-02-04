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

    <title>Edit Factory Customer Data</title>

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
                            <h3 class="section-title">Edit Factory Customer Data</h3>
                            <hr>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<? echo base_url(); ?>member/factory_customer" class="breadcrumb-link">Factory Customer Data</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Factory Customer Data</li>
                            </ol>
                        </div>
                        <div class="col-xl-12 col-12">
                            <? $this->load->view("member/flashsweet"); ?>
                        </div>

                        <div class="card">
                            <div class="card-body">

                            <?
                                    foreach ($get_data_company_customer as $mach) {
                                        
                                    }
                                ?>

        <!-- <form action="<? echo base_url(); ?>member/add_new_company" method="POST"> -->
        <form action="<? echo base_url(); ?>member/factory_customer/data_edit_factory_customer" method="POST"  enctype="multipart/form-data">
        <div class="row">    
            <div class="form-row col-md-6">
                <div class="form-group col-md-12">
                    <label for="company_name">Factory Customer Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Factory Name" value="<? echo $mach->com_cus_name; ?>" required>
                </div>
                <div class="form-group col-md-12">
                    <label for="company_addr1">Address 1</label>
                    <textarea class="form-control" name="company_addr1" id="company_addr1" placeholder="Address 1" ><? echo htmlspecialchars($mach->com_cus_addr1); ?></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="company_addr2">Address 2</label>
                    <textarea class="form-control" name="company_addr2" id="company_addr2" placeholder="Address 2" ><? echo htmlspecialchars($mach->com_cus_addr2); ?></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="company_city">Address 3</label>
                    <textarea class="form-control" name="company_addr3" id="company_addr3" placeholder="Address 3" ><? echo htmlspecialchars($mach->com_cus_addr3); ?></textarea>
                </div>
                <div class="form-group col-md-4">
                    <label for="company_city">City</label>
                    <input type="text" class="form-control" id="company_city" name="company_city" placeholder="City" value="<? echo $mach->com_cus_city; ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="company_zip_code">ZipCode</label>
                    <input type="number" min="0" value="0" class="form-control" id="company_zip_code" name="company_zip_code" placeholder="ZipCode" value="<? echo $mach->com_cus_zipcode; ?>" onkeypress="return IsNumeric(event,'myZipcode');">
                    <span id="myZipcode" style="color: Red; display: none">* Please enter number (0 - 9)</span>
                </div>
                <div class="form-group col-md-4">
                    <label for="company_tel">Tel.</label>
                    <input type="text" class="form-control" id="company_tel" name="company_tel" placeholder="Tel" value="<? echo $mach->com_cus_tel; ?>" onkeypress="return IsNumeric(event,'myTel');">
                    <span id="myTel" style="color: Red; display: none">* Please enter number (0 - 9)</span>
                </div>
                 
                <div class="form-group col-md-6">
                    <label for="company_fax">Fax</label>
                    <input type="text" class="form-control" id="company_fax" name="company_fax" placeholder="Fax" value="<? echo $mach->com_cus_fax; ?>" onkeypress="return IsNumeric(event,'myFax');">
                    <span id="myFax" style="color: Red; display: none">* Please enter number (0 - 9)</span>
                </div>
                <div class="form-group col-md-6">
                    <label for="company_capital_investment">Capital Investment</label>
                    <input type="text" class="form-control" id="company_capital_investment" name="company_capital_investment" placeholder="Capital Investment" value="<? echo $mach->com_cus_cap_invest; ?>" onkeypress="return IsNumeric(event,'cap_invest');">
                    <span id="cap_invest" style="color: Red; display: none">* Please enter number (0 - 9)</span>
                </div>


                <div class="form-group col-md-6">
                    <label for="company_email">Email</label>
                    <input type="text" class="form-control" id="company_email" name="company_email" placeholder="Email" value="<? echo $mach->com_cus_email; ?>">
                </div>
                <div class="form-group col-md-6">
                        <label for="company_bussiness_group">Bussiness Group</label>
                        <select class="form-control" name="company_bussiness_group" id="company_bussiness_group">
                                <option value="">--Select--</option>
                                <? foreach ($query_factory_group as $factory) { ?>
                                <option value="<? echo $factory->id_factory_group; ?>" <? if($factory->id_factory_group==$mach->com_cus_group_bussiness){ ?>selected<? } else {  } ?>><? echo $factory->name_factory_group; ?></option>
                                <? } ?>
                        </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="product_type">Product Type</label>
                    
                    <select class="form-control" name="product_type" id="product_type">
                            <option value="">--Select--</option>
                            <? foreach ($query_product_type as $products) { ?>
                            <option value="<? echo $products->product_type_id; ?>" <? if($products->product_type_id==$mach->com_cus_product_type){ ?>selected<? } else {  } ?>><? echo $products->product_type_name; ?></option>
                            <? } ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="company_status">Status</label>
                    <select class="form-control" name="company_status" id="company_status">
                        <option value="">-- Select --</option>
                        <option value="Customer" <? if($mach->com_cus_status=="Customer"){ ?>selected<? } else {  } ?>>Customer</option>
                        <option value="Suspect" <? if($mach->com_cus_status=="Suspect"){ ?>selected<? } else {  } ?>>Suspect</option>
                        <option value="Propect" <? if($mach->com_cus_status=="Propect"){ ?>selected<? } else {  } ?>>Propect</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="company_area">Area</label>
                    <select class="form-control" name="company_area" id="company_area">
                        <option value="">-- Select --</option>
                        <? foreach ($query_area as $area) { ?>
                        <option value="<? echo $area->id_area; ?>" <? if($area->id_area==$mach->com_cus_area){ ?>selected<? } else {  } ?>><? echo $area->area_name; ?></option>
                        <? } ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="company_indust">Industrial Estate</label>
                    <select class="form-control" name="company_indust" id="company_indust">
                        <option value="">-- Select --</option>
                        <? foreach ($query_industrial_estate as $estate) { ?>
                        <option value="<? echo $estate->id_industrial_estate; ?>" <? if($estate->id_industrial_estate==$mach->com_cus_indust){ ?>selected<? } else {  } ?>><? echo $estate->name_industrial_estate; ?></option>
                        <? } ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="company_www">Website</label>
                    <input type="text" class="form-control" id="company_www" name="company_www" placeholder="URL Website" value="<? echo $mach->com_cus_www; ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="company_facebook">Facebook</label>
                    <input type="text" class="form-control" id="company_facebook" name="company_facebook" placeholder="URL Facebook" value="<? echo $mach->com_cus_facebook; ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="company_distance_office">Distance from Office</label>
                    <input type="number" min="0" value="0" class="form-control" id="company_distance_office" name="company_distance_office" placeholder="Distance" value="<? echo $mach->com_cus_distance_office; ?>" onkeypress="return IsNumeric(event,'distance');">
                    <span id="distance" style="color: Red; display: none">* Please enter number (0 - 9)</span>
                </div>
                <div class="form-group col-md-6">
                    <label for="company_googlemap_link">Google Maps Link</label>
                    <input type="text" class="form-control" id="company_googlemap_link" name="company_googlemap_link" placeholder="Google Maps Link" value="<? echo $mach->com_cus_googlemap_link; ?>">
                </div>
                <div class="form-group col-md-12">
                    <label for="company_remark">Note/Remark </label>
                    <textarea class="form-control" name="company_remark" id="company_remark" placeholder="Note" ><? echo htmlspecialchars($mach->com_cus_remark); ?></textarea>
                </div>
                
            </div>

            <div class="form-row col-md-6">
            

               

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <label for="company_remark">Customer</label>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive-lg">
                                <? 
                                    if(empty($count_customer) or $count_customer==0){
                                ?>
                                    <div align="center" style="padding: 65px 20px;"> No Data. </div>
                                <? } else { ?>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Customer Name</th>
                                            <th scope="col">Mobile Phone</th>
                                            </tr>
                                        </thead>
                                        <tbody id="showmydata">
                                <? 
                                    foreach ($query_customer as $key => $area) {
                                        
                                ?>
                                            <tr>
                                            <th scope="row"><? echo $area->vs_id; ?></th>
                                            <td><? echo $area->vs_name; ?></td>
                                            <td><? echo $area->vs_mobile_phone; ?></td>
                                            </tr>
                                <? } ?>

                                        </tbody>
                                    </table>
                                <? } ?>
                                </div>
                            </div>

                        </div>

                        <div class="form-group col-md-12">
                            <center>    
                                <button type="button" class="btn btn-primary"><a href="<? echo base_url(); ?>member/visitor_customer" class="text-white">Add Customer</a></button> 
                            </center>
                        </div>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <label for="company_remark">Inventory</label>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive-lg">
                                <? 
                                    if(empty($count_area) or $count_area==0){
                                ?>
                                    <div align="center" style="padding: 65px 20px;"> No Data. </div>
                                <? } else { ?>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Machine Type</th>
                                            <th scope="col">Process</th>
                                            </tr>
                                        </thead>
                                        <tbody id="showmydata">
                                <? 
                                    foreach ($data_area as $key => $area) {
                                        
                                ?>
                                            <tr>
                                            <th scope="row"><? echo $key+1; ?></th>
                                            <td><? echo $area->area_name; ?></td>
                                            <td>
                                            <a href="<? echo base_url(); ?>member/config_area/edit_area/<? echo $area->id_area; ?>" class="text-dark"><i class="fas fa-edit"></i></a>
                                            &nbsp;
                                            <a href="<? echo base_url(); ?>member/config_area/delete_area/<? echo $area->id_area; ?>" class="text-danger" onclick="return confirm('Comfirm Delete?');"><i class="fas fa-trash"></i></a>
                                            </td>
                                            </tr>
                                <? } ?>

                                        </tbody>
                                    </table>
                                <? } ?>
                                </div>
                            </div>
                            

                        </div>
                        <div class="form-group col-md-12">
                            <center>    
                                <button type="button" class="btn btn-primary"><a href="<? echo base_url(); ?>member/inventory" class="text-white">Add Inventory</a></button> 
                            </center>
                        </div>
                    </div>
            
                
                </div> 

        </div>
            <center>
            <hr>
            <input type="hidden" name="company_id" value="<? echo $mach->com_cus_id; ?>">
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