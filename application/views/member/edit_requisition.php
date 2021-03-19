<?
    foreach ($setting_web as $data) {  }
    foreach ($query_requisition as $ccc) {  }
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

    <title>Edit Requisition</title>
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
                <div class="form-group col-md-3">
                    <label for="rqs_date">Date <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="rqs_date" name="rqs_date" value="<? echo $ccc->rqs_date; ?>" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="emp_id">Employee <span class="text-danger">*</span></label>
                    <select class="form-control" name="emp_id" id="emp_id">
                    <? foreach ($query_emp as $eee) { ?>
                        <option value="<? echo $eee->emp_id; ?>" <? if($eee->emp_id==$ccc->emp_id){ echo "selected"; } else {  } ?>><? echo $eee->emp_name; ?></option>
                        <? } ?>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="company_id">ชื่อบริษัทลูกค้า <span class="text-danger">*</span></label>
                    <select class="form-control" name="company_id" id="company_id" required>
                    <? foreach ($query_company_customer as $qc) { ?>
                        <option value="<? echo $qc->com_cus_id; ?>" <? if($qc->com_cus_id==$ccc->company_id){ echo "selected"; } else {  } ?>><? echo $qc->com_cus_name; ?></option>
                        <? } ?>
                    </select>
                    
                </div>
                <div class="form-group col-md-3">
                    <label for="vs_id">Customer Contact <span class="text-danger">*</span></label>
                    <select class="form-control" name="vs_id" id="vs_id">
                    <? foreach ($query_visit_customer as $bbb) { ?>
                        <option value="<? echo $bbb->vs_id; ?>" <? if($bbb->vs_id==$ccc->vs_id){ echo "selected"; } else {  } ?>><? echo $bbb->vs_name; ?></option>
                        <? } ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="machine_serial_no">S/N <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="machine_serial_no" name="machine_serial_no" placeholder="S/N" value="<? echo $ccc->machine_serial_no; ?>" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="model_id">Machine Model <span class="text-danger">*</span></label>
                    <select class="form-control" id="model_id" name="model_id" required>
                        <option value="<? echo $ccc->model_id; ?>">
                        <? $query_model_id = $this->db->where("model_id",$ccc->model_id)->get("tbl_model")->result();  
                            foreach ($query_model_id as $mm) {
                                echo $mm->model_name;
                            }
                        ?>
                        </option>
                    </select>
                </div>
                <div class="form-group col-md-12">
                    <label for="rqs_remark">Note/Remark</label>
                    <textarea class="form-control" name="rqs_remark" id="rqs_remark" placeholder="Note/Remark"><? echo $ccc->rqs_remark; ?></textarea>
                </div>
            </div>

            <center>
            <hr>
        <input type="hidden" name="rqs_id" id="rqs_id" value="<? echo $this->uri->segment(4); ?>">
            <button type="submit" class="btn btn-primary">Save Data</button> &nbsp;&nbsp;
            <button type="reset" class="btn btn-warning">Reset</button>&nbsp;&nbsp;
            <a href="<? echo base_url(); ?>member/requisition"><button type="button" class="btn btn-danger">Back to Requisition </button></a>
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
        $('#machine_serial_no').keyup(function() {
            var query = $('#machine_serial_no').val();
            if (query.length > 0) {
                $.ajax({
                    url: "<? echo base_url(); ?>member/requisition/get_machine_data",
                    method: "POST",
                    data: {
                        query : query
                    },
                    success: function(data) {
                        $('#model_id').html(data);
                    }
                })
            }
        });

    });
    </script>

</body>
 
</html>