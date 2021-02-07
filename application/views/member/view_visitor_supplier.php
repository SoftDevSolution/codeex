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

    <title>Visitor | <? echo $data->nameweb; ?></title>

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
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="section-block" id="basicform">
                            <h3 class="section-title">Add New Visitor Supplier (<? echo number_format($count_visitor_supplier,0); ?> Types)</h3>
                            <hr>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<? echo base_url(); ?>member/machine" class="breadcrumb-link">Machine</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add New Visitor Supplier</li>
                        </ol>
                        </div>
                    </div>

                    <div class="col-xl-12 col-12">
                        <? $this->load->view("member/flashsweet"); ?>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">

                                <form action="<? echo base_url(); ?>member/visitor_supplier/add_data_visitor_supplier" method="POST" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <label for="vs_name">ชื่อ นามสกุล</label>
                                            <input type="text" class="form-control" id="vs_name" name="vs_name" placeholder="ชื่อ นามสกุล" required>
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="vs_address">ที่อยู่ปัจจุบัน</label>
                                            <input type="text" class="form-control" id="vs_address" name="vs_address" placeholder="ที่อยู่ปัจจุบัน" >
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="vs_company">ชื่อบริษัทลูกค้า</label>
                                            <input type="text" class="form-control" id="vs_company" name="vs_company" placeholder="ชื่อบริษัทลูกค้า" >
                                        </div>

                                        <div class="form-group col-12">
                                            <label for="vs_position">ตำแหน่ง</label>
                                            <input type="text" class="form-control" id="vs_position" name="vs_position" placeholder="ตำแหน่ง" >
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="vs_branch">แผนก</label>
                                            <input type="text" class="form-control" id="vs_branch" name="vs_branch" placeholder="แผนก" >
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="vs_tel_1">Tel.1</label>
                                            <input type="text" class="form-control" id="vs_tel_1" name="vs_tel_1" placeholder="Tel.1" >
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="vs_tel_2">Tel.2</label>
                                            <input type="text" class="form-control" id="vs_tel_2" name="vs_tel_2" placeholder="Tel.2" >
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="vs_tel_main">เบอร์ติดต่อหลัก</label>
                                            <input type="text" class="form-control" id="vs_tel_main" name="vs_tel_main" placeholder="เบอร์ติดต่อหลัก" >
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="vs_mobile_phone">Mobile Phone</label>
                                            <input type="text" class="form-control" id="vs_mobile_phone" name="vs_mobile_phone" placeholder="Mobile Phone" >
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="vs_email">Email</label>
                                            <input type="text" class="form-control" id="vs_email" name="vs_email" placeholder="Email" >
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="vs_email_personal">Personel Email</label>
                                            <input type="text" class="form-control" id="vs_email_personal" name="vs_email_personal" placeholder="Personel Email" >
                                        </div>

                                        <div class="form-group col-md-12">
                                                <label for="com_sup_id">Factory Supplier</label>
                                                <select class="form-control" name="com_sup_id" id="com_sup_id">
                                                        <option value="">--Select--</option>
                                                        <? foreach ($data_factory_supplier as $factory) { ?>
                                                        <option value="<? echo $factory->com_sup_id; ?>"><? echo $factory->com_sup_name; ?></option>
                                                        <? } ?>
                                                </select>
                                            
                                        </div>
                                   
                                    </div>

                                    <center>
                                    <hr>
                                    <button type="submit" class="btn btn-primary">Save</button> &nbsp;&nbsp;
                                    <button type="reset" class="btn btn-warning">Reset</button>
                                    </center>
                                </form>

                            </div>

                        </div>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive-lg">
                                    <table class="table table-striped" id="dataTable">
                                        <thead>
                                            <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">ชื่อ นามสกุล</th>
                                            <th scope="col">ชื่อบริษัทลูกค้า</th>
                                            <th scope="col">เบอร์ติดต่อหลัก</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Process</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <? 
                                            foreach ($data_visitor_supplier as $key => $mach) {
                                                
                                                ?>
                                                            <tr>
                                                            <th scope="row"><? echo $mach->vs_id;; ?></th>
                                                            <td><? echo $mach->vs_name; ?></td>
                                                            <td><? echo $mach->vs_company; ?></td>
                                                            <td><? echo $mach->vs_tel_main; ?></td>
                                                            <td><? echo $mach->vs_email; ?></td>
                                                            <td>
                                                            <a href="<? echo base_url(); ?>member/visitor_supplier/edit_visitor_supplier/<? echo $mach->vs_id; ?>" class="text-dark"><i class="fas fa-edit"></i></a>
                                                            &nbsp;
                                                            <a href="<? echo base_url(); ?>member/visitor_supplier/delete_data_visitor_supplier/<? echo $mach->vs_id; ?>" class="text-danger" onclick="return confirm('Comfirm Delete?');"><i class="fas fa-trash"></i></a>
                                                            </td>
                                                            </tr>
                                                <? } ?>
                                        </tbody>
                                    </table>
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

</body>
 
</html>