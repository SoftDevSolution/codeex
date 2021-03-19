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

    <!-- Sweet Alert -->
    <script src="<? echo base_url(); ?>theme/sweetalert/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="<? echo base_url(); ?>theme/sweetalert/sweetalert2.min.css">
    <link href="<? echo base_url(); ?>theme/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />

    <title>Employees | <? echo $data->nameweb; ?></title>
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
                            <h3 class="section-title">Employees
                            <a href="<? echo base_url(); ?>member/employees/add_employee"><button class="btn btn-sm btn-success"><i class="fas fa-plus-circle"></i> Add New Employee</button></a>
                            </h3>
                        </div>
                        <div class="card">
                            <div class="card-body">
                        <div class="table-responsive-lg">

                        <? $this->load->view("member/flashsweet"); ?>

                        <?  if($count_employee==0){  ?>

                            <div align="center" style="padding: 50px 10px;">
                                Empty Data.
                            </div>

                        <? } else { ?>

                        <table class="table table-striped" id="dataTable">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col"><center>Company Name</center></th>
                            <th scope="col">Employee Name</th>
                            <th scope="col">Position</th>
                            <th scope="col">Mobile Phone</th>
                            <th scope="col">Company Email</th>
                            <th scope="col">Age</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Status</th>
                            <th scope="col">Blood Group</th>
                            <th scope="col">Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?  foreach ($query_employee as $key => $emp) { ?>
                            <tr id="row_<? echo $emp->emp_id; ?>">
                            <th scope="row"><? echo $key+1; ?>.</th>
                            <td>
                                <center>
                                <? $query_company = $this->db->where("company_id",$emp->company_id)->get("tbl_company")->result(); 
                                foreach ($query_company as $com) {
                                   echo $com->company_name;
                                }
                                ?>
                                </center>
                            </td>
                            <td><? echo $emp->emp_name; ?>
                            <br>(<? echo $emp->emp_username; ?>)
                            </td>
                            <td><? 
                            $query_position = $this->db->where("position_id",$emp->position_id)
                                        ->get("tbl_position")->result();
                                    foreach ($query_position as $ppp) {
                                        echo $ppp->position_name;
                                    } ?></td>
                            <td><? echo $emp->emp_mobile_phone; ?></td>
                            <td><? echo $emp->emp_company_email; ?></td>
                            <td><? echo $emp->emp_age; ?></td>
                            <td><? echo $emp->emp_gender; ?></td>
                            <td><? echo $emp->emp_status; ?></td>
                            <td><? echo $emp->emp_blood_group; ?></td>
                            <td>
                                <center>
                                    <a href="<? echo base_url(); ?>member/employees/edit_employee/<? echo $emp->emp_id; ?>"><span class="text-dark"><i class="fas fa-edit"></i></span></a>
                                    &nbsp;
                                    <span class="text-danger" onclick="DeleteEmployee('<? echo $emp->emp_id; ?>');" style="cursor:pointer;"><i class="fas fa-trash"></i></span>
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

<script>
    function DeleteEmployee(emp_id) { 
            const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "Do you want to delete this employee data?",
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
                        url: '<? echo base_url(); ?>member/employees/data_delete_employee',
                        data: {
                            emp_id : emp_id
                        },
                        success: function (response) {
                            console.log(response);
                            if(response=="success"){ 
                                $("#row_"+emp_id).fadeOut();
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
            $('#dataTable').DataTable();
        });
    </script>

</body>
 
</html>