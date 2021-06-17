
                                <h3><b>Customer Registration</b></h3>
								<hr>
								<br>
                                <div class="basic-form" >
								
                                    <form enctype="multipart/form-data"  method="POST" id="form" action="../customer/Action/Actioncustomer_customer_registration">
										<div id="UserFormUpdate">
										<?php
										if(isset($_GET['edit_id']))
										{
											$formDataEdit=$obj->select_any_one("tbl_customer_customer_registration","customer_customer_registration_id='".$_GET['edit_id']."'");
										}
										?>
										
<div class="form-group">
<label>Name:</label>
<input id="name" required type="text" name="name" value="<?=(isset($formDataEdit['name']))?$formDataEdit['name']:'';?>" class="form-control input-default">
</div>
<div class="form-group">
<label>email:</label>
<input  title="please enter a valid email id" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" oninput="data('name','email');if (typeof this.reportValidity === 'function') {this.reportValidity();}" required type="email" name="email" value="<?=(isset($formDataEdit['email']))?$formDataEdit['email']:'';?>" class="form-control input-default" id="email">
</div>
<div class="form-group">
<label>Create password:</label>
<input required type="password" oninput="data('email','password');" id="password" name="password" placeholder="********" class="form-control input-default">
</div>
<div class="form-group">
<label>phone:</label>
<input id="phone" title="please enter a valid phone number" pattern="^(\+91[\-\s]?)?[0]?(91)?[56789]\d{9}$" oninput="data('password','phone');if (typeof this.reportValidity === 'function') {this.reportValidity();}"  type="text" name="phone" value="<?=(isset($formDataEdit['phone']))?$formDataEdit['phone']:'';?>" class="form-control input-default">
</div>
<div class="form-group">
<label>address:</label>
<textarea id="address" oninput="data('phone','address'); " name="address"  class="form-control input-default"><?=(isset($formDataEdit['address']))?$formDataEdit['address']:'';?></textarea>
</div>
<div class="form-group">
<label>aadhar number:</label>
<input id="aadhar" required type="text" name="aadhar_number" value="<?=(isset($formDataEdit['aadhar_number']))?$formDataEdit['aadhar_number']:'';?>" title="please enter a valid aadhar Number with 12 digits" pattern="^[0-9]{4}[ -]?[0-9]{4}[ -]?[0-9]{4}$" oninput="data('address','aadhar'); if (typeof this.reportValidity === 'function') {this.reportValidity();}" class="form-control input-default">
</div>
<div class="form-group">
<label>company license:</label>
<input required oninput="data('aadhar','company_license');"  type="text" name="company_license" value="<?=(isset($formDataEdit['company_license']))?$formDataEdit['company_license']:'';?>" class="form-control input-default">
</div>
<div class="form-group">
<label>photo:</label>
<input oninput="data('company_license','photo');" id="photo" <?=(isset($formDataEdit['photo']))?'':'required';?> accept="image/*" type="file" name="photo"  class="form-control input-default">
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
									<button type="submit"   id="formSubmit"  class="btn btn-dark">Submit</button> <a href="login.php"     class="btn btn-danger">Back to login</a>
                                    </form>
                                </div>
                            
		<script>
		var IndexIncrement=<?=count($formDataFull);?>;
		function data(a,b)
		{
			
			var str1 = $("#"+a+"").val();
			if(b==='phone')
			{
				
				var numberRegex = /^[+-]?\d+(\.\d+)?([eE][+-]?\d+)?$/;
				var value = $("#phone").val();
				if (numberRegex.test(value)) {
				}
				else
				{
				  
				  $("#phone").val($('#phone').val().replace(/\D/g,''));
				  
				}
			}
			if(str1==='')
			{
				swal("Sorry!", "Please fill "+a+"!", "error");
				
				$("#"+b+"").val('');
			}
		}
		</script>