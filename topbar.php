<!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="../public/Home">
                    <b class="logo-abbr"><img src="" alt=""> </b>
                   
                    <span class="brand-title" style="color:#fff">
                       Admin Panel
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">    
            <div class="header-content clearfix">
                
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-left">
                    
                </div>
                <div class="header-right">
				
                    <ul class="clearfix" id="refreshNotification">
					<?php
					if(isset($_SESSION['cart_data']))
					{
					?>
                        <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                <span class="badge gradient-1 badge-pill badge-primary"><?=count($_SESSION['cart_data']);?></span>
                            </a>
                            <div class="drop-down animated fadeIn dropdown-menu">
                                <div class="dropdown-content-heading d-flex justify-content-between">
                                    <span class=""><?=count($_SESSION['cart_data']);?> Products</span>  
                                    
                                </div>
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li class="notification-unread">
										<?php
										foreach($_SESSION['cart_data'] as $dataCart)
										{
											$dataAll=$obj->select_any_one("tbl_manage_product_add_new_product","manage_product_add_new_product_id='".$dataCart."'");
											
										?>
                                            <a href="javascript:void()">
                                                <img class="float-left mr-3 avatar-img" src="<?=$dataAll['product_image'];?>" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading"><?=$dataAll['product_title'];?></div>
                                                 
                                                </div>
                                            </a>
											<?php
										}
											?>
											
											<br><br><br>
											 <center>
											 <a href="cutomer_home.php" class="btn btn-success">
                                               View Cart
                                            </a>
											</center>
                                        </li>
                                       
                                    </ul>
                                    
                                </div>
                            </div>
                        </li>
						
						<?php
					}
						$image="images/user/1.png";
						?>
						
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="<?=$image;?>" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile   dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="../public/Change-Password"><i class="icon-user"></i> <span>Change Password</span></a>
                                        </li>
                                       
                                        
                                        <hr class="my-2">
                                        
                                        <li><a href="../public/Logout?logout"><i class="icon-key"></i> <span>Logout</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->   
		