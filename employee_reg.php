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
								
							<div class="col-lg-12">
						   <div class="card" style="overflow-x:auto;">
								<div class="card-body" >
							
                                <h4 class="card-title">Employee Registration</h4>
                                <br>
                                <div class="basic-form" >
								
                                    <form enctype="multipart/form-data"  method="POST" id="form" action="../manage employee/Action/Actionmanage_employee_add_new_employee">
										<div id="UserFormUpdate">
										<?php
										if(isset($_GET['edit_id']))
										{
											$formDataEdit=$obj->select_any_one("tbl_manage_employee_add_new_employee","manage_employee_add_new_employee_id='".$_GET['edit_id']."'");
										}
										?>
										
<div class="form-group">
<label>Name:</label>
<input  type="text" name="name" value="<?=(isset($formDataEdit['name']))?$formDataEdit['name']:'';?>" class="form-control input-default" required pattern="^[A-Za-z -]+$" title="please enter a name" oninput="if (typeof this.reportValidity === 'function') {this.reportValidity();}">
</div>
<div class="form-group">
<label>Email:</label>
<input  type="email" name="email" value="<?=(isset($formDataEdit['email']))?$formDataEdit['email']:'';?>" class="form-control input-default" required title="please enter a valid email id" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" oninput="if (typeof this.reportValidity === 'function') {this.reportValidity();}">
</div>
<div class="form-group">
<label>Phone:</label>
<input  type="text" name="phone" value="<?=(isset($formDataEdit['phone']))?$formDataEdit['phone']:'';?>" class="form-control input-default" required title="please enter a valid phone number" pattern="^(\+91[\-\s]?)?[0]?(91)?[56789]\d{9}$" oninput="if (typeof this.reportValidity === 'function') {this.reportValidity();}">
</div>
<div class="form-group">
<label>Address:</label>
<textarea  name="address"  class="form-control input-default"><?=(isset($formDataEdit['address']))?$formDataEdit['address']:'';?></textarea>
</div>
<div class="form-group">
<label>Photo:</label>
<input <?=(isset($formDataEdit['photo']))?'':'';?> accept="image/*" type="file" name="photo"  class="form-control input-default">
<input type="hidden" name="photo_file_dummy" value="<?=(isset($formDataEdit['photo']))?$formDataEdit['photo']:'';?>">
</div>
<div class="form-group">
<label>Date of birth:</label>
<input  value="<?=(isset($formDataEdit['date_of_birth']))?$formDataEdit['date_of_birth']:'';?>"  type="date" name="date_of_birth"  class="form-control input-default">
</div>
<div class="form-group">
<label>Blood group:</label>
<select  class="form-control input-default" name="blood_group">
<option value="">Choose your option</option>
<?php
$blood_group_data=$obj->select_any("tbl_manage_employee_add_new_employee_blood_group","1");
foreach($blood_group_data as $blood_group_data_single)
{
?>
<option <?=(isset($formDataEdit))?(($formDataEdit['blood_group']==$blood_group_data_single['manage_employee_add_new_employee_blood_group_id'])?'selected':''):'';?> value="<?=$blood_group_data_single['manage_employee_add_new_employee_blood_group_id'];?>"><?=$blood_group_data_single['value'];?></option>
<?php	
}
?>
</select>
</div>

<div class="form-group">
<label class="test-primary">Department:</label>
<select  class="form-control input-default" name="department">
<option value="">Choose your option</option>
<?php
$blood_group_data=$obj->select_any("tbl_manage_employee_department","1");
foreach($blood_group_data as $blood_group_data_single)
{
?>
<option <?=(isset($formDataEdit))?(($formDataEdit['department']==$blood_group_data_single['manage_employee_department_id'])?'selected':''):'';?> value="<?=$blood_group_data_single['manage_employee_department_id'];?>"><?=$blood_group_data_single['department_name'];?></option>
<?php	
}
?>
</select>
</div>

<div class="form-group">
<label>Position:</label>
<select  class="form-control input-default" name="position">
<option value="">Choose your option</option>
<?php
$blood_group_data=$obj->select_any("tbl_manage_employee_staff_positions","1");
foreach($blood_group_data as $blood_group_data_single)
{
?>
<option <?=(isset($formDataEdit))?(($formDataEdit['position']==$blood_group_data_single['manage_employee_staff_positions_id'])?'selected':''):'';?> value="<?=$blood_group_data_single['manage_employee_staff_positions_id'];?>"><?=$blood_group_data_single['position'];?></option>
<?php	
}
?>
</select>
</div>


<div class="form-group">
<label>Emergency contact person:</label>
<input required type="text" pattern="^[A-Za-z -]+$" title="please enter a name" oninput="if (typeof this.reportValidity === 'function') {this.reportValidity();}" name="emergency_contact_person" value="<?=(isset($formDataEdit['emergency_contact_person']))?$formDataEdit['emergency_contact_person']:'';?>" class="form-control input-default">
</div>
<div class="form-group">
<label>emergency contact number:</label>
<input required title="please enter a valid phone number" pattern="^(\+91[\-\s]?)?[0]?(91)?[6789]\d{9}$" oninput="if (typeof this.reportValidity === 'function') {this.reportValidity();}" type="text" name="emergency_contact_number" value="<?=(isset($formDataEdit['emergency_contact_number']))?$formDataEdit['emergency_contact_number']:'';?>" class="form-control input-default">
</div>
<div class="form-group">
<input type="hidden" name="employee_status" value="1">
</div>

										<?php
										if(isset($_GET['edit_id']))
										{
											?>
												<input type="hidden" value="<?=(isset($formDataEdit['manage_employee_add_new_employee_id']))?$formDataEdit['manage_employee_add_new_employee_id']:'';?>"  name="update">
									
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
									<button type="submit"   id="formSubmit"  class="btn btn-success">Submit</button>
                 </div>
				 </div>
				 </div>


					
                  </form>
						 
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