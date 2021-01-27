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

    <title>Borrow Asset | <? echo $data->nameweb; ?></title>

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
                            <h3 class="section-title">Add New Borrow Asset (<? echo number_format($count_machine_position,0); ?> Types)</h3>
                            <hr>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<? echo base_url(); ?>member/machine" class="breadcrumb-link">Machine</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add New Borrow Asset</li>
                        </ol>
                        </div>
                    </div>

                    <div class="col-xl-12 col-12">
                        <? $this->load->view("member/flashsweet"); ?>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">

                                <form action="<? echo base_url(); ?>member/config_machine_position/add_config_machine_position" method="POST" enctype="multipart/form-data">
                                    <div class="form-row">

                                    <!--ยืมเพื่อ
                                            เพื่องาน 
                                            รายละเอียดการยืม
                                            เลขใบสั่งซื้อ
                                            วันที่จะคืน
                                            ผู้เบิก
                                            ผู้อนุมัติ/ปล่อยของ
                                            วันที่ปล่อยของ
                                                
                                                name
                                                address
                                                com_sup_name
                                                position_name
                                                branch_name
                                                tel_1
                                                tel_2
                                                tel_main
                                                mobile_phone
                                                email_com
                                                email_personal

                                                -->

                                        <div class="form-group col-12">
                                            <label for="name">Asset ID</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Asset ID" required>
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="address">สาเหตุที่ยืม</label>
                                            <input type="text" class="form-control" id="address" name="address" placeholder="สาเหตุที่ยืม" required>
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="com_sup_name">ยืมเพื่องาน</label>
                                            <input type="text" class="form-control" id="com_sup_name" name="com_sup_name" placeholder="ยืมเพื่องาน" required>
                                        </div>

                                        <div class="form-group col-12">
                                            <label for="position_name">รายละเอียดการยืม</label>
                                            <input type="text" class="form-control" id="position_name" name="position_name" placeholder="รายละเอียดการยืม" required>
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="branch_name">เลขใบสั่งซื้อ</label>
                                            <input type="text" class="form-control" id="branch_name" name="branch_name" placeholder="เลขใบสั่งซื้อ" required>
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="tel_1">วันที่จะคืน</label>
                                            <input type="text" class="form-control" id="tel_1" name="tel_1" placeholder="วันที่จะคืน" required>
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="tel_2">ผู้เบิก</label>
                                            <input type="text" class="form-control" id="tel_2" name="tel_2" placeholder="ผู้เบิก" required>
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="tel_main">ผู้อนุมัติ/ปล่อยของ</label>
                                            <input type="text" class="form-control" id="tel_main" name="tel_main" placeholder="ผู้อนุมัติ/ปล่อยของ" required>
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="mobile_phone">วันที่ปล่อยของ</label>
                                            <input type="text" class="form-control" id="mobile_phone" name="mobile_phone" placeholder="วันที่ปล่อยของ" required>
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
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Asset ID</th>
                                            <th scope="col">สาเหตุที่ยืม</th>
                                            <th scope="col">ยืมเพื่องาน</th>
                                            <th scope="col">วันที่ปล่อยของ</th>
                                            <th scope="col">วันที่จะคืน</th>
                                            <th scope="col">Process</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <? 
                                            foreach ($data_machine_position as $key => $mach) {
                                                
                                                ?>
                                                            <tr>
                                                            <th scope="row"><? echo $key+1; ?></th>
                                                            <td><? echo $mach->position_name; ?></td>
                                                            <td><? echo $mach->position_name; ?></td>
                                                            <td><? echo $mach->position_name; ?></td>
                                                            <td><? echo $mach->position_name; ?></td>
                                                            <td><? echo $mach->position_name; ?></td>
                                                            <td>
                                                            <a href="<? echo base_url(); ?>member/config_machine_position/edit_machine_position/<? echo $mach->position_id; ?>" class="text-dark"><i class="fas fa-edit"></i></a>
                                                            &nbsp;
                                                            <a href="<? echo base_url(); ?>member/config_machine_position/delete_machine_position/<? echo $mach->position_id; ?>" class="text-danger" onclick="return confirm('Comfirm Delete?');"><i class="fas fa-trash"></i></a>
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

</body>
 
</html>