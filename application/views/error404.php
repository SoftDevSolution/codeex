<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>404 Error</title>
        <link href="<? echo base_url(); ?>theme/css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <div id="layoutError">
            <div id="layoutError_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="text-center mt-4">
                                    <img class="mb-4 img-error" src="<? echo base_url(); ?>theme/images/error-404-monochrome.svg" />
                                    <p class="lead">ไม่พบหน้าที่คุณต้องการ กรุณาลองใหม่อีกครั้ง</p>
                                    <a href="<? echo base_url(); ?>"><i class="fas fa-arrow-left mr-1"></i>กลับสู่หน้าเว็บหลัก</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutError_footer">
                <? $this->load->view("admin/footer"); ?>
            </div>
        </div>
    </body>
</html>
