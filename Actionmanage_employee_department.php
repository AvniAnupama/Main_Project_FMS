<?php
require_once"../../config/db_connect.php";
$obj=new db_connect;
$tableName="tbl_manage_employee_department";
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
	$con=array('manage_employee_department_id'=>$_REQUEST['update']);
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
if(isset($_REQUEST['manage_employee_department_id']))
{
	$condition="manage_employee_department_id='".$_REQUEST['manage_employee_department_id']."'";
	
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