<!doctype html>
<html lang="en">

 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <? $this->load->view("member/script_css"); ?>

    <title>Config Machine Model</title>
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
                            <h3 class="section-title">Add New Machine Model</h3>
                            <hr>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<? echo base_url(); ?>member/machine" class="breadcrumb-link">Machine</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add New Machine Model</li>
                        </ol>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive-lg">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Machine Model</th>
                                            <th scope="col">Process</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>
                                            <a href="<? echo base_url(); ?>member/edit_machine_model/2" class="text-dark"><i class="fas fa-edit"></i></a>
                                            &nbsp;
                                            <a href="<? echo base_url(); ?>member/delete_machine_model/2" class="text-danger" onclick="return confirm('Comfirm Delete?');"><i class="fas fa-trash"></i></a>
                                            </td>
                                            </tr>
                                            <tr>
                                            <th scope="row">2</th>
                                            <td>Jacob</td>
                                            <td>
                                            <a href="<? echo base_url(); ?>member/edit_machine_model/2" class="text-dark"><i class="fas fa-edit"></i></a>
                                            &nbsp;
                                            <a href="<? echo base_url(); ?>member/delete_machine_model/2" class="text-danger" onclick="return confirm('Comfirm Delete?');"><i class="fas fa-trash"></i></a>
                                            </td>
                                            </tr>
                                            <tr>
                                            <th scope="row">3</th>
                                            <td>Larry</td>
                                            <td>
                                            <a href="<? echo base_url(); ?>member/edit_machine_model/2" class="text-dark"><i class="fas fa-edit"></i></a>
                                            &nbsp;
                                            <a href="<? echo base_url(); ?>member/delete_machine_model/2" class="text-danger" onclick="return confirm('Comfirm Delete?');"><i class="fas fa-trash"></i></a>
                                            </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="<? echo base_url(); ?>member/add_new_machine_part" method="POST" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <label for="model_name">Machine Model</label>
                                            <input type="text" class="form-control" id="model_name" name="model_name" placeholder="Machine Model" required>
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