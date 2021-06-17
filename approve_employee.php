		   <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="Home">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="manage_employee"><?=ucwords('manage employee');?></a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Approve Employee</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
			<div class="container-fluid">
				
		
				
				<div class="row">
						 <div class="col-lg-12">
						   <div class="card" style="overflow-x:auto;">
								<div class="card-body" id="UserTable">
									<h4 class="card-title">Approve Employee</h4>
										<table id="example" class="display nowrap" cellspacing="0" width="100%">
											<thead>
												<tr>
												<th>Si No</th>
													
<th>name</th>
<th>email</th>

<th>Action</th>
												</tr>
											</thead>
											<tbody>
											<?php
											$formDataFull=$obj->select_any("tbl_manage_employee_add_new_employee,tbl_login_info","tbl_login_info.login_info_id=tbl_manage_employee_add_new_employee.manage_employee_add_new_employee_id and tbl_login_info.status=1  order by tbl_manage_employee_add_new_employee.manage_employee_add_new_employee_id DESC");
											$count=1;
											if(!empty($formDataFull))
											{
											foreach($formDataFull as $formDataSingle)
											{
											
											?>
											<tr>
											<td><?=$count;?></th>
											
<td><?=$formDataSingle['name'];?></td>
<td><?=$formDataSingle['email'];?></td>
													
													<td><a href="#" onclick="approve(<?=$formDataSingle['manage_employee_add_new_employee_id'];?>,<?=($count-1);?>);" class="btn btn-danger"><i class="fa fa-edit color-danger"></i>Approve</a></td>
												
		
		
											</tr>
											<?php
											$count++;
											}
											}
											?>
											</tbody>
										</table>

								</div>
							</div>
						</div>
				</div>
				
			</div>
            <!-- #/ container -->
        </div>
		
        <!--**********************************
            Content body end
        ***********************************--> 
		<script>
		var IndexIncrement=<?=count($formDataFull);?>
		</script>