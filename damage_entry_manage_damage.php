		   <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="Home">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="damage_entry"><?=ucwords('damage entry');?></a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)"><?=ucwords('Manage Damage');?></a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
			<div class="container-fluid">
				<?php
				if(isset($_GET['flag']))
				{
					?>
						<div class="row">
						 <div class="col-lg-12">
						   <div class="card" style="overflow-x:auto;">
								<div class="card-body" id="UserTable">
									<h4 class="card-title">Table</h4>
										<table id="example" class="display nowrap" cellspacing="0" width="100%">
											<thead>
												<tr>
												<th>Si No</th>
													
<th>product</th>
<th>damaged items</th>
<th>total damaged items</th>
<th>damage entry date</th>
												</tr>
											</thead>
											<tbody>
											<?php
											$formDataFull=$obj->select_any("tbl_damage_entry_manage_damage","1 order by damage_entry_manage_damage_id DESC");
											$count=1;
											if(!empty($formDataFull))
											{
											foreach($formDataFull as $formDataSingle)
											{
											
											?>
											<tr>
											<td><?=$count;?></th>
											
<?php
$product=$obj->select_any_one("tbl_manage_product_add_new_product","manage_product_add_new_product_id='".$formDataSingle['product']."'");
?>
<td><?=$product['product_title'];?></td>
<td><?=$formDataSingle['damaged_items'];?></td>
<td><?=$formDataSingle['total_damaged_items'];?></td>
<td><?=$formDataSingle['damage_entry_date'];?></td>													
													
		
		
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
					<?php
				}
				else
				{
				?>
				<div class="row">
					 <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><?=ucwords('Manage Damage');?></h4>
                                
                                <div class="basic-form" >
								
                                    <form enctype="multipart/form-data"  method="POST" id="form" action="../damage entry/Action/Actiondamage_entry_manage_damage">
										<div id="UserFormUpdate">
										<?php
										if(isset($_GET['edit_id']))
										{
											$formDataEdit=$obj->select_any_one("tbl_damage_entry_manage_damage","damage_entry_manage_damage_id='".$_GET['edit_id']."'");
										}
										?>
										
<div class="form-group">
<label>product:</label>
<select onChange="setStock(this.value)" required class="form-control input-default" name="product">
<option value="">Choose your option</option>
<?php
$product_data=$obj->select_any("tbl_manage_product_add_new_product","1");
foreach($product_data as $product_data_single)
{
?>
<option <?=(isset($formDataEdit))?(($formDataEdit['product']==$product_data_single['manage_product_add_new_product_id'])?'selected':''):'';?> value="<?=$product_data_single['manage_product_add_new_product_id'];?>"><?=$product_data_single['product_title'];?></option>
<?php	
}
?>
</select>
</div>
<div class="form-group">
<label>damaged items:</label>
<input required onChange="DamageIns(<?=(isset($formDataEdit['damaged_items']))?$formDataEdit['damaged_items']:0;?>,<?=(isset($formDataEdit['total_damaged_items']))?$formDataEdit['total_damaged_items']:0;?>)" id="damaged_items" type="number" name="damaged_items" value="<?=(isset($formDataEdit['damaged_items']))?$formDataEdit['damaged_items']:'';?>" class="form-control input-default">
</div>
<div class="form-group">
<label>total damaged items:</label>
<input required readonly type="number" id="total_damaged_items" name="total_damaged_items" value="<?=(isset($formDataEdit['total_damaged_items']))?$formDataEdit['total_damaged_items']:0;?>" class="form-control input-default">
</div>
<div class="form-group">
<label>damage entry date:</label>
<input required  value="<?=(isset($formDataEdit['damage_entry_date']))?$formDataEdit['damage_entry_date']:'';?>" min="<?=date('Y-m-d');?>"  type="date" name="damage_entry_date"  class="form-control input-default">
</div>
										<?php
										if(isset($_GET['edit_id']))
										{
											?>
												<input type="hidden" value="<?=(isset($formDataEdit['damage_entry_manage_damage_id']))?$formDataEdit['damage_entry_manage_damage_id']:'';?>"  name="update">
									
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
													
<th>product</th>
<th>damaged items</th>
<th>total damaged items</th>
<th>damage entry date</th><th>Edit</th>
<th>Delete</th>
												</tr>
											</thead>
											<tbody>
											<?php
											$formDataFull=$obj->select_any("tbl_damage_entry_manage_damage","1 order by damage_entry_manage_damage_id DESC");
											$count=1;
											if(!empty($formDataFull))
											{
											foreach($formDataFull as $formDataSingle)
											{
											
											?>
											<tr>
											<td><?=$count;?></th>
											
<?php
$product=$obj->select_any_one("tbl_manage_product_add_new_product","manage_product_add_new_product_id='".$formDataSingle['product']."'");
?>
<td><?=$product['product_title'];?></td>
<td><?=$formDataSingle['damaged_items'];?></td>
<td><?=$formDataSingle['total_damaged_items'];?></td>
<td><?=$formDataSingle['damage_entry_date'];?></td>													
													<td><a href="#" onclick="UserEdit(<?=$formDataSingle['damage_entry_manage_damage_id'];?>,<?=($count-1);?>);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fa fa-edit color-danger"></i></a></td>
													<td><a href="#" onclick="UserDelete(<?=$formDataSingle['damage_entry_manage_damage_id'];?>,<?=($count-1);?>);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fa fa-close color-danger"></i></a></td>
		
		
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
				<?php
				}
				?>
			</div>
            <!-- #/ container -->
        </div>
		
        <!--**********************************
            Content body end
        ***********************************--> 
		<script>
		var IndexIncrement=<?=count($formDataFull);?>
		</script>