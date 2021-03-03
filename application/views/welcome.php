<? 
    foreach ($setting_web as $data) {  }
?>
<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login | <? echo $data->nameweb; ?></title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<? echo base_url(); ?>theme/vendor/bootstrap/css/bootstrap.min.css">
    <link href="<? echo base_url(); ?>theme/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<? echo base_url(); ?>theme/css/style.css">
    <link rel="stylesheet" href="<? echo base_url(); ?>theme/vendor/fonts/fontawesome/css/fontawesome-all.css">

    <script src='https://www.google.com/recaptcha/api.js'></script>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@100;200;400&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="<? echo base_url(); ?>theme/images/favicon.ico" type="image/x-icon">
<link rel="icon" href="<? echo base_url(); ?>theme/images/favicon.ico" type="image/x-icon">

    <style>
    html,
    body {
        font-family: 'Prompt', sans-serif;
        font-size: 18px;
        height: 100%;
    }

    body {
        font-family: 'Prompt', sans-serif;
        font-size: 18px;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>


</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center">
                <span class="splash-description">
                <center>
                    <img class="img-fluid" src="<? echo base_url(); ?>theme/images/logo_codeex.png" alt="LOGO">
                </center>
            </span></div>
            <div class="card-body">

            <? $this->load->view("flashdata"); ?>

                <form method="POST" action="<? echo base_url(); ?>member/dologin">
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="username" id="username" type="text" placeholder="Username" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="password" id="password" type="password" placeholder="Password" required>
                    </div>

                    <!-- <div class="form-group">
                        <div style="margin: 10px;">
                        <div align="center" class="g-recaptcha" data-sitekey="6Le4zQ0aAAAAANTEQYsGMec5KCpbXlnvLjTTqL4U"></div>
                        </div>
                    </div> -->

                    <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
                </form>
            </div>
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="<? echo base_url(); ?>theme/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="<? echo base_url(); ?>theme/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
 
</html>