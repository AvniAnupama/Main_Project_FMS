<?php
require_once"../../config/db_connect.php";
$obj=new db_connect;
$tableName="tbl_manage_employee_add_new_employee";
//print_r($_REQUEST);
if(isset($_REQUEST['Save']))
{
	$data=array('username'=>$_REQUEST['email'],'password'=>'Nill','category'=>3,'status'=>1);
	$login_result=$obj->inserttblReturnId($data,"tbl_login_info");
	if($login_result>0)
	{
	$_REQUEST['manage_employee_add_new_employee_id']=$login_result;
	unset($_REQUEST['Save']);
	if(!isset($_FILES['photo']) || $_FILES['photo']['error'] == UPLOAD_ERR_NO_FILE) {
	   $_REQUEST['photo']=$_REQUEST['photo_file_dummy'];
	   unset($_REQUEST['photo_file_dummy']);
		} else {
		
							$imgTp=$_FILES["photo"]["type"];
							$ret=rand('20','40000001111111111111111111');
							$rnam=$_FILES['photo']['name'];
							$path="../manage employee/Files/";//folder name is users
							$img=$_FILES['photo']['tmp_name'];//upimage is image field
							$name=$ret. microtime() .$rnam;
							if(move_uploaded_file($img,"../".$path.$name))
							{
							$pathname="$path$name";
							$_REQUEST['photo']=$pathname;
							if($_REQUEST['photo_file_dummy']!='')
							{
							 unlink("../".$_REQUEST['photo_file_dummy']);	
							}
							}
							else
							{
							$_REQUEST['photo']='';
							 
							}
		}
		unset($_REQUEST['photo_file_dummy']);
		
	$result=$obj->inserttblReturnId($_REQUEST,$tableName);
	unset($_REQUEST['manage_employee_add_new_employee_id']);
	if($result>0)
	{
		echo $result;
	}
	else
	{
		echo 0;
	}
	}
	else
	{
		echo 0;
	}
}
if(isset($_REQUEST['update']))
{
	$con=array('manage_employee_add_new_employee_id'=>$_REQUEST['update']);
	unset($_REQUEST['update']);
	if(!isset($_FILES['photo']) || $_FILES['photo']['error'] == UPLOAD_ERR_NO_FILE) {
	   $_REQUEST['photo']=$_REQUEST['photo_file_dummy'];
	   unset($_REQUEST['photo_file_dummy']);
		} else {
		
							$imgTp=$_FILES["photo"]["type"];
							$ret=rand('20','40000001111111111111111111');
							$rnam=$_FILES['photo']['name'];
							$path="../manage employee/Files/";//folder name is users
							$img=$_FILES['photo']['tmp_name'];//upimage is image field
							$name=$ret. microtime() .$rnam;
							if(move_uploaded_file($img,"../".$path.$name))
							{
							$pathname="$path$name";
							$_REQUEST['photo']=$pathname;
							if($_REQUEST['photo_file_dummy']!='')
							{
							 unlink("../".$_REQUEST['photo_file_dummy']);	
							}
							}
							else
							{
							$_REQUEST['photo']='';
							 
							}
		}
		unset($_REQUEST['photo_file_dummy']);
	
	$result=$obj->updatetbl($_REQUEST,$tableName,$con);
	if($result>0)
	{
		echo 2;
	}
	else
	{
		echo 0;
	}
}
if(isset($_REQUEST['manage_employee_add_new_employee_id']))
{
	$condition="manage_employee_add_new_employee_id='".$_REQUEST['manage_employee_add_new_employee_id']."'";
	$conditionL="login_info_id='".$_REQUEST['manage_employee_add_new_employee_id']."'";
	$oldDate=$obj->select_any_one($tableName,$condition);
	if($oldDate['photo']!='')
	{
		unlink("../".$oldDate['photo']);
	}
	$resultL=$obj->tbl_delete("tbl_login_info",$conditionL);
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
//echo "enable Debug";
?>