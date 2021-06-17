		   <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="Home">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="manage_product"><?=ucwords('manage product');?></a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)"><?=ucwords('All Product');?></a></li>
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
													
<th>product title</th>
<th>product details</th>
<th>category</th>
<th>attribute</th>
<th>attribute value</th>
<th>price</th>
<th>opening stock</th>
<th>product image</th>
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
?>	
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