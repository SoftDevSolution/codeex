<!doctype html>
<html lang="en">

 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <? $this->load->view("member/script_css"); ?>

    <title>Assets</title>
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
                            <h3 class="section-title">Assets
                            <a href="<? echo base_url(); ?>member/assets/add_asset"><button class="btn btn-sm btn-success"><i class="fas fa-plus-circle"></i> Add New Asset</button></a>
                            </h3>
                        </div>
                        <div class="card">
                            <div class="card-body">
                        <div class="table-responsive-lg">
                        <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Description</th>
                            <th scope="col">สภาพทรัพย์สิน</th>
                            <th scope="col">สถานที่จัดเก็บ</th>
                            <th scope="col">จำนวน</th>
                            <th scope="col">เลขที่เอกสาร</th>
                            <th scope="col">จำนวนคงเหลือในระบบ</th>
                            <th scope="col">ตรวจนับสต็อคจริง</th>
                            <th scope="col">ผู้ตรวจนับ</th>
                            <th scope="col">Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?
                            foreach ($query_assets as $key => $cus) {
                        ?>
                            <tr id="row_<? echo $cus->asset_id; ?>">
                            <th scope="row"><? echo $cus->asset_id; ?></th>
                            <td><? echo $cus->asset_desc; ?></td>
                            <td><? echo $cus->asset_condition; ?></td>
                            <td><? echo $cus->asset_storage_location; ?></td>
                            <td><? echo $cus->asset_amount; ?></td>
                            <td><? echo $cus->asset_doc_no; ?></td>
                            <td><? echo $cus->asset_balance; ?></td>
                            <td><? echo $cus->asset_real_stock; ?></td>
                            <td><? echo $cus->asset_councilor; ?></td>
                            <td>
                                <center>
                                    <a href="<? echo base_url(); ?>member/assets/edit_assets/<? echo $cus->asset_id; ?>"><span class="text-dark"><i class="fas fa-edit"></i></span></a>
                                    &nbsp;
                                    <span class="text-danger" onclick="DeleteAssets('<? echo $cus->asset_id; ?>');" style="cursor:pointer;"><i class="fas fa-trash"></i></span>
                                </center>
                                
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

    <script>
    function DeleteAssets(asset_id) { 
            const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "Do you want to delete this Assets data?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
            }).then((result) => {
            if (result.isConfirmed) {
                swalWithBootstrapButtons.fire(
                'Deleted!',
                'Your data has been deleted.',
                'success'
                )
                
                    $.ajax({
                        type: 'post',
                        url: '<? echo base_url(); ?>member/assets/data_delete_assets',
                        data: {
                            cus_id : cus_id
                        },
                        success: function (response) {
                            console.log(response);
                            if(response=="success"){ 
                                $("#row_"+cus_id).fadeOut();
                            } else if(response=="empty"){
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Empty Data.',
                                    text: 'Please try again!'
                                })
                            } else if(response=="error"){
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error...',
                                    text: 'Something went wrong!'
                                })
                            }
                            
                        }
                        });

            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                'Cancelled',
                'Thank! we keeped your data.',
                'warning'
                )
                console.log("Cancle");
            }
            })
     }
</script>


</body>
 
</html>