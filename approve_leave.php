		   <!--**********************************
            Content body start
        ***********************************-->
		<?php
		
		$tableName="tbl_employee_leave_leave_application";
		if(isset($_GET['approve']))
		{
			$con=array('employee_leave_leave_application_id'=>$_GET['approve']);
			$data=array('status'=>1);
	        $result=$obj->updatetbl($data,$tableName,$con);
			
		}
		if(isset($_GET['reject']))
		{
			$con=array('employee_leave_leave_application_id'=>$_GET['reject']);
			$data=array('status'=>2);
	        $result=$obj->updatetbl($data,$tableName,$con);
			
		}
		?>
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="Home">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="employee_leave"><?=ucwords('employee leave');?></a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)"><?=ucwords('Leave Application');?></a></li>
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
													
<th>Approve</th>									
<th>Reject</th>								
<th>employee</th>
<th>leave type</th>
<th>leave reason</th>
<th>start date</th>
<th>end date</th>
												</tr>
											</thead>
											<tbody>
											<?php
											$formDataFull=$obj->select_any("tbl_employee_leave_leave_application","status=0 order by employee_leave_leave_application_id DESC");
											$count=1;
											if(!empty($formDataFull))
											{
											foreach($formDataFull as $formDataSingle)
											{
											
											?>
											<tr>
											<td><?=$count;?></th>
<td><a class="btn btn-success" href="?approve=<?=$formDataSingle['employee_leave_leave_application_id'];?>">Approve</a> 
</td>	
<td><a class="btn btn-danger" href="?reject=<?=$formDataSingle['employee_leave_leave_application_id'];?>">Reject</a>
</td>											
<?php
$employee=$obj->select_any_one("tbl_manage_employee_add_new_employee","manage_employee_add_new_employee_id='".$formDataSingle['employee']."'");
?>
<td><?=$employee['name'];?></td>
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