		   <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="Home">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="manage_employee"><?=ucwords('manage employee');?></a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)"><?=ucwords('Department');?></a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
			<div class="container-fluid">
				
				<div class="row">
					 <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><?=ucwords('Department');?></h4>
                                
                                <div class="basic-form" >
								
                                    <form enctype="multipart/form-data"  method="POST" id="form" action="../manage employee/Action/Actionmanage_employee_department">
										<div id="UserFormUpdate">
										<?php
										if(isset($_GET['edit_id']))
										{
											$formDataEdit=$obj->select_any_one("tbl_manage_employee_department","manage_employee_department_id='".$_GET['edit_id']."'");
										}
										?>
										
<div class="form-group">
<label>department name:</label>
<input required type="text" name="department_name" value="<?=(isset($formDataEdit['department_name']))?$formDataEdit['department_name']:'';?>" class="form-control input-default">
</div>
										<?php
										if(isset($_GET['edit_id']))
										{
											?>
												<input type="hidden" value="<?=(isset($formDataEdit['manage_employee_department_id']))?$formDataEdit['manage_employee_department_id']:'';?>"  name="update">
									
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
									<button type="submit"   id="formSubmit"  class="btn btn-dark">Submit</button>
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
													
<th>department name</th><th>Edit</th>
<th>Delete</th>
												</tr>
											</thead>
											<tbody>
											<?php
											$formDataFull=$obj->select_any("tbl_manage_employee_department","1 order by manage_employee_department_id DESC");
											$count=1;
											if(!empty($formDataFull))
											{
											foreach($formDataFull as $formDataSingle)
											{
											
											?>
											<tr>
											<td><?=$count;?></th>
											
<td><?=$formDataSingle['department_name'];?></td>													
													<td><a href="#" onclick="UserEdit(<?=$formDataSingle['manage_employee_department_id'];?>,<?=($count-1);?>);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fa fa-edit color-danger"></i></a></td>
<td><a href="#" onclick="UserDelete(<?=$formDataSingle['manage_employee_department_id'];?>,<?=($count-1);?>);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><button class="btn btn-danger">Delete</button></a></td>
		
		
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