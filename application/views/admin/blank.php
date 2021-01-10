<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>ยินดีต้อนรับเข้าสู่ระบบการจัดการเว็บไซต์ | Ubeststation.com</title>
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
                                    <div class="muted pull-left">รายการติดต่อเรา</div>
                                   
                                </div>
                                <div class="block-content collapse in">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>ผู้ส่ง</th>
                                                <th>ข้อความ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Vincent</td>
                                                <td>Gabriel</td>
                                            </tr>
                                        </tbody>
                                    </table>
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