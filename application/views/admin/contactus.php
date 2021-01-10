<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>รายการติดต่อจากหน้าเว็บ</title>
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
                                    <div class="muted pull-left">รายการติดต่อเรา
                                    &nbsp;&nbsp; (ทั้งหมด <? echo number_format($count_contact,0); ?> รายการ)</div>
                                   
                                </div>
                                <div class="block-content collapse in">
                                
                            <? if($this->session->flashdata('msg_ok')){ ?>
                                <div align="center" class="alert alert-success" style="margin:10px;">
                                    <? echo $this->session->flashdata('msg_ok'); ?>
                                </div>
                                <? } else if($this->session->flashdata('msg_error')){  ?>
                                <div align="center" class="alert alert-danger" style="margin:10px;">
                                    <? echo $this->session->flashdata('msg_error'); ?>
                                </div>
                                <? } else { } ?>

                                      <? echo $pagination; ?>
                                      <p>&nbsp;</p>  
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>หัวข้อเรื่อง</th>
                                                <th>รายละเอียด</th>
                                                <th>ข้อมูลผู้ส่ง</th>
                                                <th>ลบ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <? foreach ($query as $key => $sl){ ?>
                                            <tr>
                                                <td><? echo $key+1; ?></td>
                                                <td><? echo $sl->topic; ?></td>
                                                <td><pre><? echo $sl->detail; ?></pre></td>
                                                <td><? echo $sl->name_user; ?>
                                                    <br><? echo $sl->email_user; ?>
                                                    <br>โทร.<? echo $sl->phone; ?></td>
                                                <td>
                                     <a href="<? echo base_url(); ?>admin/remove_contact/<? echo $sl->id; ?>" onclick="return confirm('ยืนยันการลบ?');" title="ลบข่าว">
                                     <i class="icon-remove"></i>ลบ</a>
                                     </td>
                                            </tr>
                                            <? } ?>
                                        </tbody>
                                    </table>
                                    <? echo $pagination; ?>
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