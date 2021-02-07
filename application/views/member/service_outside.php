<!doctype html>
<html lang="en">

 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <? $this->load->view("member/script_css"); ?>

    <title>Service Outside</title>

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
                            <h3 class="section-title">Service Outside &nbsp;
                            <a href="<? echo base_url(); ?>member/service_outside/add_service_outside"><button class="btn btn-sm btn-success"><i class="fas fa-plus-circle"></i> Add Service Outside</button></a>
                            </h3>
                        </div>
                        <div class="card">
                            <div class="card-body">
                        <div class="table-responsive-lg">
                        <table class="table table-striped" id="dataTableServiceOutside">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Revision No.</th>
                            <th scope="col">Date</th>
                            <th scope="col">Company Name</th>
                            <th scope="col">Machine S/N</th>
                            <th scope="col">Technician Name</th>
                            <th scope="col">คนรับงาน</th>
                            <th scope="col"><center>Manage</center> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?
                                    foreach ($query_service_outside as $key => $cus) {
                                ?>
                                    <tr id="row_<? echo $cus->svo_id; ?>">
                                    <th scope="row"><? echo $cus->svo_id; ?></th>                                    
                                    <td><? echo $cus->svo_revision_no; ?></td>
                                    <td><? echo $cus->svo_date; ?></td>
                                    <td><? echo $cus->svo_machine_sn; ?></td>
                                    <td><? echo $cus->svo_company_name; ?></td>
                                    <td><? echo $cus->svo_technician_name; ?></td>
                                    <td><? echo $cus->svo_emp_receive; ?></td>
                                    <td>
                                        <center>
                                            <a href="<? echo base_url(); ?>member/service_outside/closejob"><span class="text-warning"><i class="fas fa-sign-out-alt" title="จบงาน"></i></span></a>&nbsp;&nbsp;
                                            <a href="<? echo base_url(); ?>member/service_outside/edit_service_outside/<? echo $cus->svo_id; ?>"><span class="text-dark"><i class="fas fa-edit"></i></span></a>
                                            &nbsp;
                                            <span class="text-danger" onclick="DeleteServiceOutside('<? echo $cus->svo_id; ?>');" style="cursor:pointer;"><i class="fas fa-trash"></i></span>
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
    function DeleteServiceOutside(svo_id) { 
        
            const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "Do you want to delete this Service Outside data?",
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
                        url: '<? echo base_url(); ?>member/service_outside/data_delete_service_outside',
                        data: {
                            svo_id : svo_id
                        },
                        success: function (response) {
                            console.log(response);
                            if(response=="success"){ 
                                $("#row_"+svo_id).fadeOut();
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

    <script src="<? echo base_url(); ?>theme/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="<? echo base_url(); ?>theme/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>

    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('#dataTableServiceOutside').DataTable();
        });
    </script>

</body>
 
</html>