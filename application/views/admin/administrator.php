<? foreach ($username_admin as $value)
$login_admin = $value->username; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>รายการผู้ดูแลระบบ  Administrator</title>
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
                        <div class="span8">
                            <!-- block -->
                            <div class="block">
                                <div class="navbar navbar-inner block-header">
                                    <div class="muted pull-left">รายการผู้ดูแลระบบ  Administrator</div>
                                   
                                </div>
                                <div class="block-content collapse in">
                                <a href="addadmin"><button class="btn btn-info">เพิ่มผู้ดูแลเว็บไซต์ <i class="icon-plus icon-white"></i></button></a>
                                <? if($this->session->flashdata('msg_ok')){ ?>
                                <div align="center" class="alert alert-success" style="margin:10px;">
                                    <? echo $this->session->flashdata('msg_ok'); ?>
                                </div>
                                <? } else if($this->session->flashdata('msg_error')){  ?>
                                <div align="center" class="alert alert-danger" style="margin:10px;">
                                    <? echo $this->session->flashdata('msg_error'); ?>
                                </div>
                                <? } else { } ?>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Username</th>
                                                <th>Password</th>
                                                <th>ดำเนินการ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                <?
                                foreach ($alladmin as $key => $aam) {
                                    $id_admin = $aam->id;
                                    $username_get = $aam->username;
                                    $password_get = $aam->password;
                                ?>
                                            <tr>
                                                <td><? echo $key+1;?></td>
                                                <td><? echo $username_get; ?></td>
                                                <td><? echo $password_get; ?></td>
                                                <td><a href="editadmin/<? echo $username_get; ?>"><i class="icon-edit"></i></a>
                                                <? if($login_admin==$username_get){  } else { ?>   |  
                                                <a href="removeadmin/<? echo $id_admin; ?>" onclick="return confirm('ยืนยันการลบ?');"><i class="icon-remove"></i></a><? } ?></td>
                                            </tr>
                                            <? } ?>
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