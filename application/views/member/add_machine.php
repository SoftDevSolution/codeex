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

    <title>Refferal Invoice |
        <? echo $data->nameweb; ?>
    </title>

    <!-- Sweet Alert -->
    <script src="<? echo base_url(); ?>theme/sweetalert/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="<? echo base_url(); ?>theme/sweetalert/sweetalert2.min.css">
    <link href="<? echo base_url(); ?>theme/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />

</head>

<body>
    <div class="dashboard-main-wrapper">

        <? $this->load->view("member/navbar"); ?>

        <? $this->load->view("member/menusidebar"); ?>

        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="section-block" id="basicform">
                            <h3 class="section-title">Create Refferal Invoice</h3>
                            <hr>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<? echo base_url(); ?>member/machine" class="breadcrumb-link">Inventory</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Refferal Invoice</li>
                            </ol>
                        </div>
                        <div class="card">
                            <div class="card-body">

                                <? $this->load->view("member/flashsweet"); ?>

                                <form action="<? echo base_url(); ?>member/machine/data_add_invoice" method="POST">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="rqs_id">Reference ID <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="rqs_id" name="rqs_id" placeholder="Reference ID" autocomplete="off" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="rtc_pn">P/N</label>
                                            <input type="text" class="form-control" id="rtc_pn" name="rtc_pn" placeholder="P/N" autocomplete="off">

                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="vs_name">Visitor Supplier <span class="text-danger">*</span></label>
                                            <input type="text" name="vs_name" id="vs_name" class="form-control input-lg" placeholder="Search..." autocomplete="off" required />
                                            <ul class="list-group"></ul>
                                            <div id="localSearchSimple"></div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="vs_company">Factory Supplier <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="vs_company" name="vs_company" required readonly>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <center>
                                                <hr>
                                                <button type="submit" class="btn btn-primary">Save</button> &nbsp;&nbsp;
                                                <button type="reset" class="btn btn-warning">Reset</button>
                                            </center>
                                        </div>
                                </form>
                            </div>
                            <div class="form-group col-12">&nbsp;</div>
                        </div>

                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive-lg">
                                    <? if(empty($query_invoice)){ ?>

                                    <div class="empty_data"> No invoice.</div>

                                    <? } else { ?>
                                    <table class="table table-striped" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Reference ID</th>
                                                <th scope="col">P/N</th>
                                                <th scope="col">Visitor Supplier</th>
                                                <th scope="col">Manage</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <? foreach ($query_invoice as $key => $ddd) { ?>
                                            <tr>
                                                <th scope="row">
                                                    <? echo $key+1; ?>
                                                </th>
                                                <td>
                                                    <? echo $ddd->rqs_id; ?>
                                                </td>
                                                <td>
                                                    <? echo $ddd->rtc_pn; ?>
                                                </td>
                                                <td>
                                                    <? echo $ddd->vs_name; ?>
                                                </td>
                                                <td>
                                                    <center>
                                                    <a href="<? echo base_url(); ?>member/machine/add_machine_from_supplier/<? echo $ddd->id_invoice; ?>"><button class="btn btn-sm btn-success"><i
                                                                class="fas fa-plus-circle" title="Add invoice"></i>
                                                            Add
                                                            Inventory</button></a>
                                                    <a href="<? echo base_url(); ?>member/machine/delete_invoice/<? echo $ddd->id_invoice; ?>" onclick="return confirm('ยืนยันการลบ? Inventory จะถูกลบออกด้วย หากคุณลบ?');"><button class="btn btn-sm btn-danger">remove</button></a>
                                                    </center>
                                                </td>
                                            </tr>
                                            <? } ?>
                                        </tbody>
                                    </table>
                                    <? } ?>
                                </div>
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

    <script src="<? echo base_url(); ?>theme/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="<? echo base_url(); ?>theme/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>

    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>

    <script>
    function IsNumeric(e, display) {
        var specialKeys = new Array();
        var keyCode = e.which ? e.which : e.keyCode
        var ret = ((keyCode >= 46 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
        document.getElementById(display).style.display = ret ? "none" : "inline";
        return ret;
    }
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
