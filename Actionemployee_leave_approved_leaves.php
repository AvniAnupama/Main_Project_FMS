<?php
require_once"../../config/db_connect.php";
$obj=new db_connect;
$tableName="tbl_employee_leave_approved_leaves";
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
	$con=array('employee_leave_approved_leaves_id'=>$_REQUEST['update']);
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
if(isset($_REQUEST['employee_leave_approved_leaves_id']))
{
	$condition="employee_leave_approved_leaves_id='".$_REQUEST['employee_leave_approved_leaves_id']."'";
	
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
?>