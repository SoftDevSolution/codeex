<? 
    foreach ($setting_web as $data) {  }
    $id_invoice = $this->uri->segment(4);
    $query_invoice = $this->db->where("id_invoice",$id_invoice)
                        ->get("tbl_invoice")->result();
            foreach ($query_invoice as $aaa) {
                
            }
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

    <title>Add Inventory |
        <? echo $data->nameweb; ?>
    </title>
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

                        <? $this->load->view("member/flashsweet"); ?>

                        <div class="section-block" id="basicform">
                            <h3 class="section-title">Add New Inventory</h3>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <h4>Inventory data</h4>
                                        <hr>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="rqs_id">Reference ID : </label>
                                        <span class="text-primary">
                                            <? echo $aaa->rqs_id; ?>
                                        </span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="rtc_pn">P/N : </label>
                                        <span class="text-primary">
                                            <? echo $aaa->rtc_pn; ?>
                                        </span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="vs_name">Visitor Supplier : </label>
                                        <span class="text-primary">
                                            <? echo $aaa->vs_name; ?>
                                        </span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="vs_company">Factory Supplier : </label>
                                        <span class="text-primary">
                                            <? echo $aaa->vs_company; ?>
                                        </span>
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
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group col-12">
                                    <h4 class="text-primary">
                                        Inventory from invoice.
                                    </h4>
                                    <span class="text-primary">
                                        Total :
                                        <? echo number_format($count_inventory,0); ?> items.
                                    </span>
                                </div>

                                <? if(empty($query_inventory)){ ?>

                                <div align="center" class="empty_data"> No invoice. </div>

                                <? } else { ?>
                                <div class="table-responsive-lg">
                                    <table class="table table-striped" id="dataTable_inventory">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Machine Type</th>
                                                <th scope="col">Machine S/N</th>
                                                <th scope="col">Brand</th>
                                                <th scope="col">Supplier Inv. No.</th>
                                                <th scope="col">Factory Inv No.</th>
                                                <th scope="col">Warranty from Supplier (Days)</th>
                                                <th scope="col">Warranty from Factory (Days)</th>
                                                <th scope="col">
                                                    <center>Manage</center>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <? foreach ($query_inventory as $key => $mach) { ?>
                                            <th scope="row">
                                                <? echo $key+1; ?>
                                            </th>
                                            <td>
                                                <? 
            $query_machine_type = $this->db->where("machine_type_id",$mach->machine_type_id)
                                    ->get("tbl_machine_type")->result();
                            foreach ($query_machine_type as $aaa) {
                                $machine_type_name = $aaa->machine_type_name;
                            }
        ?>
                                                <? echo $machine_type_name; ?>
                                            </td>
                                            <td>
                                                <? echo $mach->machine_serial_no; ?>
                                            </td>
                                            <td>
                                                <?
            $query_brand = $this->db->where("brand_id",$mach->brand_id)
                                    ->get("tbl_brand")->result();
                            foreach ($query_brand as $bbb) {
                                $brand_name = $bbb->brand_name;
                            }
        ?>
                                                <? echo $brand_name; ?>
                                            </td>
                                            <td>
                                                <? echo $mach->machine_sup_inv_no; ?>
                                            </td>
                                            <td>
                                                <? echo $mach->machine_company_inv_no; ?>
                                            </td>
                                            <td>
                                                <? echo $mach->machine_warranty_year; ?>
                                            </td>
                                            <td>
                                                <? echo $mach->machine_warranty_comp_year; ?>
                                            </td>
                                            <td>
                                                <center>
                                                    <a href="<? echo base_url(); ?>member/machine/edit_machine/<? echo $mach->machine_id; ?>"><span class="text-dark"><i
                                                                class="fas fa-edit"></i></span></a>
                                                    &nbsp;
                                                    <a href="<? echo base_url(); ?>member/machine/remove_machine/<? echo $mach->machine_id; ?>" onclick="return confirm('Verify to Delete?');"><span
                                                            class="text-danger"><i class="fas fa-trash"></i></span></a>
                                                </center>
                                            </td>
                                            </tr>
                                            <? } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <? } ?>
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
    function IsNumeric(e, display) {
        var specialKeys = new Array();
        var keyCode = e.which ? e.which : e.keyCode
        var ret = ((keyCode >= 46 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
        document.getElementById(display).style.display = ret ? "none" : "inline";
        return ret;
    }

    $(document).ready(function() {
        $('#dataTable_inventory').DataTable();
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
