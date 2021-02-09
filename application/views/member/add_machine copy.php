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

    <title>Add New Inventory | <? echo $data->nameweb; ?></title>
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
                            <h3 class="section-title">Add New Inventory</h3>
                            <hr>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<? echo base_url(); ?>member/machine" class="breadcrumb-link">Inventory</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add New Inventory</li>
                        </ol>
                        </div>
                        <div class="card">
                            <div class="card-body">
        <form action="<? echo base_url(); ?>member/machine/data_add_machine" method="POST">
                <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="rqs_id">Reference ID <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="rqs_id" name="rqs_id" placeholder="Reference ID" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="rtc_pn">P/N</label>
                    <input type="text" class="form-control" id="rtc_pn" name="rtc_pn" placeholder="P/N">
                    
                </div>
                <div class="form-group col-md-6">
                <label for="vs_name">Visitor Supplier <span class="text-danger">*</span></label>
                <input type="text" name="vs_name" id="vs_name" class="form-control input-lg" placeholder="Search..." required />
                    <ul class="list-group"></ul>
                    <div id="localSearchSimple"></div>
                </div>
                <div class="form-group col-md-6">
                    <label for="vs_company">Factory Supplier <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="vs_company" name="vs_company" required readonly>
                </div>

                <div class="form-group col-12">&nbsp; <hr></div>

