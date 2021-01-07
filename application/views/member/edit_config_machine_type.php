<!doctype html>
<html lang="en">

 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <? $this->load->view("member/script_css"); ?>

    <title>Edit Machine Type</title>

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
                            <h3 class="section-title">Edit New Machine Type</h3>
                            <hr>
                        </div>
                    </div>

                    <div class="col-xl-12 col-12">
                        <? $this->load->view("member/flashsweet"); ?>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" id="machine_type">
                        <div class="card">
                            <div class="card-body">
                        <?
                            foreach ($get_data_machine_type as $mach) {
                                
                            }
                        ?>
                                <form action="<? echo base_url(); ?>member/edit_data_config_machine_type" method="POST">
                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <label for="machine_type_name">Machine Type</label>
                                            <input type="text" class="form-control" id="machine_type_name" name="machine_type_name" placeholder="Machine Type" value="<? echo $mach->machine_type_name; ?>">
                                        </div>
                                    </div>
                                    <center>
                                    <hr>
                                    <input type="hidden" name="machine_type_id" value="<? echo $mach->machine_type_id; ?>">
                                    <button type="submit" class="btn btn-primary">Edit</button> &nbsp;&nbsp;
                                    <a href="<? echo base_url(); ?>member/config_machine_type"><button type="button" class="btn btn-warning">Back</button></a>
                                    </center>
                                </form>
                            </div>

                            <!-- <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <label for="machine_type_name">Machine Type</label>
                                            <input type="text" class="form-control" id="machine_type_name" v-model="machine_type_name" placeholder="Machine Type" required>
                                        </div>
                                    </div>
                                    <center>
                                    <hr>
                                    <div id="results"></div>
                                    <br>
                                    <button type="button" class="btn btn-primary" @click="AddData();">Save</button> &nbsp;&nbsp;
                                    <button type="reset" class="btn btn-warning" @click="ResetData();">Reset</button>
                                    </center>
                            </div> -->

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        new Vue({
            el: "#app", //machine_type
            data : {
                machine_type_name : "",
            },
            methods: {
                AddData: function () {
                    var self = this;

                    console.log(this.machine_type_name);
                    
                    $.ajax({
                        type: 'post',
                        url: '<? echo base_url(); ?>member/add_config_machine_type',
                        data: {
                            machine_type_name : this.machine_type_name
                        },
                        success: function (response) {

                            if(response=="success"){
                                
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'บันทึกข้อมูลสำเร็จ',
                                    showConfirmButton: false,
                                    timer: 1000
                                    })


                            } else if(response=="empty"){

                                $("#results").html("<span class='text-danger'>กรุณากรอกข้อมูลให้ครบถ้วน " + response+"</span>");
                                console.log(response);

                                Swal.fire({
                                    icon: 'error',
                                    title: 'Empty Data',
                                    text: 'ไม่พบข้อมูลที่คุณกรอก'
                                    })

                            } else {
                                $("#results").html(" ไม่สามารถบันทึกข้อมูลได้ " + response);

                            }
                            
                        }
                        });


                },
                ResetData : function (){
                    this.machine_type_name = "";
                },
                
            },

        })
    </script>



</body>
 
</html>