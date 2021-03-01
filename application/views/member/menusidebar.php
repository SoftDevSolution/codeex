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
                    <? if($activemenu=="config_machine_type" or $activemenu=="config_machine_model" or $activemenu=="config_machine_brand"  or $activemenu=="config_user_position" or $activemenu=="config_user_type" or $activemenu=="config_area" or $activemenu=="config_factory_group" or $activemenu=="config_product_type" or $activemenu=="config_industrial_estate"){ ?> 

                    <a class="nav-link active" href="<? echo base_url(); ?>member/company" href="<? echo base_url(); ?>member/company" data-toggle="collapse" aria-expanded="true" data-target="#mydatabase" aria-controls="mydatabase"><i class="fas fa-building"></i> Setup Database</a>

                    <? } else { ?>

                        <a class="nav-link" href="<? echo base_url(); ?>member/company" href="<? echo base_url(); ?>member/company" data-toggle="collapse" aria-expanded="false" data-target="#mydatabase" aria-controls="mydatabase"><i class="fas fa-building"></i> Setup Database</a>
                    <? } ?>

                        <div id="mydatabase" class="collapse submenu <? if($activemenu=="config_machine_type" or $activemenu=="config_machine_model" or $activemenu=="config_machine_brand"  or $activemenu=="config_user_position" or $activemenu=="config_user_type" or $activemenu=="config_area" or $activemenu=="config_factory_group" or $activemenu=="config_product_type" or $activemenu=="config_industrial_estate"){ ?>show<? } ?>">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link <? if($activemenu=="config_user_type"){ ?> active <? } else { } ?>" href="<? echo base_url(); ?>member/config_user_type"><i class="fas fa-list-ul"></i> User Type</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <? if($activemenu=="config_area"){ ?> active <? } else { } ?>" href="<? echo base_url(); ?>member/config_area"><i class="fas fa-list-ul"></i> Area Config</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <? if($activemenu=="config_user_position"){ ?> active <? } else { } ?>" href="<? echo base_url(); ?>member/config_user_position"><i class="fas fa-list-ul"></i> User Position</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <? if($activemenu=="config_machine_type"){ ?> active <? } else { } ?>" href="<? echo base_url(); ?>member/config_machine_type"><i class="fas fa-list-ul"></i> Machine Type</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <? if($activemenu=="config_machine_model"){ ?> active <? } else { } ?>" href="<? echo base_url(); ?>member/config_machine_model"><i class="fas fa-list-ul"></i> Machine Model</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <? if($activemenu=="config_machine_brand"){ ?> active <? } else { } ?>" href="<? echo base_url(); ?>member/config_machine_brand"><i class="fas fa-list-ul"></i> Machine Brand</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <? if($activemenu=="config_factory_group"){ ?> active <? } else { } ?>" href="<? echo base_url(); ?>member/config_factory_group"><i class="fas fa-list-ul"></i> Factory Group</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <? if($activemenu=="config_product_type"){ ?> active <? } else { } ?>" href="<? echo base_url(); ?>member/config_product_type"><i class="fas fa-list-ul"></i> Product Type</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <? if($activemenu=="config_industrial_estate"){ ?> active <? } else { } ?>" href="<? echo base_url(); ?>member/config_industrial_estate"><i class="fas fa-list-ul"></i> Industrial Estate</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <? if($activemenu=="factory" or $activemenu=="add_factory" or $activemenu=="factory_supplier" or $activemenu=="factory_customer" ){ ?> active <? } else { } ?>" href="<? echo base_url(); ?>member/factory" href="<? echo base_url(); ?>member/factory" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fas fa-building"></i> Company Setup</a>
                        <div id="submenu-2" class="collapse submenu <? if($activemenu=="factory" or $activemenu=="add_factory" or $activemenu=="factory_supplier" or $activemenu=="factory_customer" ){ ?> show <? } else { } ?>">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link <? if($activemenu=="factory" or $activemenu=="add_factory"){ ?> active <? } else { } ?>" href="<? echo base_url(); ?>member/factory" href="<? echo base_url(); ?>member/factory"><i class="fas fa-list-ul"></i> Owner</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <? if($activemenu=="factory_supplier"){ ?> active <? } else { } ?>" href="<? echo base_url(); ?>member/factory_supplier" href="<? echo base_url(); ?>member/factory_supplier"><i class="fas fa-list-ul"></i> Supplier</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <? if($activemenu=="factory_customer"){ ?> active <? } else { } ?>" href="<? echo base_url(); ?>member/factory_customer" href="<? echo base_url(); ?>member/factory_customer"><i class="fas fa-list-ul"></i> Customer</a>
                                </li>
                                
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <? if($activemenu=="employees" or $activemenu=="add_employees" 
                        or $activemenu=="visitor_supplier" or $activemenu=="visitor_customer" ){ ?> active <? } else { } ?>" href="<? echo base_url(); ?>member/employees"  data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fas fa-building"></i> Personal Setup</a>
                        <div id="submenu-3" class="collapse submenu <? if($activemenu=="employees" or $activemenu=="add_employees" 
                        or $activemenu=="visitor_supplier" or $activemenu=="visitor_customer" ){ ?> show <? } else { } ?>">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link <? if($activemenu=="employees" or $activemenu=="add_employees"){ ?> active <? } else { } ?>" href="<? echo base_url(); ?>member/employees" ><i class="fas fa-list-ul"></i> Employees</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <? if($activemenu=="visitor_supplier"){ ?> active <? } else { } ?>" href="<? echo base_url(); ?>member/visitor_supplier" ><i class="fas fa-list-ul"></i> Visitor Supplier</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <? if($activemenu=="visitor_customer"){ ?> active <? } else { } ?>" href="<? echo base_url(); ?>member/visitor_customer" ><i class="fas fa-list-ul"></i> Visitor Customer</a>
                                </li>
                                
                            </ul>
                        </div>
                    </li>


                    
                    <li class="nav-item">
                        <a class="nav-link <? if($activemenu=="machine"){ ?> active <? } else { } ?>" href="<? echo base_url(); ?>member/machine" ><i class="fas fa-cog"></i> Inventory</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link <? if($activemenu=="employees" or $activemenu=="add_employee"){ ?> active <? } else { } ?>" href="<? echo base_url(); ?>member/employees"><i class="fas fa-users"></i> Employees</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <? if($activemenu=="customers" or $activemenu=="add_customer"){ ?> active <? } else { } ?>" href="<? echo base_url(); ?>member/customers"><i class="fas fa-users"></i> Customers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <? if($activemenu=="supplier" or $activemenu=="add_supplier"){ ?> active <? } else { } ?>" href="<? echo base_url(); ?>member/supplier"><i class="fas fa-users"></i> Supplier</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link <? if($activemenu=="assets" or $activemenu=="add_asset"){ ?> active <? } else { } ?>" href="<? echo base_url(); ?>member/assets"><i class="fas fa-box-open"></i> Assets</a>
                    </li>

                    <!-- <li class="nav-item">
                        <a class="nav-link <? if($activemenu=="borrow_asset" or $activemenu=="borrow_asset"){ ?> active <? } else { } ?>" href="<? echo base_url(); ?>member/borrow_asset"><i class="fas fa-box-open"></i> Borrow Asset</a>
                    </li> -->
                    
                    <li class="nav-item">
                        <a class="nav-link <? if($activemenu=="notification" or $activemenu=="notification"){ ?> active <? } else { } ?>" href="<? echo base_url(); ?>member/notification"><i class="fas fa-box-open"></i> Notification</a>
                    </li>

                    <!--
                    <li class="nav-item">
                        <a class="nav-link <? if($activemenu=="visitor" or $activemenu=="visitor"){ ?> active <? } else { } ?>" href="<? echo base_url(); ?>member/visitor"><i class="fas fa-box-open"></i> Visitor</a>
                    </li>    
                        
                    <li class="nav-item">
                        <a class="nav-link <? if($activemenu=="autocomplete" or $activemenu=="autocomplete"){ ?> active <? } else { } ?>" href="<? echo base_url(); ?>member/autocomplete"><i class="fas fa-box-open"></i> Autocomplete</a>
                    </li>
                    -->



                    <li class="nav-item">
                        <a class="nav-link <? if($activemenu=="requisition" or $activemenu=="add_requisition" or $activemenu=="add_sub_requisition"){ ?> active <? } else { } ?>" href="<? echo base_url(); ?>member/requisition"><i class="fas fa-sticky-note"></i> Requisition</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link <? if($activemenu=="return_certificate" or $activemenu=="add_return_certificate" or $activemenu=="add_sub_return_certificate"){ ?> active <? } else { } ?>" href="<? echo base_url(); ?>member/return_certificate"><i class="fas fa-sticky-note"></i> Return Certificate</a>
                    </li> -->
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