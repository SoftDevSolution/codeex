<?
    $activemenu = $this->uri->segment(2);
    
?>
<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        Menu
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <? if($activemenu=="dashboard"){ ?> active <? } else { } ?>" href="<? echo base_url(); ?>member/dashboard"><i class="fa fa-fw fa-home"></i> Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <? if($activemenu=="company" or $activemenu=="add_company" or $activemenu=="company_supplier" or $activemenu=="add_company_supplier"){ ?> active <? } else { } ?>" href="<? echo base_url(); ?>member/company" href="<? echo base_url(); ?>member/company" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fas fa-building"></i> Company Management</a>
                        <div id="submenu-1" class="collapse submenu">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link <? if($activemenu=="company" or $activemenu=="add_company"){ ?> active <? } else { } ?>" href="<? echo base_url(); ?>member/company" href="<? echo base_url(); ?>member/company"><i class="fas fa-list-ul"></i> Company Data</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <? if($activemenu=="company_supplier"){ ?> active <? } else { } ?>" href="<? echo base_url(); ?>member/company_supplier" href="<? echo base_url(); ?>member/company_supplier"><i class="fas fa-list-ul"></i> Company Supplier</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <? if($activemenu=="machine" or $activemenu=="machine_detail" or $activemenu=="machine_part" or $activemenu=="add_machine_detail" or $activemenu=="config_machine_type" or $activemenu=="config_machine_model" or $activemenu=="config_machine_brand"){ ?> active <? } else { } ?>" href="<? echo base_url(); ?>member/company" href="<? echo base_url(); ?>member/company" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fas fa-building"></i> Machine Management</a>
                        <div id="submenu-2" class="collapse submenu">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link <? if($activemenu=="machine"){ ?> active <? } else { } ?>" href="<? echo base_url(); ?>member/machine" href="<? echo base_url(); ?>member/machine"><i class="fas fa-list-ul"></i> Machine Data</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <? if($activemenu=="machine_detail"){ ?> active <? } else { } ?>" href="<? echo base_url(); ?>member/machine_detail" href="<? echo base_url(); ?>member/machine_detail"><i class="fas fa-list-ul"></i> Machine Detail</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <? if($activemenu=="machine_part" or $activemenu=="add_machine_part"){ ?> active <? } else { } ?>" href="<? echo base_url(); ?>member/machine_part" href="<? echo base_url(); ?>member/machine"><i class="fas fa-list-ul"></i> Machine Part</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <? if($activemenu=="config_machine_type"){ ?> active <? } else { } ?>" href="<? echo base_url(); ?>member/config_machine_type"><i class="fas fa-list-ul"></i> Config Machine Type</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <? if($activemenu=="config_machine_model"){ ?> active <? } else { } ?>" href="<? echo base_url(); ?>member/config_machine_model"><i class="fas fa-list-ul"></i> Config Machine Model</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <? if($activemenu=="config_machine_brand"){ ?> active <? } else { } ?>" href="<? echo base_url(); ?>member/config_machine_brand"><i class="fas fa-list-ul"></i> Config Machine Brand</a>
                                </li>
                                
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <? if($activemenu=="employees" or $activemenu=="add_employee"){ ?> active <? } else { } ?>" href="<? echo base_url(); ?>member/employees"><i class="fas fa-users"></i> Employees</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <? if($activemenu=="customers" or $activemenu=="add_customer"){ ?> active <? } else { } ?>" href="<? echo base_url(); ?>member/customers"><i class="fas fa-users"></i> Customers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <? if($activemenu=="supplier" or $activemenu=="add_supplier"){ ?> active <? } else { } ?>" href="<? echo base_url(); ?>member/supplier"><i class="fas fa-users"></i> Supplier</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <? if($activemenu=="assets" or $activemenu=="add_asset"){ ?> active <? } else { } ?>" href="<? echo base_url(); ?>member/assets"><i class="fas fa-box-open"></i> Assets</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <? if($activemenu=="requisition" or $activemenu=="add_requisition" or $activemenu=="add_sub_requisition"){ ?> active <? } else { } ?>" href="<? echo base_url(); ?>member/requisition"><i class="fas fa-sticky-note"></i> Requisition</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <? if($activemenu=="return_certificate" or $activemenu=="add_return_certificate" or $activemenu=="add_sub_return_certificate"){ ?> active <? } else { } ?>" href="<? echo base_url(); ?>member/return_certificate"><i class="fas fa-sticky-note"></i> Return Certificate</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <? if($activemenu=="service_outside" or $activemenu=="add_service_outside"){ ?> active <? } else { } ?>" href="<? echo base_url(); ?>member/service_outside"><i class="fas fa-sticky-note"></i> Service Outside</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<? echo base_url(); ?>member/logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>