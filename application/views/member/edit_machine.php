<? 
    foreach ($setting_web as $data) {  }
    foreach ($query_inventory as $invent) {  }
?>
<!doctype html>
<html lang="en">

 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <? $this->load->view("member/script_css"); ?>

    <title>Edit Machine | <? echo $data->nameweb; ?></title>
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
                            <h3 class="section-title">Edit Machine</h3>
                            <hr>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<? echo base_url(); ?>member/machine" class="breadcrumb-link">Machine</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Machine</li>
                        </ol>
                        </div>
                        <div class="card">
                            <div class="card-body">
        <form action="<? echo base_url(); ?>member/machine/data_edit_machine" method="POST">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="machine_type_id">Machine Type <span class="text-danger">*</span></label>
                    <select class="form-control" name="machine_type_id" id="machine_type_id" required>
                        <option value="">-- Select --</option>
                        <? foreach ($query_machine_type as $mtype) { ?>
                        <option value="<? echo $mtype->machine_type_id; ?>" <? if($invent->machine_type_id==$mtype->machine_type_id){ echo "selected"; } else {  } ?>><? echo $mtype->machine_type_name; ?></option>
                        <? } ?>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="model_id">Machine Model</label>
                    <select class="form-control" name="model_id" id="model_id">
                        <option value="">-- Select --</option>
                        <? foreach ($query_machine_model as $machine) { ?>
                        <option value="<? echo $machine->model_id; ?>" <? if($invent->model_id==$machine->model_id){ echo "selected"; } else {  } ?>><? echo $machine->model_name; ?></option>
                        <? } ?>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="machine_status">Machine Status</label>
                    <input type="text" class="form-control" id="machine_status" name="machine_status" placeholder="Machine Status" value="<? echo $invent->machine_status; ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="machine_serial_no">Machine S/N</label>
                    <input type="text" class="form-control" id="machine_serial_no" name="machine_serial_no" placeholder="Machine S/N" value="<? echo $invent->machine_serial_no; ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="brand_id">Brand</label>
                    <select class="form-control" name="brand_id" id="brand_id">
                        <option value="">-- Select --</option>
                        <? foreach ($query_machine_brand as $brand) { ?>
                        <option value="<? echo $brand->brand_id; ?>" <? if($invent->brand_id==$brand->brand_id){ echo "selected"; } else {  } ?>><? echo $brand->brand_name; ?></option>
                        <? } ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="machine_price">Machine Price</label>
                    <input type="number" class="form-control" id="machine_price" name="machine_price" placeholder="Machine Price" value="<? echo $invent->machine_price; ?>" onkeypress="return IsNumeric(event,'price');">
                    <span id="price" style="color: Red; display: none">* Please enter number (0 - 9)</span>
                </div>
                <div class="form-group col-md-6">
                    <label for="machine_stock">Machine Stock</label>
                    <input type="number" class="form-control" id="machine_stock" name="machine_stock" placeholder="Machine Stock" value="<? echo $invent->machine_stock; ?>" onkeypress="return IsNumeric(event,'stock');">
                    <span id="stock" style="color: Red; display: none">* Please enter number (0 - 9)</span>
                </div>
                <div class="form-group col-md-6">
                    <label for="machine_sup_inv_no">Supplier Inv. No.</label>
                    <input type="text" class="form-control" id="machine_sup_inv_no" name="machine_sup_inv_no" placeholder="Supplier Inv. No." value="<? echo $invent->machine_sup_inv_no; ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="machine_sup_inv_date">Supplier Inv. Date</label>
                    <input type="date" class="form-control" id="machine_sup_inv_date" name="machine_sup_inv_date" placeholder="Date" value="<? echo $invent->machine_sup_inv_date; ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="machine_warranty_start_date">Warranty from Supplier ( Date Start)</label>
                    <input type="date" class="form-control" id="machine_warranty_start_date" name="machine_warranty_start_date" placeholder="Warranty from Supplier ( Date Start)" onchange="cal_warranty();" value="<? echo $invent->machine_warranty_start_date; ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="machine_warranty_stop_date">Warranty from Supplier ( Date Stop)</label>
                    <input type="date" class="form-control" id="machine_warranty_stop_date" name="machine_warranty_stop_date" placeholder="Warranty from Supplier ( Date Stop)" onchange="cal_warranty();" value="<? echo $invent->machine_warranty_stop_date; ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="machine_warranty_year">Warranty from Supplier ( Year )</label>
                    <input type="number" max="4" class="form-control" id="machine_warranty_year" name="machine_warranty_year" placeholder="Year" value="<? echo $invent->machine_warranty_year; ?>" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="machine_company_inv_no">Factory Inv No.</label>
                    <input type="text" class="form-control" id="machine_company_inv_no" name="machine_company_inv_no" placeholder="Supplier Inv. No." value="<? echo $invent->machine_company_inv_no; ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="machine_company_inv_date">Factory Inv Date</label>
                    <input type="date" class="form-control" id="machine_company_inv_date" name="machine_company_inv_date" placeholder="Date" value="<? echo $invent->machine_company_inv_date; ?>">
                </div>
                <div class="form-group col-md-3">
                    <label for="machine_warranty_comp_start_date">Warranty from Factory ( Date Start )</label>
                    <input type="date" class="form-control" id="machine_warranty_comp_start_date" name="machine_warranty_comp_start_date" placeholder="Warranty from Company ( Date Start)" onchange="cal_warranty_company();" value="<? echo $invent->machine_warranty_comp_start_date; ?>">
                </div>
                <div class="form-group col-md-3">
                    <label for="machine_warranty_comp_stop_date">Warranty from Factory ( Date Stop )</label>
                    <input type="date" class="form-control" id="machine_warranty_comp_stop_date" name="machine_warranty_comp_stop_date" placeholder="Warranty from Company ( Date Stop )" onchange="cal_warranty_company();" value="<? echo $invent->machine_warranty_comp_stop_date; ?>">
                </div>
                <div class="form-group col-md-3">
                    <label for="machine_warranty_comp_year">Warranty from Factory ( Year )</label>
                    <input type="text" class="form-control" id="machine_warranty_comp_year" name="machine_warranty_comp_year" placeholder="Year" value="<? echo $invent->machine_warranty_comp_year; ?>" readonly>
                </div>
                <div class="form-group col-md-3">
                    <label for="status_machine">Status <span class="text-danger">(Used or not.)</span></label>
                    <input type="text" class="form-control" id="status_machine" name="status_machine" placeholder="Year" value="<? echo $invent->status_machine; ?>" readonly>
                </div>
                
            </div>

            <center>
            <hr>
            <input type="hidden" name="machine_id" value="<? echo $invent->machine_id; ?>">
            <button type="submit" class="btn btn-primary">Edit</button> &nbsp;&nbsp;
            <button type="reset" class="btn btn-warning">Reset</button> &nbsp;&nbsp;
            <a href="<? echo base_url(); ?>member/machine" class="breadcrumb-link"><button type="button" class="btn btn-danger">Back</button></a>
            </center>
        </form>
        
        <script>
            function cal_warranty()
            {
                console.log("Run cal_warranty.");
                if($('#machine_warranty_start_date').val() != "" && $('#machine_warranty_stop_date').val() != "")
                {
                    var dateStart = new Date($("#machine_warranty_start_date").val());
                    var dateEnd =  new Date($("#machine_warranty_stop_date").val())
                    var timeDiff = Math.abs(dateEnd.getTime() - dateStart.getTime());
                    
                    var diffDays = Math.ceil(timeDiff / (1000 * 60 * 60 * 24 * 365.25));
                    $("#machine_warranty_year").val(diffDays);
                }
            }

            function cal_warranty_company()
            {
                console.log("Run cal_warranty.");
                if($('#machine_warranty_comp_start_date').val() != "" && $('#machine_warranty_comp_stop_date').val() != "")
                {
                    var dateStart = new Date($("#machine_warranty_comp_start_date").val());
                    var dateEnd =  new Date($("#machine_warranty_comp_stop_date").val())
                    var timeDiff = Math.abs(dateEnd.getTime() - dateStart.getTime());
                    
                    var diffDays = Math.ceil(timeDiff / (1000 * 60 * 60 * 24 * 365.25)); 
                    $("#machine_warranty_comp_year").val(diffDays);
                }
            }
        </script>
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
            var ret = ((keyCode >= 46 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
            document.getElementById(display).style.display = ret ? "none" : "inline";
            return ret;
        }
</script>

</body>
 
</html>