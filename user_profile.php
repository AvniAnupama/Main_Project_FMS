		   <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="Home">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="customer"><?=ucwords('customer');?></a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)"><?=ucwords('My Profile');?></a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
			<div class="container-fluid">
		
				<div class="row">
				
					 <div class="col-lg-12">
					 
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><?=ucwords('Update Profile');?></h4>
                                
                                <div class="basic-form" >
								
                                    <form enctype="multipart/form-data"  method="POST" id="form" action="../customer/Action/Actioncustomer_customer_registration">
										<div id="UserFormUpdate">
												<?php
										$_GET['edit_id']=$_SESSION['user_id'];
										if(isset($_GET['edit_id']))
										{
											$formDataEdit=$obj->select_any_one("tbl_customer_customer_registration","customer_customer_registration_id='".$_GET['edit_id']."'");
										}
										?>
										
<div class="form-group">
<label>name:</label>
<input required type="text" name="name" value="<?=(isset($formDataEdit['name']))?$formDataEdit['name']:'';?>" class="form-control input-default">
</div>
<div class="form-group">
<label>email:</label>
<input readonly required type="email" name="email" value="<?=(isset($formDataEdit['email']))?$formDataEdit['email']:'';?>" class="form-control input-default">
</div>
<div class="form-group">
<label>phone:</label>
<input  type="number" name="phone" value="<?=(isset($formDataEdit['phone']))?$formDataEdit['phone']:'';?>" class="form-control input-default">
</div>
<div class="form-group">
<label>address:</label>
<textarea  name="address"  class="form-control input-default"><?=(isset($formDataEdit['address']))?$formDataEdit['address']:'';?></textarea>
</div>
<div class="form-group">
<label>aadhar number:</label>
<input required type="number" name="aadhar_number" value="<?=(isset($formDataEdit['aadhar_number']))?$formDataEdit['aadhar_number']:'';?>" class="form-control input-default">
</div>
<div class="form-group">
<label>company license:</label>
<input  type="text" name="company_license" value="<?=(isset($formDataEdit['company_license']))?$formDataEdit['company_license']:'';?>" class="form-control input-default">
</div>
<div class="form-group">
<label>photo:</label>
<input <?=(isset($formDataEdit['photo']))?'':'required';?> accept="image/*" type="file" name="photo"  class="form-control input-default">
<input type="hidden" name="photo_file_dummy" value="<?=(isset($formDataEdit['photo']))?$formDataEdit['photo']:'';?>">
</div>
										<?php
										if(isset($_GET['edit_id']))
										{
											?>
												<input type="hidden" value="<?=(isset($formDataEdit['customer_customer_registration_id']))?$formDataEdit['customer_customer_registration_id']:'';?>"  name="update">
									
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
				
				
			</div>
            <!-- #/ container -->
        </div>
		
        <!--**********************************
            Content body end
        ***********************************--> 
		<script>
		var IndexIncrement=<?=count($formDataFull);?>
		</script>