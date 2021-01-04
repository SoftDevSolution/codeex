<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>ยินดีต้อนรับเข้าสู่ระบบการจัดการเว็บไซต์ Ubeststation.com</title>
        <? $this->load->view('admin/script');  ?>        
    </head>
    <body>
        <? $this->load->view('admin/menunavbar'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
                <? $this->load->view('admin/menusidebar'); ;?>
                
                <!--/span-->
                <div class="span9" id="content">
                  
                    
                    <div class="row-fluid">
                        <div class="span12">
                            <!-- block -->
                            <div class="block">
                                <div class="navbar navbar-inner block-header">
                                    <div class="muted pull-left">สถิติเว็บไซต์</div>
                                   
                                </div>
                                <div class="block-content collapse in" align="center">
                             
                                    <button class="btn btn-large btn-success" type="button" style="padding:20px; margin:20px;"> 
                                    <? foreach ($today as $st){
                                        $showstat_today = $st->stat;
                                    }
                                    ?>
                                      เข้าชมวันนี้ <br><br><h1><? echo number_format($showstat_today,0); ?> Views</h1>
                                    </button>
                                    <button class="btn btn-large btn-warning" type="button" style="padding:20px; margin:20px;">
                                    <? foreach ($yesterday AS $yd) {
                                        $yesterdayok = $yd->stat;
                                    }
                                    ?>
                                      เข้าชมเมื่อวานนี้ <br><br><h1><? echo number_format($yesterdayok,0); ?> Views</h1>
                                    </button>
                                    <button class="btn btn-large btn-danger" type="button" style="padding:20px; margin:20px;">
                                    <? 
                                    foreach ($totalstat AS $als)
                                    ?>
                                      เยี่ยมชมทั้งหมด <br><br><h1><? echo number_format($als->stat,0); ?> Views</h1>
                                    </button>                    

                                </div>
                            </div>
                            <!-- /block -->

                        </div>
                        
                    </div>
                    
                </div>
            </div>
            <hr>
            <? $this->load->view('admin/footer'); ;?>
        </div>
        
    </body>

</html>