<?php

use App\Models\UserModel;
?>
<nav class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle js-sidebar-toggle">
        <i class="hamburger align-self-center"></i>
    </a>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">

            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                    <i class="align-middle" data-feather="settings"></i>
                </a>

                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                    <img src="<?=base_url('uploads/' . model('UserModel')->getLoginData()->foto)?>"
                        class="avatar img-fluid rounded-circle me-1"
                        alt="<?=model('UserModel')->getLoginData()->nama?>" />
                    <span class="text-dark"><?=model('UserModel')->getLoginData()->nama?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="<?=base_url('settings')?>"><i class="fa fa-gear me-2"></i>
                        Pengaturan</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?=base_url('logout')?>"><i
                            class="align-middle fa fa-sign-out me-2"></i>Log
                        out</a>
                </div>
            </li>
        </ul>
    </div>
</nav>