		   <!--**********************************
            Content body start
        ***********************************-->
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
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><?=ucwords('Leave Application');?></h4>
                                
                                <div class="basic-form" >
								
                                    <form enctype="multipart/form-data"  method="POST"  action="../employee leave/Action/Actionemployee_leave_leave_application.php">
										<div id="UserFormUpdate">
										<?php
										if(isset($_GET['edit_id']))
										{
											$formDataEdit=$obj->select_any_one("tbl_employee_leave_leave_application","employee_leave_leave_application_id='".$_GET['edit_id']."'");
										}
										if($_SESSION['access']==2)
						{
										?>
										
								<div class="form-group">
								<label>Employee :</label>
								<select required class="form-control input-default" name="employee">
								<?php
								$employee_data=$obj->select_any("tbl_manage_employee_add_new_employee","manage_employee_add_new_employee_id=".$_SESSION['user_id']."");
								foreach($employee_data as $employee_data_single)
								{
								?>
								<option selected <?=(isset($formDataEdit))?(($formDataEdit['employee']==$employee_data_single['manage_employee_add_new_employee_id'])?'selected':''):'';?> value="<?=$employee_data_single['manage_employee_add_new_employee_id'];?>"><?=$employee_data_single['name'];?></option>
								<?php	
								}
								?>
								</select>
								</div>
								<?php
						}
						else{
							?>
							<div class="form-group">
								<label>Employee :</label>
								<select required class="form-control input-default" name="employee">
								<?php
								$employee_data=$obj->select_any("tbl_manage_employee_add_new_employee","manage_employee_add_new_employee_id=".$_SESSION['user_id']."");
								foreach($employee_data as $employee_data_single)
								{
								?>
								<option selected <?=(isset($formDataEdit))?(($formDataEdit['employee']==$employee_data_single['manage_employee_add_new_employee_id'])?'selected':''):'';?> value="<?=$employee_data_single['manage_employee_add_new_employee_id'];?>"><?=$employee_data_single['manage_employee_add_new_employee_id'];?></option>
								<?php	
								}
								?>
								</select>
								</div>
							<?php
						}
?>
<div class="form-group">
<label>leave type:</label>
<select required class="form-control input-default" name="leave_type">
<option value="">Choose your option</option>
<?php
$leave_type_data=$obj->select_any("tbl_employee_leave_leave_types","1");
foreach($leave_type_data as $leave_type_data_single)
{
?>
<option <?=(isset($formDataEdit))?(($formDataEdit['leave_type']==$leave_type_data_single['employee_leave_leave_types_id'])?'selected':''):'';?> value="<?=$leave_type_data_single['employee_leave_leave_types_id'];?>"><?=$leave_type_data_single['type'];?></option>
<?php	
}
?>
</select>
</div>
<div class="form-group">
<label>leave reason:</label>
<textarea  name="leave_reason"  class="form-control input-default"><?=(isset($formDataEdit['leave_reason']))?$formDataEdit['leave_reason']:'';?></textarea>
</div>
<div class="form-group">
<label>start date:</label>
<input onchange="setMin(this.value);" min="<?=date('Y-m-d');?>" required value="<?=(isset($formDataEdit['start_date']))?$formDataEdit['start_date']:'';?>"  type="date" name="start_date"  class="form-control input-default">
</div>
<div class="form-group">
<label>end date:</label>
<input required id="enddate" value="<?=(isset($formDataEdit['end_date']))?$formDataEdit['end_date']:'';?>"  type="date" name="end_date"  class="form-control input-default">
</div>
										<?php
										if(isset($_GET['edit_id']))
										{
											?>
												<input type="hidden" value="<?=(isset($formDataEdit['employee_leave_leave_application_id']))?$formDataEdit['employee_leave_leave_application_id']:'';?>"  name="update">
									
											<?php
										}
										else
										{
											?>
												<input type="hidden" name="Save">
											<?php
										}
										?>
									</div>
									<button type="submit"  class="btn btn-dark">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
					
				</div>
				
				<div class="row">
						 <div class="col-lg-12">
						   <div class="card" style="overflow-x:auto;">
								<div class="card-body" id="UserTable">
									<h4 class="card-title">Table</h4>
										<table id="example" class="display nowrap" cellspacing="0" width="100%">
											<thead>
												<tr>
												<th>Si No</th>
													
<th>employee</th>
<th>leave type</th>
<th>leave reason</th>
<th>start date</th>
<th>end date</th><th>Edit</th>
<th>Delete</th>
												</tr>
											</thead>
											<tbody>
											<?php
											$formDataFull=$obj->select_any("tbl_employee_leave_leave_application","employee=".$_SESSION['user_id']." order by employee_leave_leave_application_id DESC");
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
<td><?=$employee['name'];?></td>
<?php
$leave_type=$obj->select_any_one("tbl_employee_leave_leave_types","employee_leave_leave_types_id='".$formDataSingle['leave_type']."'");
?>
<td><?=$leave_type['type'];?></td>
<td><?=$formDataSingle['leave_reason'];?></td>
<td><?=$formDataSingle['start_date'];?></td>
<td><?=$formDataSingle['end_date'];?></td>	<td><a href="?edit_id=<?=$formDataSingle['employee_leave_leave_application_id'];?>"><i class="fa fa-edit color-danger"></i></a></td>
	<td><a href="../employee leave/Action/Actionemployee_leave_leave_application.php?employee_leave_leave_application_id=<?=$formDataSingle['employee_leave_leave_application_id'];?>"><button class="btn btn-danger">Delete</button></a></td>
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
		function setMin(val)
		{
			$("#enddate").attr("min",val);
			
		}
		var IndexIncrement=<?=count($formDataFull);?>
		</script>