<!-- top navigation -->
<div class="top_nav">
<div class="nav_menu">
    <nav>
        <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo DirUsersSThmb ?>thmb_1490442563_man_2676920180517182229.jpg" alt=""><?php echo $_SESSION["sess_user_info"]["first_name"].' '.$_SESSION["sess_user_info"]["last_name"]; ?>
                    <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="<?php echo SURL?>home.php?page=profile&act=edit"> Edit Profile</a></li>
                    <li>
                        <a href="<?php echo SURL?>home.php?page=loginprofile&act=edit">
                            <!--<span class="badge bg-red pull-right">50%</span>-->
                            <span>Edit Login Info</span>
                        </a>
                    </li>
                   <!-- <li><a href="javascript:;">Help</a></li>-->
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                </ul>
            </li>
           
        </ul>
    </nav>
</div>
</div>
<!-- /top navigation -->
