		   <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="Home">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">User Home</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
				<div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table table-bordered" >
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
					<?php
					$i=1;
					$total_price=0;
					if(isset($_GET['done']))
					{
						$remove_id=$_GET['done'];
						$final_data=$_SESSION['cart_data_final'];
						$_SESSION['cart_data_final']=array();
						$j=1;
						foreach($final_data as $Dtaa)
						{
							if($Dtaa['product_id']==$_GET['done'])
							{
								
							}
							else
							{
							$_SESSION['cart_data_final'][$j]=$Dtaa;	
							$j++;
							}
							
						}
					}
					else
					{
					$_SESSION['cart_data_final']=array();
					}
										foreach($_SESSION['cart_data'] as $dataCart)
										{
											$dataAll=$obj->select_any_one("tbl_manage_product_add_new_product","manage_product_add_new_product_id='".$dataCart."'");
											$category=$obj->select_any_one("tbl_manage_product_product_category","manage_product_product_category_id='".$dataAll['category']."'");
											
											if($_SESSION['cart_data_final'][$i]['count']>1)
											{
												$count=$_SESSION['cart_data_final'][$i]['count'];
											}
											else
											{
												$count=1;
											}
										?>
                    <tr>
                        <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="<?=$dataAll['product_image'];?>" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="#">&nbsp;&nbsp;&nbsp;<?=$dataAll['product_title'];?></a></h4>
                                <h5 class="media-heading"><a href="#">&nbsp;&nbsp;&nbsp;<?=$category['category'];?></a></h5>
                                
                            </div>
                        </div></td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                        <input type="text" id="number<?=$i;?>" onkeyup="changeTotal(<?=$i;?>,<?=$dataAll['price'];?>,this.value);" class="form-control" id="exampleInputEmail1" value="<?=$count;?>">
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong><?=$dataAll['price'];?></strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong id="total<?=$i;?>"><?=(1*$dataAll['price']);?></strong></td>
                        <td class="col-sm-1 col-md-1">
                        <a type="button" class="btn btn-danger" href="cartData.php?remove_id=<?=$dataAll['manage_product_add_new_product_id'];?>">
                            <span class="glyphicon glyphicon-remove"></span> Remove
                        </a></td>
                    </tr>
                   <?php
				   $_SESSION['cart_data_final'][$i]['product_name']=$dataAll['product_title'];
				   $_SESSION['cart_data_final'][$i]['product_id']=$dataCart;
				   $_SESSION['cart_data_final'][$i]['price']=$dataAll['price'];
				   $_SESSION['cart_data_final'][$i]['count']=$count;
				   $total_price=$total_price+($count*$dataAll['price']);
				   $i++;
					}
				   ?>
				   <script>
				   var total_item=<?=$i;?>
				   </script>
				   <br><br>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Total</h5></td>
                        <td class="text-right"><h5><strong id="subtotal"><?=$total_price;?></strong></h5></td>
                    </tr>
                   
                   
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                        <button type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                        </button></td>
                        <td>
                        <a href="../payment/index.php" class="btn btn-success">
                            Checkout <span class="glyphicon glyphicon-play"></span>
                        </a></td>
                    </tr>
                </tbody>
            </table>
        </div>	
							
						
					
				</div>
				
			</div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->  
		<script>
		function changeTotal(val,price,realvalue)
		{
			if(realvalue==='')
			{
				realvalue=1;
			}
			
			var data=realvalue*price;
			
			 $('#total'+val+'').html(data);
			 total();
			$.ajax({
				type: "POST",
				url: 'update_cat_product.php',
				data:{'id':val,'realvalue':realvalue,'price':price},
				success: function(res){
					
				}
				}); 
		}
		function total()
		{
			var total=0
			for (var i = 1; i < (parseInt(total_item)); i += 1) {
				var data= $('#total'+i+'').text();
				total=total+parseInt(data);
			}
			 $('#subtotal').html(total);
			
		}
		</script>