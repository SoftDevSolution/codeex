<?
    foreach ($setting_web as $data) {  }
    foreach ($query_requisition as $requisition) {  }
?>
<!doctype html>
<html lang="en">

 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <? $this->load->view("member/script_css"); ?>

    <!-- Sweet Alert -->
    <script src="<? echo base_url(); ?>theme/sweetalert/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="<? echo base_url(); ?>theme/sweetalert/sweetalert2.min.css">
    <link href="<? echo base_url(); ?>theme/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />

    <title>Edit Requisition | <? echo $data->nameweb; ?></title>
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
                            <h3 class="section-title">Edit Requisition</h3>
                            <hr>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<? echo base_url(); ?>member/requisition" class="breadcrumb-link">Requisition</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Requisition</li>
                        </ol>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
        <form action="<? echo base_url(); ?>member/requisition/data_edit_requisition" method="POST">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="rqs_date">Date <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="rqs_date" name="rqs_date" value="<? echo $requisition->rqs_date; ?>" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="emp_id">Employee <span class="text-danger">*</span></label>
                    <select class="form-control" name="emp_id" id="emp_id">
                    <? foreach ($query_emp as $eee) { ?>
                        <option value="<? echo $eee->emp_id; ?>" <? if($requisition->emp_id==$eee->emp_id){ echo "selected"; } else { } ?>><? echo $eee->emp_name; ?></option>
                        <? } ?>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="rqs_pn">P/N</label>
                    <input type="text" class="form-control" id="rqs_pn" name="rqs_pn" placeholder="P/N" value="<? echo $requisition->rqs_pn; ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="vs_id">Visitor Customer <span class="text-danger">*</span></label>
                    <select class="form-control" name="vs_id" id="vs_id">
                    <? foreach ($query_visit_customer as $bbb) { ?>
                        <option value="<? echo $bbb->vs_id; ?>" <? if($requisition->vs_id==$bbb->vs_id){ echo "selected"; } else { } ?>><? echo $bbb->vs_name; ?></option>
                        <? } ?>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="company_id">Factory Name</label>
                    <select class="form-control" name="company_id" id="company_id">
                    <? foreach ($query_factory_customer as $ccc) { ?>
                        <option value="<? echo $ccc->com_cus_id; ?>" <? if($requisition->company_id==$ccc->com_cus_id){ echo "selected"; } else { } ?>><? echo $ccc->com_cus_name; ?></option>
                        <? } ?>
                    </select>
                    
                </div>
                <div class="form-group col-md-4">
                    <label for="rqs_status">Status</label>
                    <input type="text" class="form-control" id="rqs_status" name="rqs_status" value="<? echo $requisition->rqs_status; ?>" readonly>
                    
                </div>
                <div class="form-group col-md-12">
                    <label for="rqs_remark">Note/Remark</label>
                    <textarea class="form-control" name="rqs_remark" id="rqs_remark" placeholder="Note/Remark"><? echo $requisition->rqs_remark; ?></textarea>
                </div>
            </div>

            <center>
            <hr>
            <input type="hidden" name="rqs_id" value="<? echo $requisition->rqs_id; ?>">
            <button type="submit" class="btn btn-primary">Edit Requisition</button> &nbsp;&nbsp;
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

    <script src="<? echo base_url(); ?>theme/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="<? echo base_url(); ?>theme/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>

    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>

    <script>
    $(document).ready(function() {
        $('#vs_name').keyup(function() {
            var query = $('#vs_name').val();
            $('#detail').html('');
            $('.list-group').css('display', 'block');
            if (query.length > 0) {
                $.ajax({
                    url: "<? echo base_url(); ?>member/machine/get_visitor_supplier",
                    method: "POST",
                    data: {
                        query: query
                    },
                    success: function(data) {
                        $('.list-group').html(data);
                    }
                })
            }
            if (query.length == 0) {
                $('.list-group').css('display', 'none');
            }
        });

        $(document).on('click', '.gsearch', function() {
            var vs_company = $(this).text();
            $('#vs_name').val(vs_company);
            $('.list-group').css('display', 'none');
            $.ajax({
                url: "<? echo base_url(); ?>member/machine/get_vs_company_visitor_supplier",
                method: "POST",
                data: {
                    vs_company: vs_company
                },
                success: function(data) {
                    $('#vs_company').val(data);
                }
            })
        });
    });
    </script>

</body>
 
</html>