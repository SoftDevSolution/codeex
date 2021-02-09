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

    <title>Add Inventory | <? echo $data->nameweb; ?></title>
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
                <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="rqs_id">Reference ID <span class="text-danger">*</span></label>
                    <? echo $rqs_id; ?>
                </div>
                <div class="form-group col-md-6">
                    <label for="rtc_pn">P/N</label>
                    <? echo $rtc_pn; ?>
                    
                </div>
                <div class="form-group col-md-6">
                <label for="vs_name">Visitor Supplier <span class="text-danger">*</span></label>
                    <? echo $vs_name; ?>
                </div>
                <div class="form-group col-md-6">
                    <label for="vs_company">Factory Supplier <span class="text-danger">*</span></label>
                    <? echo $vs_company; ?>
                </div>

                <div class="form-group col-12">&nbsp;</div>

                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <? $this->load->view("member/form_machine"); ?>
                                <div class="form-group col-12">&nbsp;</div>
                            </div>
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