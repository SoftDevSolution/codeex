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
                            <h3 class="section-title">Add New Borrow Asset (<? echo number_format($count_borrow_asset,0); ?> Types)</h3>
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

                                <form action="<? echo base_url(); ?>member/borrow_asset/add_borrow_asset" method="POST" enctype="multipart/form-data">
                                    <div class="form-row">
                                                <div class="form-group col-12">
                                                    <label for="asset_id">Asset ID</label>
                                                    <input type="text" class="form-control" id="asset_id" name="asset_id" placeholder="Asset ID" required>
                                                </div>
                                                <div class="form-group col-12">
                                                    <label for="br_cause">สาเหตุที่ยืม</label>
                                                    <input type="text" class="form-control" id="br_cause" name="br_cause" placeholder="สาเหตุที่ยืม" >
                                                </div>
                                                <div class="form-group col-12">
                                                    <label for="br_work">ยืมเพื่องาน</label>
                                                    <input type="text" class="form-control" id="br_work" name="br_work" placeholder="ยืมเพื่องาน" >
                                                </div>

                                                <div class="form-group col-12">
                                                    <label for="br_detail">รายละเอียดการยืม</label>
                                                    <input type="text" class="form-control" id="br_detail" name="br_detail" placeholder="รายละเอียดการยืม" >
                                                </div>
                                                <div class="form-group col-12">
                                                    <label for="br_no">เลขใบสั่งซื้อ</label>
                                                    <input type="text" class="form-control" id="br_no" name="br_no" placeholder="เลขใบสั่งซื้อ" >
                                                </div>
                                                <div class="form-group col-12">
                                                    <label for="br_return_date">วันที่จะคืน</label>
                                                    <input type="date" class="form-control" id="br_return_date" name="br_return_date" placeholder="วันที่จะคืน" >
                                                </div>
                                                <div class="form-group col-12">
                                                    <label for="br_user">ผู้เบิก</label>
                                                    <input type="text" class="form-control" id="br_user" name="br_user" placeholder="ผู้เบิก" >
                                                </div>
                                                <div class="form-group col-12">
                                                    <label for="br_accept">ผู้อนุมัติ/ปล่อยของ</label>
                                                    <input type="text" class="form-control" id="br_accept" name="br_accept" placeholder="ผู้อนุมัติ/ปล่อยของ" >
                                                </div>
                                                <div class="form-group col-12">
                                                    <label for="br_date">วันที่ปล่อยของ</label>
                                                    <input type="date" class="form-control" id="br_date" name="br_date" placeholder="วันที่ปล่อยของ" >
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
                                            foreach ($data_borrow_asset as $key => $mach) {
                                                
                                                ?>
                                                            <tr>
                                                            <th scope="row"><? echo $key+1; ?></th>
                                                            <td><? echo $mach->asset_id; ?></td>
                                                            <td><? echo $mach->br_cause; ?></td>
                                                            <td><? echo $mach->br_work; ?></td>
                                                            <td><? echo $mach->br_date; ?></td>
                                                            <td><? echo $mach->br_return_date; ?></td>
                                                            <td>
                                                            <a href="<? echo base_url(); ?>member/borrow_asset/edit_borrow_asset/<? echo $mach->br_id; ?>" class="text-dark"><i class="fas fa-edit"></i></a>
                                                            &nbsp;
                                                            <a href="<? echo base_url(); ?>member/borrow_asset/delete_borrow_asset/<? echo $mach->br_id; ?>" class="text-danger" onclick="return confirm('Comfirm Delete?');"><i class="fas fa-trash"></i></a>
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