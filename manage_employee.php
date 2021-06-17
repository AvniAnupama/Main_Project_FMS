		   <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="Home">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">manage employee</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
				 <div class="container-fluid">
				<div class="row">
				<?php
						if($_SESSION['access']==1)
						{
						?>
						<div class="col-lg-3 col-sm-6" onclick="location.href='Pages?module=manage employee'">
							<div class="card gradient-1">
								<div class="card-body">
									<h3 class="card-title text-white">Create Pages</h3>
									<center>
										<h2 class="text-white"><i class="fa fa-book"></i></h2>
										
									</center>
									
								</div>
							</div>
						</div>
						
					<?php
						}
						?>
						<div class="col-lg-3 col-sm-6" onclick="location.href='employee_approval.php'">
							<div class="card gradient-1">
								<div class="card-body">
									<h3 class="card-title text-white">Approve Employee</h3>
									<center>
										<h2 class="text-white"><i class="fa fa-user"></i></h2>
										
									</center>
									
								</div>
							</div>
						</div>
						
						<div class="col-lg-3 col-sm-6" onclick="location.href='employee_reg.php'">
							<div class="card gradient-3">
								<div class="card-body">
									<h3 class="card-title text-white">Add New Employee</h3>
									<center>
										<h2 class="text-white"><i class="fa fa-users"></i></h2>
										
									</center>
									
								</div>
							</div>
						</div>
						<?php
					$page_data=$obj->select_any_one("tbl_pages","module='manage employee'");
					if($page_data['pages']!='' ||$page_data['pages']=='[]')
					{
					$Module_Name=str_replace(" ","_","manage employee");
					$page_data_detaiils=json_decode($page_data['pages'],true);
					$iconArray=array('fa-th-large','fa-ge','fa-folder','fa-support','fa-paperclip','fa-ravelry','fa-barcode','fa-bolt','fa-book','fa-braille','fa-bullseye');
					$IconCount=count($iconArray);
					$count=0;
					foreach($page_data_detaiils as $page_data_detaiils_single)
					{
						$file_name=str_replace(' ','_',$page_data_detaiils_single['page_name']);
						if($file_name=='add_new_employee')
						{
						$page_data_detaiils_single['page_name']="Employee Details";	
						}
						?>
							<div class="col-lg-3 col-sm-6" onclick="location.href='<?=$Module_Name;?>-<?=$file_name;?>'">
								<div class="card gradient-2">
									<div class="card-body">
										<center><h3 class="card-title text-white"><?=ucwords($page_data_detaiils_single['page_name']);?></h3>
										
											<h2 class="text-white"><i class="fa <?=$iconArray[$count];?>"></i></h2>
											
										</center>
										
									</div>
								</div>
							</div>
						
						<?php
						$count++;
						if($count==$IconCount)
						{
							$count=0;
						}
					}
					}
					?>
				
				</div>
			</div>
				
			</div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->  
