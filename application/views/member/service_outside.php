<!doctype html>
<html lang="en">

 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <? $this->load->view("member/script_css"); ?>

    <title>Service Outside</title>
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
                            <a href="<? echo base_url(); ?>member/add_service_outside"><button class="btn btn-sm btn-success"><i class="fas fa-plus-circle"></i> Add Service Outside</button></a>
                            </h3>
                        </div>
                        <div class="card">
                            <div class="card-body">
                        <div class="table-responsive-lg">
                        <table class="table">
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
                            <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Date</td>
                            <td>Company</td>
                            <td>Machine</td>
                            <td>Technician</td>
                            <td>คนรับงาน</td>
                            <td>
                                <center>
                                    <a href="<? echo base_url(); ?>member/edit_company"><span class="text-dark"><i class="fas fa-edit"></i></span></a>
                                    &nbsp;
                                    <a href="<? echo base_url(); ?>member/remove_company"><span class="text-danger"><i class="fas fa-trash"></i></span></a>
                                </center>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">2</th>
                            <td>Mark</td>
                            <td>Date</td>
                            <td>Company</td>
                            <td>Machine</td>
                            <td>Technician</td>
                            <td>คนรับงาน</td>
                            <td>
                                <center>
                                    <a href="<? echo base_url(); ?>member/edit_company"><span class="text-dark"><i class="fas fa-edit"></i></span></a>
                                    &nbsp;
                                    <a href="<? echo base_url(); ?>member/remove_company"><span class="text-danger"><i class="fas fa-trash"></i></span></a>
                                </center>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">3</th>
                            <td>Mark</td>
                            <td>Date</td>
                            <td>Company</td>
                            <td>Machine</td>
                            <td>Technician</td>
                            <td>คนรับงาน</td>
                            <td>
                                <center>
                                    <a href="<? echo base_url(); ?>member/edit_company"><span class="text-dark"><i class="fas fa-edit"></i></span></a>
                                    &nbsp;
                                    <a href="<? echo base_url(); ?>member/remove_company"><span class="text-danger"><i class="fas fa-trash"></i></span></a>
                                </center>
                            </td>
                            </tr>
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