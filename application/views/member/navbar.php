<? foreach ($username_member as $user) {  } ?>
<div class="dashboard-header">
    <nav class="navbar navbar-expand-lg bg-white fixed-top">
        <a class="navbar-brand" href="<? echo base_url(); ?>member">
        <img class="img-fluid" style="max-height: 50px;" src="<? echo base_url(); ?>theme/images/logo_codeex.png" alt="LOGO">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto navbar-right-top">
                <li class="nav-item dropdown nav-user">
                    <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<? echo base_url(); ?>theme/images/theuser.png" alt="" class="user-avatar-md rounded-circle"></a>
                    <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                        <div class="nav-user-info">
                            <h5 class="mb-0 text-white nav-user-name"><? echo $user->emp_username; ?></h5>
                            <!-- <span class="status"></span><span class="ml-2">Available</span> -->
                        </div>
                        <a class="dropdown-item" href="<? echo base_url(); ?>member/employees"><i class="fas fa-users"></i> Manage Users</a>
                        <a class="dropdown-item" href="<? echo base_url(); ?>member/logout"><i class="fas fa-power-off mr-2"></i>Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>