<?php
@session_start();
if(isset($_GET['manage_product_add_new_product_id']))
{
$_SESSION['cart_data'][]=$_GET['manage_product_add_new_product_id'];

header("location:purchase_product.php");
}
if(isset($_GET['remove_id']))
{
	$_SESSION['cart_data']=array_diff($_SESSION['cart_data'],array(0=>$_GET['remove_id']));
header("location:cutomer_home.php?done=".$_GET['remove_id']."");
}
?>