<?php
require_once"../../config/db_connect.php";
$obj=new db_connect;
$tableName="tbl_stock_entry_manage_stock";
//print_r($_REQUEST);
if(isset($_REQUEST['Save']))
{
	unset($_REQUEST['Save']);
	
	
	$result=$obj->inserttblReturnId($_REQUEST,$tableName);
	if($result>0)
	{
		echo $result;
	}
	else
	{
		echo 0;
	}
}
if(isset($_REQUEST['update']))
{
	$con=array('stock_entry_manage_stock_id'=>$_REQUEST['update']);
	unset($_REQUEST['update']);
	
	
	$result=$obj->updatetbl($_REQUEST,$tableName,$con);
	if($result>0)
	{
		echo $result;
	}
	else
	{
		echo 0;
	}
}
if(isset($_REQUEST['stock_entry_manage_stock_id']))
{
	$condition="stock_entry_manage_stock_id='".$_REQUEST['stock_entry_manage_stock_id']."'";
	
	$result=$obj->tbl_delete($tableName,$condition);
	if($result==1)
	{
		echo 1;
	}
	else
	{
		echo 0;
	}
}
if(isset($_REQUEST['damage_balance']))
{
	$condition="product='".$_REQUEST['damage_balance']."' order by stock_entry_manage_stock_id DESC";
	
	$result=$obj->select_any_one($tableName,$condition);
	if(!empty($result))
	{
		echo ($result['available_stock']+0);
	}
	else
	{
		$data=$obj->select_any_one("tbl_manage_product_add_new_product","manage_product_add_new_product_id='".$_REQUEST['damage_balance']."'");
		echo $data['opening_stock']+0;
	}
}
?>