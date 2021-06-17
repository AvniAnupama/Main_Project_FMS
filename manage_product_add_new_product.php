		   <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="Home">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="manage_product"><?=ucwords('manage product');?></a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)"><?=ucwords('Add New Product');?></a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
			<div class="container-fluid">
				
				<div class="row">
					 <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><?=ucwords('Add New Product');?></h4>
                                
                                <div class="basic-form" >
								
                                    <form enctype="multipart/form-data"  method="POST"  action="../manage product/Action/Actionmanage_product_add_new_product.php">
										<div id="UserFormUpdate">
										<?php
										if(isset($_GET['edit_id']))
										{
											$formDataEdit=$obj->select_any_one("tbl_manage_product_add_new_product","manage_product_add_new_product_id='".$_GET['edit_id']."'");
										}
										?>
										
<div class="form-group">
<label>product title:</label>
<input required type="text" name="product_title" value="<?=(isset($formDataEdit['product_title']))?$formDataEdit['product_title']:'';?>" class="form-control input-default">
</div>
<div class="form-group">
<label>product details:</label>
<textarea  name="product_details"  class="form-control input-default"><?=(isset($formDataEdit['product_details']))?$formDataEdit['product_details']:'';?></textarea>
</div>

<div class="form-group">
<label>category:</label>
<select required class="form-control input-default" name="category">
<option value="">Choose your option</option>
<?php
$category_data=$obj->select_any("tbl_manage_product_product_category","1");
foreach($category_data as $category_data_single)
{
?>
<option <?=(isset($formDataEdit))?(($formDataEdit['category']==$category_data_single['manage_product_product_category_id'])?'selected':''):'';?> value="<?=$category_data_single['manage_product_product_category_id'];?>"><?=$category_data_single['category'];?></option>
<?php	
}
?>
</select>
</div>
<div class="form-group">
<label>attribute:</label>
<select required class="form-control input-default" name="attribute">
<option value="">Choose your option</option>
<?php
$attribute_data=$obj->select_any("tbl_manage_product_product_attribute","1");
foreach($attribute_data as $attribute_data_single)
{
?>
<option <?=(isset($formDataEdit))?(($formDataEdit['attribute']==$attribute_data_single['manage_product_product_attribute_id'])?'selected':''):'';?> value="<?=$attribute_data_single['manage_product_product_attribute_id'];?>"><?=$attribute_data_single['attribute'];?></option>
<?php	
}
?>
</select>
</div>
<div class="form-group">
<label>attribute value:</label>
<input required type="text" name="attribute_value" value="<?=(isset($formDataEdit['attribute_value']))?$formDataEdit['attribute_value']:'';?>" class="form-control input-default">
</div>
<div class="form-group">
<label>price:</label>
<input required type="number" name="price" value="<?=(isset($formDataEdit['price']))?$formDataEdit['price']:'';?>" class="form-control input-default">
</div>
<div class="form-group">
<label>opening stock:</label>
<input required type="number" name="opening_stock" value="<?=(isset($formDataEdit['opening_stock']))?$formDataEdit['opening_stock']:'';?>" class="form-control input-default">
</div>
<div class="form-group">
<label>product image:</label>
<input <?=(isset($formDataEdit['product_image']))?'':'required';?> accept="image/*" type="file" name="product_image"  class="form-control input-default">
<input type="hidden" name="product_image_file_dummy" value="<?=(isset($formDataEdit['product_image']))?$formDataEdit['product_image']:'';?>">
</div>
										<?php
										if(isset($_GET['edit_id']))
										{
											?>
												<input type="hidden" value="<?=(isset($formDataEdit['manage_product_add_new_product_id']))?$formDataEdit['manage_product_add_new_product_id']:'';?>"  name="update">
									
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
													
<th>product title</th>
<th>product details</th>
<th>category</th>
<th>attribute</th>
<th>attribute value</th>
<th>price</th>
<th>opening stock</th>
<th>product image</th><th>Edit</th>
<th>Delete</th>
												</tr>
											</thead>
											<tbody>
											<?php
											$formDataFull=$obj->select_any("tbl_manage_product_add_new_product","1 order by manage_product_add_new_product_id DESC");
											$count=1;
											if(!empty($formDataFull))
											{
											foreach($formDataFull as $formDataSingle)
											{
											
											?>
											<tr>
											<td><?=$count;?></th>
											
<td><?=$formDataSingle['product_title'];?></td>
<td><?=$formDataSingle['product_details'];?></td>
<?php
$category=$obj->select_any_one("tbl_manage_product_product_category","manage_product_product_category_id='".$formDataSingle['category']."'");
?>
<td><?=$category['category'];?></td>
<?php
$attribute=$obj->select_any_one("tbl_manage_product_product_attribute","manage_product_product_attribute_id='".$formDataSingle['attribute']."'");
?>
<td><?=$attribute['attribute'];?></td>
<td><?=$formDataSingle['attribute_value'];?></td>
<td><?=$formDataSingle['price'];?></td>
<td><?=$formDataSingle['opening_stock'];?></td>
<?php
if(!empty($formDataSingle['product_image']))
{
?>
<td><img src="<?=$formDataSingle['product_image'];?>" width="100px" height="100px"></td>
<?php
}
else
{
?>
<td><?=$formDataSingle['product_image'];?></td>
<?php
}
?>	<td><a href="?edit_id=<?=$formDataSingle['manage_product_add_new_product_id'];?>" class="btn btn-success">Edit</a></td>
	<td><a href="../manage product/Action/Actionmanage_product_add_new_product.php?manage_product_add_new_product_id=<?=$formDataSingle['manage_product_add_new_product_id'];?>" class="btn btn-danger">Delete</a></td>
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