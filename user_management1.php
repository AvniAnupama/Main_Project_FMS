		   <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="Home">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="user.php">user</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">User Management</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
			<div class="container-fluid">
				
				<div class="row">
					 <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">User Management</h4>
                                
                                <div class="basic-form" >
								
                                    <form enctype="multipart/form-data"  method="POST" id="form" action="../user/Action/Actionuser_management1">
										<div id="UserFormUpdate">
										<?php
										$_GET['edit_id']=0;
										$_GET['edit_id']=$_SESSION['user_id'];
										if(isset($_GET['edit_id']))
										{
											$formDataEdit=$obj->select_any_one("tbl_login_info","login_info_id='".$_GET['edit_id']."'");
										}
										?>
										<div class="form-group">
										<label>username:</label>
										<input readonly  type="text" required name="username" value="<?=(isset($formDataEdit['username']))?$formDataEdit['username']:'';?>" class="form-control input-default">
										</div>
										<div class="form-group">
										<label>type new Password:</label>
										<input type="password" required name="password"  placeholder="**********"  class="form-control input-default">
										</div>
										<?php
										if($_SESSION['access']==1)
										{
										?>
										<div class="form-group">
										<label>Access :</label>
										<select required  class="form-control input-default" name="category">
										<option value="">Choose your option</option>
										<?php
										$category_data=$obj->select_any("tbl_user_category","1");
										
										foreach($category_data as $category_data_single)
										{
										?>
										<option <?=(isset($formDataEdit))?(($formDataEdit['category']==$category_data_single['user_category_id'])?'selected':''):'';?> value="<?=$category_data_single['user_category_id'];?>"><?=$category_data_single['value'];?></option>
										<?php	
										}
										?>
										</select>
										</div>
										<?php
										}
										if(isset($_GET['edit_id']))
										{
											?>
												<input type="hidden" value="<?=(isset($formDataEdit['login_info_id']))?$formDataEdit['login_info_id']:'';?>"  name="update">
									
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