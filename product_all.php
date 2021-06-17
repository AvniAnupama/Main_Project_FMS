<?php
	 require_once"../config/db_connect.php";
$obj=new db_connect;
include"../config/null_variables.php";  
$dataSingle=$obj->select_any_one("tbl_manage_product_add_new_product","manage_product_add_new_product_id='".$_REQUEST['id']."'");
$category=$obj->select_any_one("tbl_manage_product_product_category","manage_product_product_category_id='".$dataSingle['category']."'");
$attribute=$obj->select_any_one("tbl_manage_product_product_attribute","manage_product_product_attribute_id='".$dataSingle['attribute']."'");
	   ?>


				<div class="wrapper row">
					<div class="preview col-md-6">
						
						<div class="preview-pic tab-content">
						  <div class="tab-pane active" id="pic-1"><img  src="<?=$dataSingle['product_image'];?>"/></div>
						  
						</div>
						
						
					</div>
					<div class="details col-md-6">
						<h3 class="product-title"><?=$dataSingle['product_title'];?></h3>
						<div class="rating">
							<div class="stars">
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								
							</div>
							
						</div>
						<p class="product-description"><?=$dataSingle['product_details'];?></p>
						<h4 class="price">current price: <span><?=$dataSingle['price'];?></span></h4>
						<p class="vote"><strong><?=$category['category'];?></strong></p>
						<h5 class="sizes"><?=$attribute['attribute'];?>:
							<span class="size" data-toggle="tooltip" title="small"><?=$dataSingle['attribute_value'];?></span>
							
						</h5>
						
						<div class="action">
						<?php
					if (in_array($dataSingle['manage_product_add_new_product_id'], $_SESSION['cart_data']))
					{
						?>
						
						 <button disabled class="add-to-cart btn btn-danger">Added in cart</button>
						 <br><br>
					<?php
					}
					else
					{
					?>
							<a class="add-to-cart btn btn-default" href="cartData.php?manage_product_add_new_product_id=<?=$dataSingle['manage_product_add_new_product_id'];?>">add to cart</a>
							
							<?php
					}
							?>
						</div>
					</div>
				</div>
		
