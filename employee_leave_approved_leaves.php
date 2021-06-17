		   <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="Home">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="employee leave"><?=ucwords('employee leave');?></a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)"><?=ucwords('Approved Leaves');?></a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
			<div class="container-fluid">
				
				
				<div class="row">
						 <div class="col-lg-12">
						   <div class="card" style="overflow-x:auto;">
								<div class="card-body" id="UserTable">
									<h4 class="card-title">Table</h4>
										<table id="example" class="display nowrap" cellspacing="0" width="100%">
											<thead>
												<tr>
												<th>Si No</th>
													
					
<th>leave type</th>
<th>leave reason</th>
<th>start date</th>
<th>end date</th>
												</tr>
											</thead>
											<tbody>
											<?php
											if($_SESSION['access']==3)
											{
													$formDataFull=$obj->select_any("tbl_employee_leave_leave_application","employee=".$_SESSION['user_id']." and status=1 order by employee_leave_leave_application_id DESC");
											}
											else
											{
											$formDataFull=$obj->select_any("tbl_employee_leave_leave_application","status=1 order by employee_leave_leave_application_id DESC");
											}
											$count=1;
											if(!empty($formDataFull))
											{
											foreach($formDataFull as $formDataSingle)
											{
											
											?>
											<tr>
											<td><?=$count;?></th>
											
<?php
$employee=$obj->select_any_one("tbl_manage_employee_add_new_employee","manage_employee_add_new_employee_id='".$formDataSingle['employee']."'");
?>
<!--<td><?=$employee['manage_employee_add_new_employee_id'];?></td>-->
<?php
$leave_type=$obj->select_any_one("tbl_employee_leave_leave_types","employee_leave_leave_types_id='".$formDataSingle['leave_type']."'");
?>
<td><?=$leave_type['type'];?></td>
<td><?=$formDataSingle['leave_reason'];?></td>
<td><?=$formDataSingle['start_date'];?></td>
<td><?=$formDataSingle['end_date'];?></td>	
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