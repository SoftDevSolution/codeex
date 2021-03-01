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

    <title>Welcome to Dashboard Notification | <? echo $data->nameweb; ?></title>
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
                            <h3 class="section-title"><i class="far fa-bell"></i> Notifications (2)</h3>
                        </div>
                        <div class="card">
                            <div class="card-body">
                        <div class="table-responsive-lg">
                        <table class="table table-hover">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Machine ID</th>
                            <th scope="col">Messages</th>
                            <th scope="col"><center>Manage</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?  foreach ($query_notification as $notify) {  ?>
                            <tr>
                            <th scope="row">#<? echo $notify->notification_id; ?></th>
                            <td><? echo $notify->machine_id ?></td>
                            <td><? echo $notify->messages ?></td>
                            <td>
                                <center>
                                    <a href="<? echo base_url(); ?>member/read_notification"><span class="text-success"><i class="fas fa-eye"></i> Readed</span></a>
                                </center>
                            </td>
                            </tr>
                            <? } ?>
                            <?  foreach ($query_all_notification as $key => $notify) {  ?>
                            <tr>
                            <th scope="row">#<? echo $notify->notification_id; ?></th>
                            <td><? echo $notify->machine_id ?></td>
                            <td><? echo $notify->messages ?></td>
                            <td>
                                <center>
                                    <a href="<? echo base_url(); ?>member/read_notification"><span class="text-success"><i class="fas fa-eye"></i> Readed</span></a>
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

</body>
 
</html>