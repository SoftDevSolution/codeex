<? 
    foreach ($setting_web as $data) {  }
    foreach ($query_notification as $notify) {  }
?>
<!doctype html>
<html lang="en">

 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <? $this->load->view("member/script_css"); ?>

    <title>Edit Notification | <? echo $data->nameweb; ?></title>

       <!-- production version, optimized for size and speed -->
       <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

        <!-- Sweet Alert -->
        <script src="<? echo base_url(); ?>theme/sweetalert/sweetalert2.min.js"></script>
        <link rel="stylesheet" href="<? echo base_url(); ?>theme/sweetalert/sweetalert2.min.css">
        <link rel="stylesheet" href="<? echo base_url(); ?>theme/css/input_tags.css">

        <? $this->load->view("member/time_to_datethai_en"); ?>
        

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
                            <h3 class="section-title">Edit Notification</h3>
                            <hr>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<? echo base_url(); ?>member/notification" class="breadcrumb-link">Notification</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Notification</li>
                        </ol>
                        </div>
                    </div>

                    <div class="col-xl-12 col-12">
                        <? $this->load->view("member/flashsweet"); ?>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">

                                <form action="<? echo base_url(); ?>member/notification/data_edit_notification" method="POST">
                                    <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-12">
                                            <label for="machine_id">Machine ID <span class="text-danger">*</span></label>
                                            <input type="text" name="machine_id" id="machine_id" class="form-control input-lg" placeholder="Machine ID or Machine S/N" autocomplete="off" value="<? echo $notify->machine_id; ?>" required />
                                            <ul class="list-group"></ul>
                                            
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-12">
                                            <label for="messages">Messages <span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="messages" id="messages" cols="30" rows="5" required><? echo $notify->messages; ?></textarea>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-12">
                                            <label for="user_notification">Users Notification</label>
                                            <input type="text" class="form-control tagsinput" id="user_notification" name="user_notification" placeholder="All User" autocomplete="off" value="<? echo $notify->user_notification; ?>">
                                            <ul class="list-group2"></ul>
                                            <p class="text-primary">If empty data.It mean send this notification to all users.</p>
                                        </div>
                                    </div>

                                    <center>
                                    <hr>
                                    <input type="hidden" name="notification_id" value="<? echo $notify->notification_id; ?>">
                                    <button type="submit" class="btn btn-primary">Edit</button> &nbsp;&nbsp;
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

</body>
 
</html>