<!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li>
                        <a href="../public/Home" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-label">Dashboard</span>
                        </a>
                    </li>
				
					<?php
					if($_SESSION['access']==4)
						{
							?>
							 <li>
                        <a class="has-arrow" href="purchase_product.php" >
                            <i class="icon-paper-plane menu-icon"></i><span class="nav-text">Purchase Product</span>
                        </a>
						</li> 
						 <li>
                        <a class="has-arrow" href="user_profile.php" >
                            <i class="icon-paper-plane menu-icon"></i><span class="nav-text">My Profile</span>
                        </a>
						</li> 
						<li>
                        <a class="has-arrow" href="my_order.php" >
                            <i class="icon-support menu-icon"></i><span class="nav-text">My Orders</span>
                        </a>
						</li> 
						
							<?php
						}
					$page_datas=$obj->select_any("tbl_pages","1");
					$iconArray=array('icon-cursor','icon-menu','icon-folder','icon-support','icon-paper-clip','icon-paper-plane');
					$IconCount=count($iconArray);
					$count=0;
					foreach($page_datas as $page_data)
					{
						if($page_data['module']=='student details' || $page_data['module']=='teacher details'|| $page_data['module']=='manage_employee')
						{
						if($_SESSION['access']==2 || $_SESSION['access']==1)
						{
							?>
							 <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="<?=$iconArray[$count];?> menu-icon"></i><span class="nav-text"><?=ucwords($page_data['module']);?></span>
                        </a>
						<ul aria-expanded="false">
						<?php
					if($page_data['pages']!='' ||$page_data['pages']=='[]')
					{
						?>
						 
						<?php
					$Module_Name=str_replace(" ","_",$page_data['module']);
					$page_data_detaiils=json_decode($page_data['pages'],true);
					foreach($page_data_detaiils as $page_data_detaiils_single)
					{
						$file_name=str_replace(' ','_',$page_data_detaiils_single['page_name']);
						?>
					
                       
                            <li><a href="../public/<?=$Module_Name;?>-<?=$file_name;?>"><?=ucwords($page_data_detaiils_single['page_name']);?></a></li>
                           
                       
                    
					<?php
					}
					?>
					
					<?php
					}
					?>
					 </ul>
					</li>
					<?php
					$count++;
						if($count==$IconCount)
						{
							$count=0;
						}
						}
						}
						else
						{
							if($_SESSION['access']==3  )
						{
							if($page_data['module']=='manage work')
							{
							?>
							 <li>
                        <a class="has-arrow" href="manage-work" >
                            <i class="<?=$iconArray[$count];?> menu-icon"></i><span class="nav-text">My works</span>
                        </a>
						</li> 
						<li>
                        <a class="has-arrow" href="employee-leave" >
                            <i class="<?=$iconArray[$count];?> menu-icon"></i><span class="nav-text">Manage Leave</span>
                        </a>
						</li>
						<li>
                        <a class="has-arrow" href="manage-product" >
                            <i class="<?=$iconArray[$count];?> menu-icon"></i><span class="nav-text">Manage Product</span>
                        </a>
						</li>
						
						<li>
                        <a class="has-arrow" href="stock_entry.php" >
                            <i class="<?=$iconArray[$count];?> menu-icon"></i><span class="nav-text">Manage Stock</span>
                        </a>
						</li>
						<li>
                        <a class="has-arrow" href="damage_entry.php" >
                            <i class="<?=$iconArray[$count];?> menu-icon"></i><span class="nav-text">Manage Damage</span>
                        </a>
						</li>
							
							<?php
							}
						}
						else if($_SESSION['access']==2)
						{
						?>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="<?=$iconArray[$count];?> menu-icon"></i><span class="nav-text"><?=ucwords($page_data['module']);?></span>
                        </a>
						
                        <ul aria-expanded="false">
						<?php
					if($page_data['pages']!='' ||$page_data['pages']=='[]')
					{
					$Module_Name=str_replace(" ","_",$page_data['module']);
					$page_data_detaiils=json_decode($page_data['pages'],true);
					foreach($page_data_detaiils as $page_data_detaiils_single)
					{
						$file_name=str_replace(' ','_',$page_data_detaiils_single['page_name']);
						?>
					
                            <li><a href="../public/<?=$Module_Name;?>-<?=$file_name;?>"><?=ucwords($page_data_detaiils_single['page_name']);?></a></li>
                            <!-- <li><a href="./index-2.html">Home 2</a></li> -->
                       
                    
					<?php
					}
					}
					?>
					 </ul>
					</li>
					
					
					<?php
						}
					$count++;
						if($count==$IconCount)
						{
							$count=0;
						}
						if($action_flag==0)
						{
							if($_SESSION['access']==2)
						{
						?>
							
						<li>
                        <a class="has-arrow" href="manage_product-add_new_product?flag" >
                            <i class="<?=$iconArray[$count];?> menu-icon"></i><span class="nav-text">View All products</span>
                        </a>
						</li>
						<?php
						$count++;
						if($count==$IconCount)
						{
							$count=0;
						}
						
						?>
						<li>
                        <a class="has-arrow" href="stock_entry_manage_stock.php?flag" >
                            <i class="<?=$iconArray[$count];?> menu-icon"></i><span class="nav-text">Manage Stock</span>
                        </a>
						</li>
						<?php
						$count++;
						if($count==$IconCount)
						{
							$count=0;
						}
						?>
						<li>
                        <a class="has-arrow" href="damage_entry_manage_damage.php?flag" >
                            <i class="<?=$iconArray[$count];?> menu-icon"></i><span class="nav-text">Manage Damage</span>
                        </a>
						</li>
						<?php
						}
						$action_flag++;
						}
						}
						
					}
					?>
					
					
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************--> 