<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>แก้ไขรหัสผ่านผู้ดูแลเว็บไซต์  Administrator</title>
        <!-- Bootstrap -->
        <link href="../../theme/admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="../../theme/admin/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="../../theme/admin/assets/styles.css" rel="stylesheet" media="screen">
        <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="../theme/admin/vendors/flot/excanvas.min.js"></script><![endif]-->
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="../theme/admin/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    
    <body>
        <? $this->load->view('admin/menunavbar'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
                <? $this->load->view('admin/menusidebar'); ;?>
                <!--/span-->
                <div class="span6" id="content">
                      <!-- morris stacked chart -->
                     <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">เพิ่มผู้ดูแลเว็บไซต์ Administrator</div>
                            </div>
                            <div class="block-content collapse in">
                            
                                <div class="span12">
                                <? if($this->session->flashdata('msg_ok')){ ?>
                                <div align="center" class="alert alert-success" style="margin:10px;">
                                    <? echo $this->session->flashdata('msg_ok'); ?>
                                </div>
                                <? } else if($this->session->flashdata('msg_password')){  ?>
                                <div align="center" class="alert alert-danger" style="margin:10px;">
                                    <? echo $this->session->flashdata('msg_password'); ?>
                                </div>
                                <? } else if($this->session->flashdata('msg_error')){ ?>
                                <div align="center" class="alert alert-danger" style="margin:10px;">
                                    <? echo $this->session->flashdata('msg_error'); ?>
                                </div>
                                <? } else {  } ?>
                                    <? $arr = array('class' =>'form-horizontal' );
                                     echo form_open('admin/data_editadmin',$arr); ?>
                                      <fieldset>
                                        <div class="control-group">
                                          <label class="control-label" for="typeahead">แก้ไข Username </label>
                                          <div class="controls">
                                            <input name="username_edit" type="text" class="span6" id="typeahead" value="<? echo $this->uri->segment(3); ?>" readonly> *
                                          </div>
                                        </div>
                                        
                                        <div class="control-group">
                                          <label class="control-label" for="typeahead">รหัสผ่านเดิม Password </label>
                                          <div class="controls">
                                            <input name="password_old" type="password" class="span6" id="typeahead" required> *
                                          </div>
                                        </div>

                                        <div class="control-group">
                                          <label class="control-label" for="typeahead">เปลี่ยน Password </label>
                                          <div class="controls">
                                            <input name="password_new" type="password" class="span6" id="typeahead" required> * # รหัสผ่านจะถูกเข้ารหัส MD5
                                          </div>
                                        </div>
                                        
                                        <div class="control-group" align="right">
                                          <button onclick="return confirm('ยืนยันการแก้ไข?');" type="submit" class="btn btn-primary">ดำเนินการแก้ไข</button>
                                          <a href="../administrator"><button type="button" class="btn btn-danger">ยกเลิก</button></a>
                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        </div>
                                      </fieldset>
                                    <? echo form_close(); ?>

                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>

                </div>
            </div>
            <hr>
            <? $this->load->view('admin/footer'); ;?>
        </div>
        <!--/.fluid-container-->
        <link href="../../theme/admin/vendors/datepicker.css" rel="stylesheet" media="screen">
        <link href="../../theme/admin/vendors/uniform.default.css" rel="stylesheet" media="screen">
        <link href="../../theme/admin/vendors/chosen.min.css" rel="stylesheet" media="screen">

        <link href="../../theme/admin/vendors/wysiwyg/bootstrap-wysihtml5.css" rel="stylesheet" media="screen">

        <script src="../../theme/admin/vendors/jquery-1.9.1.js"></script>
        <script src="../../theme/admin/bootstrap/js/bootstrap.min.js"></script>
        <script src="../../theme/admin/vendors/jquery.uniform.min.js"></script>
        <script src="../../theme/admin/vendors/chosen.jquery.min.js"></script>
        <script src="../../theme/admin/vendors/bootstrap-datepicker.js"></script>

        <script src="../../theme/admin/vendors/wysiwyg/wysihtml5-0.3.0.js"></script>
        <script src="../../theme/admin/vendors/wysiwyg/bootstrap-wysihtml5.js"></script>

        <script src="../../theme/admin/vendors/wizard/jquery.bootstrap.wizard.min.js"></script>

    <script type="text/javascript" src="../../theme/admin/vendors/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="../../theme/admin/assets/form-validation.js"></script>
        
    <script src="../../theme/admin/assets/scripts.js"></script>
        <script>

    jQuery(document).ready(function() {   
       FormValidation.init();
    });
    

        $(function() {
            $(".datepicker").datepicker();
            $(".uniform_on").uniform();
            $(".chzn-select").chosen();
            $('.textarea').wysihtml5();

            $('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
                var $total = navigation.find('li').length;
                var $current = index+1;
                var $percent = ($current/$total) * 100;
                $('#rootwizard').find('.bar').css({width:$percent+'%'});
                // If it's the last tab then hide the last button and show the finish instead
                if($current >= $total) {
                    $('#rootwizard').find('.pager .next').hide();
                    $('#rootwizard').find('.pager .finish').show();
                    $('#rootwizard').find('.pager .finish').removeClass('disabled');
                } else {
                    $('#rootwizard').find('.pager .next').show();
                    $('#rootwizard').find('.pager .finish').hide();
                }
            }});
            $('#rootwizard .finish').click(function() {
                alert('Finished!, Starting over!');
                $('#rootwizard').find("a[href*='tab1']").trigger('click');
            });
        });
        </script>
    </body>

</html>