		   <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="Home">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="manage_employee"><?=ucwords('manage employee');?></a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)"><?=ucwords('Add New Employee');?></a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
			<div class="container-fluid">
				
			
				
				<div class="row">
				 <form enctype="multipart/form-data"  method="POST" id="form" action="../manage employee/Action/Actionmanage_employee_add_new_employee">
								
                                    </form>
						 <div class="col-lg-12">
						   <div class="card" style="overflow-x:auto;">
								<div class="card-body" id="UserTable">
									<h4 class="card-title">Table</h4>
										<table id="example" class="display nowrap" cellspacing="0" width="100%">
											<thead>
												<tr>
												<th>Si No</th>
													
<th>name</th>
<th>email</th>
<th>phone</th>
<th>address</th>
<th>photo</th>
<th>date of birth</th>
<th>blood group</th>
<th>department</th>
<th>position</th>
<th>emergency contact person</th>
<th>emergency contact number</th>
<th>employee status</th>
<th>Edit</th>
<th>Delete</th>
												</tr>
											</thead>
											<tbody>
											<?php
											$formDataFull=$obj->select_any("tbl_manage_employee_add_new_employee","1 order by manage_employee_add_new_employee_id DESC");
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
<td><?=$formDataSingle['phone'];?></td>
<td><?=$formDataSingle['address'];?></td>
<?php
if(!empty($formDataSingle['photo']))
{
?>
<td><img src="<?=$formDataSingle['photo'];?>" width="100px" height="100px"></td>
<?php
}
else
{
?>
<td><?=$formDataSingle['photo'];?></td>
<?php
}
?>
<td><?=$formDataSingle['date_of_birth'];?></td>
<?php
$blood_group=$obj->select_any_one("tbl_manage_employee_add_new_employee_blood_group","".str_replace('tbl_','','tbl_manage_employee_add_new_employee')."_blood_group_id='".$formDataSingle['blood_group']."'");
?>
<td><?=$blood_group['value'];?></td>



<?php
$blood_group=$obj->select_any_one("tbl_manage_employee_department","".str_replace('tbl_','','tbl_manage_employee_department')."_id='".$formDataSingle['department']."'");
?>
<td><?=$blood_group['department_name'];?></td>
<?php
$blood_group=$obj->select_any_one("tbl_manage_employee_staff_positions","".str_replace('tbl_','','tbl_manage_employee_staff_positions')."_id='".$formDataSingle['position']."'");
?>
<td><?=$blood_group['position'];?></td>

<td><?=$formDataSingle['emergency_contact_person'];?></td>
<td><?=$formDataSingle['emergency_contact_number'];?></td>
<?php
$employee_status=$obj->select_any_one("tbl_manage_employee_add_new_employee_employee_status","".str_replace('tbl_','','tbl_manage_employee_add_new_employee')."_employee_status_id='".$formDataSingle['employee_status']."'");
?>
<td><?=$employee_status['value'];?></td>													
													
													<td><a class="btn btn-Primary" href="employee_reg.php?edit_id=<?=$formDataSingle['manage_employee_add_new_employee_id'];?>">Edit</a></td>							
													<td><a href="#" onclick="UserDelete(<?=$formDataSingle['manage_employee_add_new_employee_id'];?>,<?=($count-1);?>);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><button class="btn btn-danger">Delete</button></a></td>
		
		
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