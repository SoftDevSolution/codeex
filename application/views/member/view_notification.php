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

    <title>Notification | <? echo $data->nameweb; ?></title>

       <!-- production version, optimized for size and speed -->
       <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

        <!-- Sweet Alert -->
        <script src="<? echo base_url(); ?>theme/sweetalert/sweetalert2.min.js"></script>
        <link rel="stylesheet" href="<? echo base_url(); ?>theme/sweetalert/sweetalert2.min.css">
        <link rel="stylesheet" href="<? echo base_url(); ?>theme/css/input_tags.css">
        <link href="<? echo base_url(); ?>theme/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />

        <? $this->load->view("member/time_to_datethai_en"); ?>
        
<style>
    .spanspot {
        cursor : pointer;
    }
</style>

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
                            <h3 class="section-title">Notification</h3>
                            <hr>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<? echo base_url(); ?>member/dashboard" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create New Notification</li>
                        </ol>
                        </div>
                    </div>

                    <div class="col-xl-12 col-12">
                        <? $this->load->view("member/flashsweet"); ?>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">

                                <form action="<? echo base_url(); ?>member/notification/data_add_notification" method="POST">
                                    <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-12">
                                            <label for="machine_id">Machine ID <span class="text-danger">*</span></label>
                                            <input type="text" name="machine_id" id="machine_id" class="form-control input-lg" placeholder="Machine ID or Machine S/N" autocomplete="off" required />
                                            <ul class="list-group"></ul>
                                            
                                        </div>
                                        <div class="form-group col-sm-4 col-md-4 col-lg-4 col-12">
                                            <label for="frequency">Frequency/Day (ความถี่ในการแจ้งเตือน) <span class="text-danger">*</span></label>
                                            <select class="form-control" name="frequency" id="frequency" required>
                                                <option value="1">1 Day</option>
                                                <option value="2">2 Days</option>
                                                <option value="3">3 Days</option>
                                                <option value="5">5 Days</option>
                                                <option value="7">7 Days</option>
                                                <option value="10">10 Days</option>
                                                <option value="15">15 Days</option>
                                                <option value="30">30 Days</option>
                                                <option value="60">60 Days</option>
                                                <option value="90">90 Days</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-sm-4 col-md-4 col-lg-4 col-12">
                                            <label for="myloop">Number of times (จำนวนครั้งที่แจ้งเตือน) <span class="text-danger">*</span></label>
                                            <input type="number" min="1" class="form-control" id="myloop" name="myloop" placeholder="Number of times" value="1" required>
                                        </div>
                                        <div class="form-group col-sm-4 col-md-4 col-lg-4 col-12">
                                            <label for="date_start">Date Start Alert (วันที่เริ่มแจ้งเตือน) <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" id="date_start" name="date_start" placeholder="Date Start Alert" value="<? echo date("Y-m-d"); ?>" required>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-12">
                                            <label for="messages">Messages <span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="messages" id="messages" cols="30" rows="5" required></textarea>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-12">
                                            <label for="user_notification">Users Notification</label>
                                            <input type="text" class="form-control tagsinput" id="user_notification" name="user_notification" placeholder="All User" autocomplete="off">
                                            <ul class="list-group2"></ul>
                                            <p class="text-primary">If empty data.It mean send this notification to all users.</p>
                                        </div>
                                    </div>

                                    <center>
                                    <hr>
                                    <button type="submit" class="btn btn-primary">Create Notification</button> &nbsp;&nbsp;
                                    <button type="reset" class="btn btn-warning">Reset</button>
                                    </center>
                                </form>

                            </div>

                        </div>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive-lg">
                                    <table class="table table-striped" id="dataTable">
                                        <thead>
                                            <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Machine ID</th>
                                            <th scope="col">Date Notification</th>
                                            <th scope="col">User Notification</th>
                                            <th scope="col">Process</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <? 
                                            foreach ($data_notification as $key => $notify) {
                                                
                                                ?>
                                                            <tr id="row_<? echo $notify->notification_id; ?>">
                                                            <th scope="row"><? echo $key+1; ?></th>
                                                            <td>#<? echo $notify->machine_id; ?></td>
                                                            <td><? echo set_mytime($notify->date_notify); ?></td>
                                                            <td><? if(empty($notify->user_notification)){ echo "All users"; } else { echo $notify->user_notification; } ?></td>
                                                            <td>
                                                            <a href="<? echo base_url(); ?>member/notification/edit_notification/<? echo $notify->notification_id; ?>" class="text-dark"><i class="fas fa-edit"></i></a>
                                                            &nbsp;
                                                            <span class="text-danger spanspot" onclick="DeleteNotification(<? echo $notify->notification_id; ?>);"><i class="fas fa-trash"></i></span>
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
    $(document).ready(function() {
        // Machine ID
        $('#machine_id').keyup(function() {
            var query = $('#machine_id').val();
            $('#detail').html('');
            $('.list-group').css('display', 'block');
            if (query.length > 0) {
                $.ajax({
                    url: "<? echo base_url(); ?>member/machine/get_machine_id",
                    method: "POST",
                    data: {
                        query: query
                    },
                    success: function(data) {
                        $('.list-group').html(data);
                    }
                })
            }
            if (query.length == 0) {
                $('.list-group').css('display', 'none');
            }
        });

        $(document).on('click', '.gsearch', function() {
            var TextSearch = $(this).text();
            $('#machine_id').val(TextSearch);
            $('.list-group').css('display', 'none');
        });

    });

    $(document).ready(function() {

        // User Notification
        $('#user_notification_tag').keyup(function() {
            var query_user = $('#user_notification_tag').val();
            console.log(query_user);
            $('.list-group2').css('display', 'block');
            if (query_user.length > 0) {
                $.ajax({
                    url: "<? echo base_url(); ?>member/notification/get_user",
                    method: "POST",
                    data: {
                        query: query
                    },
                    success: function(data) {
                        $('.list-group2').html(data);
                    }
                })
            }
            if (query.length == 0) {
                $('.list-group2').css('display', 'none');
            }
        });

        $(document).on('click', '.TextSearch', function() {
            var TextSearch = $(this).text();
            $('#user_notification_tag').val(TextSearch);
            $('.list-group2').css('display', 'none');
        });

    });



    </script>
    <script src="<? echo base_url() ?>theme/js/tags.js"></script>

    <script src="<? echo base_url(); ?>theme/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="<? echo base_url(); ?>theme/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>

    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>

<script>
    function DeleteNotification(notification_id) { 
            const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "Do you want to delete this notification?",
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
                        url: '<? echo base_url(); ?>member/notification/delete_notification/',
                        data: {
                            notification_id : notification_id
                        },
                        success: function (response) {
                            console.log(response);
                            if(response=="success"){ 
                                $("#row_"+notification_id).fadeOut();
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