</div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="machine_type_id">Machine Type <span class="text-danger">*</span></label>
                    <select class="form-control" name="machine_type_id" id="machine_type_id" required>
                        <option value="">-- Select --</option>
                        <? foreach ($query_machine_type as $mtype) { ?>
                        <option value="<? echo $mtype->machine_type_id; ?>"><? echo $mtype->machine_type_name; ?></option>
                        <? } ?>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="model_id">Machine Model</label>
                    <select class="form-control" name="model_id" id="model_id">
                        <option value="">-- Select --</option>
                        <? foreach ($query_machine_model as $machine) { ?>
                        <option value="<? echo $machine->model_id; ?>"><? echo $machine->model_name; ?></option>
                        <? } ?>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="machine_status">Machine Status</label>
                    <input type="text" class="form-control" id="machine_status" name="machine_status" placeholder="Machine Status">
                </div>
                <div class="form-group col-md-6">
                    <label for="machine_serial_no">Machine S/N</label>
                    <input type="text" class="form-control" id="machine_serial_no" name="machine_serial_no" placeholder="Machine S/N">
                </div>
                <div class="form-group col-md-6">
                    <label for="brand_id">Brand</label>
                    <select class="form-control" name="brand_id" id="brand_id">
                        <option value="">-- Select --</option>
                        <? foreach ($query_machine_brand as $brand) { ?>
                        <option value="<? echo $brand->brand_id; ?>"><? echo $brand->brand_name; ?></option>
                        <? } ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="machine_price">Price</label>
                    <input type="number" class="form-control" id="machine_price" name="machine_price" placeholder="Price" value="0" onkeypress="return IsNumeric(event,'price');">
                    <span id="price" style="color: Red; display: none">* Please enter number (0 - 9)</span>
                </div>
                <div class="form-group col-md-6">
                    <label for="machine_stock">Quantity</label>
                    <input type="number" class="form-control" id="machine_stock" name="machine_stock" placeholder="Quantity" value="0" onkeypress="return IsNumeric(event,'stock');">
                    <span id="stock" style="color: Red; display: none">* Please enter number (0 - 9)</span>
                </div>
                <div class="form-group col-md-6">
                    <label for="machine_sup_inv_no">Supplier Inv. No.</label>
                    <input type="text" class="form-control" id="machine_sup_inv_no" name="machine_sup_inv_no" placeholder="Supplier Inv. No.">
                </div>
                <div class="form-group col-md-6">
                    <label for="machine_sup_inv_date">Supplier Inv. Date</label>
                    <input type="date" class="form-control" id="machine_sup_inv_date" name="machine_sup_inv_date" placeholder="Date" value="<? echo date("Y-m-d"); ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="machine_warranty_start_date">Warranty from Supplier ( Date Start)</label>
                    <input type="date" class="form-control" id="machine_warranty_start_date" name="machine_warranty_start_date" value="<? echo date("Y-m-d"); ?>" placeholder="Warranty from Supplier ( Date Start)" onchange="cal_warranty();">
                </div>
                <div class="form-group col-md-4">
                    <label for="machine_warranty_stop_date">Warranty from Supplier ( Date Stop)</label>
                    <input type="date" class="form-control" id="machine_warranty_stop_date" name="machine_warranty_stop_date" value="<? echo date("Y-m-d"); ?>" placeholder="Warranty from Supplier ( Date Stop)" onchange="cal_warranty();">
                </div>
                <div class="form-group col-md-4">
                    <label for="machine_warranty_year">Warranty from Supplier ( Year )</label>
                    <input type="number" max="4" class="form-control" id="machine_warranty_year" name="machine_warranty_year" placeholder="Year" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="machine_company_inv_no">Factory Inv No.</label>
                    <input type="text" class="form-control" id="machine_company_inv_no" name="machine_company_inv_no" placeholder="Supplier Inv. No.">
                </div>
                <div class="form-group col-md-6">
                    <label for="machine_company_inv_date">Factory Inv Date</label>
                    <input type="date" class="form-control" id="machine_company_inv_date" name="machine_company_inv_date" value="<? echo date("Y-m-d"); ?>" placeholder="Date">
                </div>
                <div class="form-group col-md-4">
                    <label for="machine_warranty_comp_start_date">Warranty from Factory ( Date Start )</label>
                    <input type="date" class="form-control" id="machine_warranty_comp_start_date" name="machine_warranty_comp_start_date" value="<? echo date("Y-m-d"); ?>" placeholder="Warranty from Company ( Date Start)" onchange="cal_warranty_company();">
                </div>
                <div class="form-group col-md-4">
                    <label for="machine_warranty_comp_stop_date">Warranty from Factory ( Date Stop )</label>
                    <input type="date" class="form-control" id="machine_warranty_comp_stop_date" name="machine_warranty_comp_stop_date" value="<? echo date("Y-m-d"); ?>" placeholder="Warranty from Company ( Date Stop )" onchange="cal_warranty_company();">
                </div>
                <div class="form-group col-md-4">
                    <label for="machine_warranty_comp_year">Warranty from Factory ( Year )</label>
                    <input type="text" class="form-control" id="machine_warranty_comp_year" name="machine_warranty_comp_year" placeholder="Year" readonly>
                </div>
            </div>

            <center>
            <hr>
            <button type="submit" class="btn btn-primary">Save</button> &nbsp;&nbsp;
            <button type="reset" class="btn btn-warning">Reset</button>
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

<script>
$(document).ready(function(){
 $('#vs_name').keyup(function(){
  var query = $('#vs_name').val();
  $('#detail').html('');
  $('.list-group').css('display', 'block');
  if(query.length > 0)
  {
   $.ajax({
    url:"<? echo base_url(); ?>member/machine/get_visitor_supplier",
    method:"POST",
    data:{query : query},
    success:function(data)
    {
     $('.list-group').html(data);
    }
   })
  }
  if(query.length == 0)
  {
   $('.list-group').css('display', 'none');
  }
 });

 $(document).on('click', '.gsearch', function(){
  var vs_company = $(this).text();
  $('#vs_name').val(vs_company);
  $('.list-group').css('display', 'none');
  $.ajax({
   url:"<? echo base_url(); ?>member/machine/get_vs_company_visitor_supplier",
   method:"POST",
   data:{vs_company : vs_company},
   success:function(data)
   {
    $('#vs_company').val(data);
   }
  })
 });
});
</script>

</body>
 
</html>