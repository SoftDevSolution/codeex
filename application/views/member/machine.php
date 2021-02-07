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

    <title>Inventory | <? echo $data->nameweb; ?></title>

    <!-- production version, optimized for size and speed -->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

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
                <!-- ============================================================== -->
                <!-- pagehader  -->
                <!-- ============================================================== -->
                <div class="row">

                    <div class="col-xl-12 col-12">
                        <? $this->load->view("member/flashsweet"); ?>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                        <div class="section-block" id="basicform">
                            <h3 class="section-title">Inventory (<? echo number_format($count_inventory,0); ?>) &nbsp;
                            <a href="<? echo base_url(); ?>member/machine/add_machine"><button class="btn btn-sm btn-success"><i class="fas fa-plus-circle"></i> Add New Inventory</button></a>
                            </h3>
                        </div>
                        <div class="card">
                            <div class="card-body">
                        <div class="table-responsive-lg">
                        <? if($count_inventory==0){ ?>
                            <div class="empty_data"> <center> No inventory. </center> </div>
                        <? } else { ?>
                        <table class="table table-striped" id="dataTableMachine">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Machine Type</th>
                            <th scope="col">Machine S/N</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Supplier Inv. No.</th>
                            <th scope="col">Factory Inv No.</th>
                            <th scope="col">Warranty from Supplier (year)</th>
                            <th scope="col">Warranty from Factory (year)</th>
                            <th scope="col"><center>Manage</center></th>
                            </tr>
                        </thead>
                        <tbody>
                        <? foreach ($query_inventory as $key => $mach) { ?>
                            <th scope="row"><? echo $key+1; ?></th>
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
                            <? echo $mach->machine_serial_no; ?></td>
                            <td>
        <?
            $query_brand = $this->db->where("brand_id",$mach->brand_id)
                                    ->get("tbl_brand")->result();
                            foreach ($query_brand as $bbb) {
                                $brand_name = $bbb->brand_name;
                            }
        ?>
                            <? echo $brand_name; ?></td>
                            <td><? echo $mach->machine_sup_inv_no; ?></td>
                            <td><? echo $mach->machine_company_inv_no; ?></td>
                            <td><? echo $mach->machine_warranty_year; ?></td>
                            <td><? echo $mach->machine_warranty_comp_year; ?></td>
                            <td>
<center>
    <a href="<? echo base_url(); ?>member/machine/edit_machine/<? echo $mach->machine_id; ?>"><span class="text-dark"><i class="fas fa-edit"></i></span></a>
    &nbsp;
    <a href="<? echo base_url(); ?>member/machine/remove_machine/<? echo $mach->machine_id; ?>" onclick="return confirm('Verify to Delete?');"><span class="text-danger"><i class="fas fa-trash"></i></span></a>
</center>
                            </td>
                            </tr>
                        <? } ?>
                        </tbody>
                        </table>
                        <? } ?>
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
            $('#dataTableMachine').DataTable();
        });
    </script>

</body>
 
</html>