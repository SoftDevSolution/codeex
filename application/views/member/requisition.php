<!doctype html>
<html lang="en">

 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <? $this->load->view("member/script_css"); ?>

    <title>Requisition</title>

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
                            <h3 class="section-title">Requisition &nbsp;
                            <a href="<? echo base_url(); ?>member/requisition/add_requisition"><button class="btn btn-sm btn-success"><i class="fas fa-plus-circle"></i> Add New Requisition</button></a>
                            </h3>
                        </div>
                        <div class="card">
                            <div class="card-body">
                        <div class="table-responsive-lg">
                        <table class="table table-striped" id="dataTableRequisition">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">P/N</th>
                            <th scope="col">Serial number</th>
                            <th scope="col">สถานที่จัดเก็บ</th>
                            <th scope="col">ประเภทของสินค้าทางบัญชี</th>
                            <th scope="col">Status</th>
                            <th scope="col"><center>Manage</center> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>mdo</td>
                            <td>Status</td>
                            <td>Email</td>
                            <td>
                                <center>
                                    <a href="<? echo base_url(); ?>member/requisition/edit_requisition"><span class="text-dark"><i class="fas fa-edit"></i></span></a>
                                    &nbsp;
                                    <a href="<? echo base_url(); ?>member/requisition/remove_requisition"><span class="text-danger"><i class="fas fa-trash"></i></span></a>
                                </center>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>fat</td>
                            <td>Email</td>
                            <td>Status</td>
                            <td>
                                <center>
                                    <a href="<? echo base_url(); ?>member/requisition/edit_requisition"><span class="text-dark"><i class="fas fa-edit"></i></span></a>
                                    &nbsp;
                                    <a href="<? echo base_url(); ?>member/requisition/remove_requisition"><span class="text-danger"><i class="fas fa-trash"></i></span></a>
                                </center>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>twitter</td>
                            <td>Email</td>
                            <td>Status</td>
                            <td>
                                <center>
                                    <a href="<? echo base_url(); ?>member/requisition/edit_requisition"><span class="text-dark"><i class="fas fa-edit"></i></span></a>
                                    &nbsp;
                                    <a href="<? echo base_url(); ?>member/requisition/remove_requisition"><span class="text-danger"><i class="fas fa-trash"></i></span></a>
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

    <script src="<? echo base_url(); ?>theme/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="<? echo base_url(); ?>theme/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>

    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('#dataTableRequisition').DataTable();
        });
    </script>

</body>
 
</html>