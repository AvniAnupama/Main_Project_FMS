		   <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="Home">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Module</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
				<div class="row">
						<?php
						if($_SESSION['access']==2)
						{
						?>
						
						<?php
						}
						?>
					<?php
					$module_data=$obj->select_any_one("tbl_menu","1");
					$module_data_detaiils=json_decode($module_data['deatils'],true);
					$iconArray=array('fa-th-large','fa-ge','fa-folder','fa-support','fa-paperclip','fa-ravelry','fa-barcode','fa-bolt','fa-book','fa-braille','fa-bullseye');
					$IconCount=count($iconArray);
					$count=0;
					if(isset($module_data_detaiils))
					{
					foreach($module_data_detaiils as $module_data_detaiils_single)
					{
						
						if($_SESSION['access']==3  )
						{
							if($module_data_detaiils_single['module_item']=='manage work')
							{
								?>
								<!--<div class="col-lg-3 col-sm-6" onclick="location.href='manage-work'">
								<div class="card gradient-3">
									<div class="card-body">
										<center>
										<h3 class="card-title text-white">My Work</h3>
										
											<h2 class="text-white"><i class="fa <?=$iconArray[$count];?>"></i></h2>
											
										</center>
										
									</div>
								</div>
							</div>-->	
							<div class="col-lg-3 col-sm-6" onclick="location.href='employee-leave'">
								<div class="card gradient-3">
									<div class="card-body">
										<center>
										<h3 class="card-title text-white">Manage leave</h3>
										
											<h2 class="text-white"><i class="fa <?=$iconArray[$count];?>"></i></h2>
											
										</center>
										
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6" onclick="location.href='manage-product'">
								<div class="card gradient-3">
									<div class="card-body">
										<center>
										<h3 class="card-title text-white">Manage Product</h3>
										
											<h2 class="text-white"><i class="fa <?=$iconArray[$count];?>"></i></h2>
											
										</center>
										
									</div>
								</div>
							</div>
							
							<div class="col-lg-3 col-sm-6" onclick="location.href='stock_entry_manage_stock.php'">
								<div class="card gradient-3">
									<div class="card-body">
										<center>
										<h3 class="card-title text-white">Stock Entry</h3>
										
											<h2 class="text-white"><i class="fa fa-barcode"></i></h2>
											
										</center>
										
									</div>
								</div>
							</div>
							
							<div class="col-lg-3 col-sm-6" onclick="location.href='damage_entry_manage_damage.php'">
								<div class="card gradient-3">
									<div class="card-body">
										<center>
										<h3 class="card-title text-white">Damage Entry</h3>
										
											<h2 class="text-white"><i class="fa fa-book"></i></h2>
											
										</center>
										
									</div>
								</div>
							</div>
							
							

							
								<?php
							}
						}
							else if($_SESSION['access']==2)
							{
						$file_name=str_replace(' ','-',$module_data_detaiils_single['module_item']);
						if($module_data_detaiils_single['module_item']=='manage work')
							{
							}
							else{
						?>
							<div class="col-lg-3 col-sm-6" onclick="location.href='<?=$file_name;?>'">
								<div class="card gradient-3">
									<div class="card-body">
										<center>
										<h3 class="card-title text-white"><?=ucwords($module_data_detaiils_single['module_item']);?></h3>
										
											<h2 class="text-white"><i class="fa <?=$iconArray[$count];?>"></i></h2>
											
										</center>
										
									</div>
								</div>
							</div>
						
						<?php
							}
							}
						$count++;
						if($count==$IconCount)
						{
							$count=0;
						}
					}
					}
					if($_SESSION['access']==2 || $_SESSION['access']==1)
						{
							?>
								<div class="col-lg-3 col-sm-6" onclick="location.href='customer_dashboard.php'">
								<div class="card gradient-3">
									<div class="card-body">
										<center>
										<h3 class="card-title text-white">Manage Customer</h3>
										
											<h2 class="text-white"><i class="fa fa-users"></i></h2>
											
										</center>
										
									</div>
								</div>
							</div>
									<div class="col-lg-3 col-sm-6" onclick="location.href='manage_product-add_new_product?flag'">
								<div class="card gradient-3">
									<div class="card-body">
										<center>
										<h3 class="card-title text-white">View All Product</h3>
										
											<h2 class="text-white"><i class="fa <?=$iconArray[$count];?>"></i></h2>
											
										</center>
										
									</div>
								</div>
							</div>
							
							
								<div class="col-lg-3 col-sm-6" onclick="location.href='sales_report.php'">
								<div class="card gradient-3">
									<div class="card-body">
										<center>
										<h3 class="card-title text-white">Sales Report</h3>
										
											<h2 class="text-white"><i class="fa <?=$iconArray[0];?>"></i></h2>
											
										</center>
										
									</div>
								</div>
							</div>
							
							
							<div class="col-lg-3 col-sm-6" onclick="location.href='stock_entry_manage_stock.php?flag'">
								<div class="card gradient-3">
									<div class="card-body">
										<center>
										<h3 class="card-title text-white">Manage Stock</h3>
										
											<h2 class="text-white"><i class="fa fa-barcode"></i></h2>
											
										</center>
										
									</div>
								</div>
							</div>
							
							<div class="col-lg-3 col-sm-6" onclick="location.href='damage_entry_manage_damage.php?flag'">
								<div class="card gradient-3">
									<div class="card-body">
										<center>
										<h3 class="card-title text-white">Manage damage</h3>
										
											<h2 class="text-white"><i class="fa fa-book"></i></h2>
											
										</center>
										
									</div>
								</div>
							</div>
							<?php
						}
						if($_SESSION['access']==4)
						{
					?>
						<div class="col-lg-3 col-sm-6" onclick="location.href='purchase_product.php'">
								<div class="card gradient-3">
									<div class="card-body">
										<center>
										<h3 class="card-title text-white">Purchase Product</h3>
										
											<h2 class="text-white"><i class="fa fa-shopping-cart"></i></h2>
											
										</center>
										
									</div>
								</div>
							</div>	
							<div class="col-lg-3 col-sm-6" onclick="location.href='user_profile.php'">
								<div class="card gradient-3">
									<div class="card-body">
										<center>
										<h3 class="card-title text-white">My Profile</h3>
										
											<h2 class="text-white"><i class="fa fa-user"></i></h2>
											
										</center>
										
									</div>
								</div>
							</div>
				
				
				<?php
				
						}
				?>
				
				</div>
				
			</div>
            <!-- #/ container -->
        </div>  
		
		<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleData"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <p><b id="myDetails"></b></p>
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>
<script>
function getAllData(data,val)
{
	$('#myDetails').html(data);
	$('#titleData').html(val);

}
</script>