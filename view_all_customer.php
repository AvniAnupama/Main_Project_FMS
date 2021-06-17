  <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="Home">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="customer_dashboard.php"><?=ucwords('customer');?></a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)"><?=ucwords('Customer Registration');?></a></li>
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
													
<th>name</th>
<th>email</th>
<th>phone</th>
<th>address</th>
<th>aadhar number</th>
<th>company license</th>
<th>photo</th><th>Edit</th>
<th>Delete</th>
												</tr>
											</thead>
											<tbody>
											<?php
											$formDataFull=$obj->select_any("tbl_customer_customer_registration","1 order by customer_customer_registration_id DESC");
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
<td><?=$formDataSingle['aadhar_number'];?></td>
<td><?=$formDataSingle['company_license'];?></td>
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
													<td><a href="#" onclick="UserEdit(<?=$formDataSingle['customer_customer_registration_id'];?>,<?=($count-1);?>);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fa fa-edit color-danger"></i></a></td>
													<td><a href="#" onclick="UserDelete(<?=$formDataSingle['customer_customer_registration_id'];?>,<?=($count-1);?>);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fa fa-close color-danger"></i></a></td>
		
		
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