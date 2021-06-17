		   <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="Home">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="basic details"><?=ucwords('basic details');?></a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)"><?=ucwords('Config Details');?></a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
			<div class="container-fluid">
				
				<div class="row">
					 <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><?=ucwords('Config Details');?></h4>
                                
                                <div class="basic-form" >
								
                                    <form enctype="multipart/form-data"  method="POST" id="form" action="../basic details/Action/Actionbasic_details_config_details">
										<div id="UserFormUpdate">
										<?php
										if(isset($_GET['edit_id']))
										{
											$formDataEdit=$obj->select_any_one("tbl_basic_details_config_details","basic_details_config_details_id='".$_GET['edit_id']."'");
										}
										?>
										
<div class="form-group">
<label>favicon logo:</label>
<input <?=(isset($formDataEdit['favicon_logo']))?'':'required';?> accept="image/*" type="file" name="favicon_logo"  class="form-control input-default">
<input type="hidden" name="favicon_logo_file_dummy" value="<?=(isset($formDataEdit['favicon_logo']))?$formDataEdit['favicon_logo']:'';?>">
</div>
<div class="form-group">
<label>logo:</label>
<input <?=(isset($formDataEdit['logo']))?'':'required';?> accept="image/*" type="file" name="logo"  class="form-control input-default">
<input type="hidden" name="logo_file_dummy" value="<?=(isset($formDataEdit['logo']))?$formDataEdit['logo']:'';?>">
</div>
<div class="form-group">
<label>meta details:</label>
<textarea  name="meta_details"  class="form-control input-default"><?=(isset($formDataEdit['meta_details']))?$formDataEdit['meta_details']:'';?></textarea>
</div>
<div class="form-group">
<label>meta keywords:</label>
<textarea  name="meta_keywords"  class="form-control input-default"><?=(isset($formDataEdit['meta_keywords']))?$formDataEdit['meta_keywords']:'';?></textarea>
</div>
<div class="form-group">
<label>page title:</label>
<input required type="text" name="page_title" value="<?=(isset($formDataEdit['page_title']))?$formDataEdit['page_title']:'';?>" class="form-control input-default">
</div>
<div class="form-group">
<label>phone:</label>
<input required type="text" name="phone" value="<?=(isset($formDataEdit['phone']))?$formDataEdit['phone']:'';?>" class="form-control input-default">
</div>
<div class="form-group">
<label>whatsapp:</label>
<input required type="text" name="whatsapp" value="<?=(isset($formDataEdit['whatsapp']))?$formDataEdit['whatsapp']:'';?>" class="form-control input-default">
</div>
<div class="form-group">
<label>email:</label>
<input required type="email" name="email" value="<?=(isset($formDataEdit['email']))?$formDataEdit['email']:'';?>" class="form-control input-default">
</div>
<div class="form-group">
<label>address:</label>
<textarea  name="address"  class="form-control input-default"><?=(isset($formDataEdit['address']))?$formDataEdit['address']:'';?></textarea>
</div>
										<?php
										if(isset($_GET['edit_id']))
										{
											?>
												<input type="hidden" value="<?=(isset($formDataEdit['basic_details_config_details_id']))?$formDataEdit['basic_details_config_details_id']:'';?>"  name="update">
									
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
													
<th>favicon logo</th>
<th>logo</th>
<th>meta details</th>
<th>meta keywords</th>
<th>page title</th>
<th>phone</th>
<th>whatsapp</th>
<th>email</th>
<th>address</th><th>Edit</th>
<th>Delete</th>
												</tr>
											</thead>
											<tbody>
											<?php
											$formDataFull=$obj->select_any("tbl_basic_details_config_details","1 order by basic_details_config_details_id DESC");
											$count=1;
											if(!empty($formDataFull))
											{
											foreach($formDataFull as $formDataSingle)
											{
											
											?>
											<tr>
											<td><?=$count;?></th>
											
<?php
if(!empty($formDataSingle['favicon_logo']))
{
?>
<td><img src="<?=$formDataSingle['favicon_logo'];?>" width="100px" height="100px"></td>
<?php
}
else
{
?>
<td><?=$formDataSingle['favicon_logo'];?></td>
<?php
}
?>
<?php
if(!empty($formDataSingle['logo']))
{
?>
<td><img src="<?=$formDataSingle['logo'];?>" width="100px" height="100px"></td>
<?php
}
else
{
?>
<td><?=$formDataSingle['logo'];?></td>
<?php
}
?>
<td><?=$formDataSingle['meta_details'];?></td>
<td><?=$formDataSingle['meta_keywords'];?></td>
<td><?=$formDataSingle['page_title'];?></td>
<td><?=$formDataSingle['phone'];?></td>
<td><?=$formDataSingle['whatsapp'];?></td>
<td><?=$formDataSingle['email'];?></td>
<td><?=$formDataSingle['address'];?></td>													
													<td><a href="#" onclick="UserEdit(<?=$formDataSingle['basic_details_config_details_id'];?>,<?=($count-1);?>);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fa fa-edit color-danger"></i></a></td>
													<td><a href="#" onclick="UserDelete(<?=$formDataSingle['basic_details_config_details_id'];?>,<?=($count-1);?>);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fa fa-close color-danger"></i></a></td>
		
		
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