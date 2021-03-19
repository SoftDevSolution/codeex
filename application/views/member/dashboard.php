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
    <link href="<? echo base_url(); ?>theme/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />

    <!-- Sweet Alert -->
    <script src="<? echo base_url(); ?>theme/sweetalert/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="<? echo base_url(); ?>theme/sweetalert/sweetalert2.min.css">
    <link href="<? echo base_url(); ?>theme/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />

    <title>Welcome to Dashboard Notification | <? echo $data->nameweb; ?></title>

<style>
    .spanspot {
        cursor : pointer;
    }
</style>

<? $this->load->view("member/time_to_datethai_en"); ?>

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
                            <h3 class="section-title"><i class="far fa-bell"></i> Notifications (<? echo number_format($count_notification,0); ?>)</h3>
                        </div>
                        <div class="card">
                            <div class="card-body">
                        <div class="table-responsive-lg">
                        <table class="table table-hover" id="dataTable">
                        <thead>
                            <tr>
                            <th scope="col"># ID</th>
                            <th scope="col">Machine ID</th>
                            <th scope="col">Date Notify</th>
                            <th scope="col">Messages</th>
                            <th scope="col"><center>Manage</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?  foreach ($query_notification as $notify) {  ?>
                            <tr>
                            <th scope="row">#<? echo $notify->notification_id; ?></th>
                            <td><? echo $notify->machine_id; ?></td>
                            <td><? echo set_mytime($notify->date_notify); ?></td>
                            <td><? echo $notify->messages ?></td>
                            <? if($notify->status_notification==0){ ?>
                            <td>
                                <div id="row_<? echo $notify->notification_id; ?>">
                                <center>
                                    <span class="text-success spanspot" onclick="Readed(<? echo $notify->notification_id; ?>);"> <button class="btn btn-sm btn-success"><i class="fab fa-readme"></i> Readed</button> </span>
                                </center>
                                </div>
                            </td>
                            <?  } else { ?>
                            <td>
                                <div id="row_<? echo $notify->notification_id; ?>">
                                <center>
                                    <span class="text-success"><i class="fas fa-check-circle"></i></span>
                                </center>
                                </div>
                            </td>
                            <? }  ?>
                            </tr>
                            <? } ?>
                            <?  foreach ($query_all_notification as $key => $notify) {  ?>
                            <tr>
                            <th scope="row">#<? echo $notify->notification_id; ?></th>
                            <td><? echo $notify->machine_id ?></td>
                            <td><? echo set_mytime($notify->date_notify); ?></td>
                            <td><? echo $notify->messages ?></td>
                            <? if($notify->status_notification==0){ ?>
                            <td>
                                <div id="row_<? echo $notify->notification_id; ?>">
                                <center>
                                    <span class="text-success spanspot" onclick="Readed(<? echo $notify->notification_id; ?>);"> <button class="btn btn-sm btn-success"><i class="fab fa-readme"></i> Readed</button> </span>
                                </center>
                                </div>
                            </td>
                            </tr>
                            <?  } else { ?>
                            <td>
                                <div id="row_<? echo $notify->notification_id; ?>">
                                <center>
                                    <span class="text-success"><i class="fas fa-check-circle"></i></span>
                                </center>
                                </div>
                            </td>
                            <? } ?>

                            <? } ?>
                        </tbody>
                        </table>
                        </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card border-3 border-top border-top-primary">
                            <div class="card-body">
                                <h3 class="text-muted">Total Company</h3>
                                <div class="metric-value d-inline-block">
                                    <center>
                                        <h1 class="mb-1"><? echo number_format($count_company,0); ?></h1>
                                    </center>
                                </div>
                                <div class="metric-label d-inline-block float-right font-weight-bold">
                                    users
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card border-3 border-top border-top-primary">
                            <div class="card-body">
                                <h3 class="text-muted">Total Company Suplier</h3>
                                <div class="metric-value d-inline-block">
                                    <center>
                                        <h1 class="mb-1"><? echo number_format($count_company_supplier,0); ?></h1>
                                    </center>
                                </div>
                                <div class="metric-label d-inline-block float-right font-weight-bold">
                                    users
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card border-3 border-top border-top-primary">
                            <div class="card-body">
                                <h3 class="text-muted">Total Customers</h3>
                                <div class="metric-value d-inline-block">
                                    <center>
                                        <h1 class="mb-1"><? echo number_format($count_customer,0); ?></h1>
                                    </center>
                                </div>
                                <div class="metric-label d-inline-block float-right font-weight-bold">
                                    users
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card border-3 border-top border-top-primary">
                            <div class="card-body">
                                <h3 class="text-muted">Total Employees</h3>
                                <div class="metric-value d-inline-block">
                                    <center>
                                        <h1 class="mb-1"><? echo number_format($count_employee,0); ?></h1>
                                    </center>
                                </div>
                                <div class="metric-label d-inline-block float-right font-weight-bold">
                                    users
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card border-3 border-top border-top-primary">
                            <div class="card-body">
                                <h3 class="text-muted">Total Supplier</h3>
                                <div class="metric-value d-inline-block">
                                    <center>
                                        <h1 class="mb-1"><? echo number_format($count_company,0); ?></h1>
                                    </center>
                                </div>
                                <div class="metric-label d-inline-block float-right font-weight-bold">
                                    users
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card border-3 border-top border-top-primary">
                            <div class="card-body">
                                <h3 class="text-muted">Total Assets</h3>
                                <div class="metric-value d-inline-block">
                                    <center>
                                        <h1 class="mb-1"><? echo number_format($count_company,0); ?></h1>
                                    </center>
                                </div>
                                <div class="metric-label d-inline-block float-right font-weight-bold">
                                    users
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
    function Readed(notification_id) {
        console.log("notification_id");
            $.ajax({
                type: 'post',
                url: '<? echo base_url(); ?>member/notification/delete_notification/',
                data: {
                    notification_id : notification_id
                },
                success: function (response) {
                    console.log(response);
                    if(response=="success"){ 
                        $("#row_"+notification_id).html(" <center><span class='text-success'><i class='fas fa-check-circle'></i></span></center> ");
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
     }
</script>

    <script src="<? echo base_url(); ?>theme/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="<? echo base_url(); ?>theme/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>

    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('#dataTable').DataTable();
            Alert_Notify();
        });

        <? if($count_not_read_notification==0){  } else { ?>
        function Alert_Notify() { 
            <? if($count_notification==1){ ?>
            Swal.fire('You have <? echo number_format($count_not_read_notification,0); ?> notifiation.');
            <?  } else {  ?>
            Swal.fire('You have <? echo number_format($count_not_read_notification,0); ?> notifiations.');
            <? } ?>
         }
        <? } ?>
    </script>

</body>
 
</html>