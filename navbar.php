
<body>
<?php $path='../'; ?>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.php"><?php echo $_SESSION['system_name'];?></a>
            </div>
            <ul class="nav navbar-right top-nav">
			<?php
			if (!class_exists('db_connect')){require_once(dirname(__FILE__)."/../db_connect.php");}
			$obj 	= new db_connect;
			$GetNotification=$obj->select_any("tbl_notification_main","staff_id='".$_SESSION['Id']."' order by notification_main_id DESC LIMIT 5");
			if(!empty($GetNotification))
			{
			?>
               <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><notification class="big swing"><?=count($GetNotification);?></notification><i class="fa fa-bell"></i>   <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
					<?php
					foreach($GetNotification as $GetNotificationSingle)
					{
					?>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong><?=$GetNotificationSingle['title'];?></strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> <?=date("d-m-Y h:i:sa",strtotime($GetNotificationSingle['createdDate']));?></p>
                                        <p><?=$GetNotificationSingle['details'];?></p>
                                    </div>
                                </div>
                            </a>
                        </li>
					<?php
					}
					?>
                        <li class="message-footer">
                            <a href="../Notification/">Read All New Notifications</a>
                        </li>
                    </ul>
                </li>
				<?php
			}
				?>
              <!--  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>-->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['cur_stundent_name'];?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                      <!--  <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>-->
                        <li class=" ">
                            <a href="<?php echo $path;?>Profile/profile.php">
                                <i class="fa fa-user"></i>
                                <span>Profile</span>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                  				<a href="<?php echo $path;?>Login/logout.php">
                            <i class="fa fa-circle-o-notch"></i>
                  					Log Out <i class="entypo-logout right"></i>
                  				</a>
                  			</li>
                    </ul>

                </li>
            </ul>
          
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">

                    <li class=" <?php
                        if($_SESSION['active_module']=='WELC'){
                            echo 'active';
                        }
                        ?>">
                        <a href="<?php echo $path;?>Login/welcome.php">
                            <i class="fa fa-tachometer"></i>
                            <span>dashboard</span>
                        </a>
                    </li>

                    <li class="<?php
                        if($_SESSION['active_module']=='CSSA'){
                            echo 'active';
                        }
                        ?>">
                        <a href="../CSSA/cssa_home.php"><i class="fa fa-fw fa-black-tie"></i> CSSA</a>
                    </li>
                    <li class="<?php
                        if($_SESSION['active_module']=='INVT'){
                            echo 'active';
                        }
                    ?>">
                        <a href="../Inventory/index.php"><i class="fa fa-fw fa-sitemap"></i> Inventory</a>
                    </li>
                    <li class="<?php
                        if($_SESSION['active_module']=='TASK'){
                            echo 'active';
                        }
                    ?>">
                        <a href="../Task/infrastructure_main.php"><i class="fa fa-fw fa-list"></i> Tasks</a>
                    </li>
                    <li class="<?php
                        if($_SESSION['active_module']=='TRAVEL'){
                            echo 'active';
                        }
                    ?>">
                        <a href="../Travel/travel_home.php"><i class="fa fa-fw fa-plane"></i> Travel</a>
                    </li>
                    <li class="<?php
                        if($_SESSION['active_module']=='SERVICE'){
                            echo 'active';
                        }
                    ?>">
                        <a href="../Service/"><i class="fa fa-fw fa-cog"></i> Service</a>
                    </li>

          <!--
          <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#demo">
                    <i class="fa fa-hand-paper-o"></i>Attendance <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="demo" class="collapse">
                                <li class="dropdown">
                <a href="<?php echo $path;?>Attendence/attendence_main_page.php">
                    <span><i class="fa fa-hand-paper-o"></i>Take Attendance</span>
                </a>
            </li>
            <li class=" ">
                <a href="<?php echo $path;?>Attendence/attendence_report2.php">
                    <span><i class="fa fa-hand-paper-o"></i>Generate Report</span>
                </a>
            </li>
                </ul>
            </li>
          -->



         <!-- HR -->
        <li class=" ">
            <a href="<?php echo $path;?>Hr/hr_main_page.php">
                <i class="fa fa-address-card-o"></i>
                <span>HR</span>
            </a>
        </li>

        <!--Accounting -->
        <li class=" ">
            <a href="<?php echo $path;?>Accounting/accounting_main.php">
                <i class="fa fa-calculator"></i>
                <span>Accounting</span>
            </a>
        </li>

        <!-- Calender -->
        <li class=" ">
            <a href="<?php echo $path;?>Calender/Calender.php">
                <i class="fa fa-calendar"></i>
                <span>Calender</span>
            </a>
        </li>

        <!-- MIS -->
        <li class=" ">
            <a href="<?php echo $path;?>Mis/mis_main.php">
                <i class="fa fa-pie-chart"></i>
                <span>MIS</span>
            </a>
        </li>

         <!-- Discussion -->
        <li class=" ">
            <a href="<?php echo $path;?>Discussion/discussion_main.php">
                <i class="fa fa-comments"></i>
                <span>Discussion</span>
            </a>
        </li>

        <!-- Work Diary
        <li class=" ">
            <a href="<?php echo $path;?>WorkDiary/work_diary_main.php">
                <i class="fa fa-book"></i>
                <span>Work Diary</span>
            </a>
        </li>
        -->

    <!-- PROFILE -->
        <li class=" ">
            <a href="<?php echo $path;?>Profile/profile.php">
                <i class="fa fa-user"></i>
                <span>Profile</span>
            </a>
        </li>

		<!-- Infrastructure -->
        <li class=" ">
            <a href="<?php echo $path;?>Infrastructure/infrastructure_main.php">
                <i class="fa fa-puzzle-piece"></i>
                <span>Infrastructure</span>
            </a>
        </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">
