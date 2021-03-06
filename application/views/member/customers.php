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

    <title>Customers | <? echo $data->nameweb; ?></title>

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

                    <? $this->load->view("member/flashsweet"); ?>
                    
                        <div class="section-block" id="basicform">
                            <h3 class="section-title">Customers
                            <a href="<? echo base_url(); ?>member/customers/add_customer"><button class="btn btn-sm btn-success"><i class="fas fa-plus-circle"></i> Add New Customer</button></a>
                            </h3>
                        </div>
                        <div class="card">
                            <div class="card-body">
                        <div class="table-responsive-lg">
                        <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Photo</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Mobile Phone</th>
                            <th scope="col">Email</th>
                            <th scope="col">BirthDay</th>
                            <th scope="col">Company</th>
                            <th scope="col"><center>Manage</center></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?
                            foreach ($query_customer as $key => $cus) {
                        ?>
                            <tr id="row_<? echo $cus->cus_id; ?>">
                            <th scope="row">1</th>
                            <td><img class="img_thumnail" src="<? echo base_url(); ?>theme/photocustomerthumbnail/<? echo $cus->cus_pic_path; ?>" alt="<? echo $cus->cus_name; ?>"></td>
                            <td><? echo $cus->cus_name; ?></td>
                            <td><? echo $cus->cus_mobile_phone; ?></td>
                            <td><? echo $cus->cus_email; ?></td>
                            <td><? echo $cus->cus_birth_date; ?></td>
                            <td><? echo $cus->company_id; ?></td>
                            <td>
                                <center>
                                    <a href="<? echo base_url(); ?>member/customers/edit_customer/<? echo $cus->cus_id; ?>"><span class="text-dark"><i class="fas fa-edit"></i></span></a>
                                    &nbsp;
                                    <span class="text-danger" onclick="DeleteCustomer('<? echo $cus->cus_id; ?>');" style="cursor:pointer;"><i class="fas fa-trash"></i></span>
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
    function DeleteCustomer(cus_id) { 
            const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "Do you want to delete this Customer data?",
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
                        url: '<? echo base_url(); ?>member/customers/data_delete_customer',
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