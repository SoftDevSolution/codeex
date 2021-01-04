<?php
$activemenu = $this->uri->segment(2);

?>
<div class="span3" id="sidebar">
<ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
    <li <?php if($activemenu=="dashboard") { ?>class="active"<? } else { } ?>>
        <a href="<? echo base_url(); ?>admin/dashboard"><i class="icon-chevron-right"></i> สถิติเว็บไซต์</a>
    </li>    
    <li <?php if($activemenu=="blank" ) { ?>class="active"<? } else { } ?>>
        <a href="<? echo base_url(); ?>admin/configweb"><i class="icon-chevron-right"></i> Menu</a>
    </li>   
    <li <?php if($activemenu=="blank" ) { ?>class="active"<? } else { } ?>>
        <a href="<? echo base_url(); ?>admin/configweb"><i class="icon-chevron-right"></i> Menu</a>
    </li>   
    <li <?php if($activemenu=="blank" ) { ?>class="active"<? } else { } ?>>
        <a href="<? echo base_url(); ?>admin/configweb"><i class="icon-chevron-right"></i> Menu</a>
    </li>   
    <li <?php if($activemenu=="blank" ) { ?>class="active"<? } else { } ?>>
        <a href="<? echo base_url(); ?>admin/configweb"><i class="icon-chevron-right"></i> Menu</a>
    </li>   
    <li <?php if($activemenu=="blank" ) { ?>class="active"<? } else { } ?>>
        <a href="<? echo base_url(); ?>admin/configweb"><i class="icon-chevron-right"></i> Menu</a>
    </li>                   
    <li <?php if($activemenu=="administrator" or $activemenu=="addadmin" or $activemenu=="editadmin") { ?>class="active"<? } else { } ?>>
        <a href="<? echo base_url(); ?>admin/administrator"><i class="icon-chevron-right"></i> เพิ่ม - ลบ ผู้ดูแลเว็บไซต์</a>
    </li>          
    <li>
        <a href="<? echo base_url(); ?>admin/logout" class="btn-danger"><i class="icon-chevron-right"></i> ออกจากระบบ</a>
    </li>
    
</ul>
</div>