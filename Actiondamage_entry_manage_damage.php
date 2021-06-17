<?php
require_once"../../config/db_connect.php";
$obj=new db_connect;
$tableName="tbl_damage_entry_manage_damage";
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
	$con=array('damage_entry_manage_damage_id'=>$_REQUEST['update']);
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
if(isset($_REQUEST['damage_entry_manage_damage_id']))
{
	$condition="damage_entry_manage_damage_id='".$_REQUEST['damage_entry_manage_damage_id']."'";
	
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
	$condition="product='".$_REQUEST['damage_balance']."' order by damage_entry_manage_damage_id DESC";
	
	$result=$obj->select_any_one($tableName,$condition);
	if(!empty($result))
	{
		echo ($result['total_damaged_items']+0);
	}
	else
	{
		echo 0;
	}
}
?>