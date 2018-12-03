<!--Menu for navigation, showing profile and primary functions such as logout, full screen and settings-->
<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="<?php echo SURL?>home.php" class="site_title"><span>To Do Application</span></a>
        </div>
        <div class="clearfix"></div>
        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="<?php echo DirUsersSThmb ?>thmb_1490442563_man_2676920180517182229.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $_SESSION["sess_user_info"]["first_name"].' '.$_SESSION["sess_user_info"]["last_name"]; ?></h2>
            </div>
        </div>
        <!-- /menu profile quick info -->
        <br />
        <!-- sidebar menu -->
        
        
        
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section active">
                <h3>General</h3>
                <ul class="nav side-menu">                	
                    <!-- Dashboard -->
                	<li <?php if($pagename == 'home' && $_GET['page'] == ''){ echo 'class="current-page"'; }else{ echo 'style="border-right:none; background:#2A3F54;"'; }?>><a href="<?php echo SURL?>home.php"><i class="fa fa-home"></i> Dashboard</a></li>
                    
                    <li <?php echo ($_GET['page'] == 'task')?'class="active"':'';?>>
                    	<a><i class="fa fa-tasks"></i> Manage To Do Tasks<span class="fa fa-chevron-down"></span></a>
                    	<ul class="nav child_menu" <?php echo ($_GET['page'] == 'task')?'style="display:block;"':'';?>>
                     		<li <?php echo ($_GET['page'] == 'task' && $_GET['act'] == 'add')?'class="current-page"':'';?>><a href="<?php echo SURL?>home.php?page=task&act=add">Add To Do Task</a></li>
                      		<li <?php echo ($_GET['page'] == 'task' && ( $_GET['act'] == 'list' || $_GET['act'] == 'edit') )?'class="current-page"':'';?>><a href="<?php echo SURL?>home.php?page=task&act=list">Manage To Do Tasks</a></li>                      
                    	</ul>
                  	</li>
                    
                  
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->
        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            
            <a href="logout.php" data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>




