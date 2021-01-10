<? $activemenu = $this->uri->segment(2); ?>
<? 
foreach ($username_admin as $ad)
?>
<div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="<? echo base_url(); ?>admin/dashboard">ระบบการจัดการเว็บไซต์  |  Sakeideas.com</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <a href="<? echo base_url(); ?>admin/dashboard" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> <? echo $ad->username; ?> <i class="caret"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="<? echo base_url(); ?>admin/administrator">Profile</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <? echo anchor('admin/logout','ออกจากระบบ'); ?>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                        <ul class="nav">
                            <li <? if($activemenu=="dashboard"){ ?>class="active"<? } else { } ?>>
                            <a href="<? echo base_url(); ?>admin/dashboard">หน้าหลัก</a></li>
                            <li><? echo anchor('welcome','ดูหน้าเว็บ','target="_blank"'); ?>
                            </li>
                        </ul>
                        <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input name="product" type="text" class="form-control" placeholder="ค้นหาสินค้า">
          <button type="submit" class="btn btn-default">ค้นหา</button>
        </div>
      </form>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>