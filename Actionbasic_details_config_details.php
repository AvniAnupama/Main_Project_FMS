<?php
require_once"../../config/db_connect.php";
$obj=new db_connect;
$tableName="tbl_basic_details_config_details";
//print_r($_REQUEST);
if(isset($_REQUEST['Save']))
{
	unset($_REQUEST['Save']);
	if(!isset($_FILES['favicon_logo']) || $_FILES['favicon_logo']['error'] == UPLOAD_ERR_NO_FILE) {
	   $_REQUEST['favicon_logo']=$_REQUEST['favicon_logo_file_dummy'];
	   unset($_REQUEST['favicon_logo_file_dummy']);
		} else {
		
							$imgTp=$_FILES["favicon_logo"]["type"];
							$ret=rand('20','40000001111111111111111111');
							$rnam=$_FILES['favicon_logo']['name'];
							$path="../basic details/Files/";//folder name is users
							$img=$_FILES['favicon_logo']['tmp_name'];//upimage is image field
							$name=$ret. microtime() .$rnam;
							if(move_uploaded_file($img,"../".$path.$name))
							{
							$pathname="$path$name";
							$_REQUEST['favicon_logo']=$pathname;
							if($_REQUEST['favicon_logo_file_dummy']!='')
							{
							 unlink("../".$_REQUEST['favicon_logo_file_dummy']);	
							}
							}
							else
							{
							$_REQUEST['favicon_logo']='';
							 
							}
		}
		unset($_REQUEST['favicon_logo_file_dummy']);if(!isset($_FILES['logo']) || $_FILES['logo']['error'] == UPLOAD_ERR_NO_FILE) {
	   $_REQUEST['logo']=$_REQUEST['logo_file_dummy'];
	   unset($_REQUEST['logo_file_dummy']);
		} else {
		
							$imgTp=$_FILES["logo"]["type"];
							$ret=rand('20','40000001111111111111111111');
							$rnam=$_FILES['logo']['name'];
							$path="../basic details/Files/";//folder name is users
							$img=$_FILES['logo']['tmp_name'];//upimage is image field
							$name=$ret. microtime() .$rnam;
							if(move_uploaded_file($img,"../".$path.$name))
							{
							$pathname="$path$name";
							$_REQUEST['logo']=$pathname;
							if($_REQUEST['logo_file_dummy']!='')
							{
							 unlink("../".$_REQUEST['logo_file_dummy']);	
							}
							}
							else
							{
							$_REQUEST['logo']='';
							 
							}
		}
		unset($_REQUEST['logo_file_dummy']);
	
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
	$con=array('basic_details_config_details_id'=>$_REQUEST['update']);
	unset($_REQUEST['update']);
	if(!isset($_FILES['favicon_logo']) || $_FILES['favicon_logo']['error'] == UPLOAD_ERR_NO_FILE) {
	   $_REQUEST['favicon_logo']=$_REQUEST['favicon_logo_file_dummy'];
	   unset($_REQUEST['favicon_logo_file_dummy']);
		} else {
		
							$imgTp=$_FILES["favicon_logo"]["type"];
							$ret=rand('20','40000001111111111111111111');
							$rnam=$_FILES['favicon_logo']['name'];
							$path="../basic details/Files/";//folder name is users
							$img=$_FILES['favicon_logo']['tmp_name'];//upimage is image field
							$name=$ret. microtime() .$rnam;
							if(move_uploaded_file($img,"../".$path.$name))
							{
							$pathname="$path$name";
							$_REQUEST['favicon_logo']=$pathname;
							if($_REQUEST['favicon_logo_file_dummy']!='')
							{
							 unlink("../".$_REQUEST['favicon_logo_file_dummy']);	
							}
							}
							else
							{
							$_REQUEST['favicon_logo']='';
							 
							}
		}
		unset($_REQUEST['favicon_logo_file_dummy']);if(!isset($_FILES['logo']) || $_FILES['logo']['error'] == UPLOAD_ERR_NO_FILE) {
	   $_REQUEST['logo']=$_REQUEST['logo_file_dummy'];
	   unset($_REQUEST['logo_file_dummy']);
		} else {
		
							$imgTp=$_FILES["logo"]["type"];
							$ret=rand('20','40000001111111111111111111');
							$rnam=$_FILES['logo']['name'];
							$path="../basic details/Files/";//folder name is users
							$img=$_FILES['logo']['tmp_name'];//upimage is image field
							$name=$ret. microtime() .$rnam;
							if(move_uploaded_file($img,"../".$path.$name))
							{
							$pathname="$path$name";
							$_REQUEST['logo']=$pathname;
							if($_REQUEST['logo_file_dummy']!='')
							{
							 unlink("../".$_REQUEST['logo_file_dummy']);	
							}
							}
							else
							{
							$_REQUEST['logo']='';
							 
							}
		}
		unset($_REQUEST['logo_file_dummy']);
	
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
if(isset($_REQUEST['basic_details_config_details_id']))
{
	$condition="basic_details_config_details_id='".$_REQUEST['basic_details_config_details_id']."'";
	$oldDate=$obj->select_any_one($tableName,$condition);
	if($oldDate['favicon_logo']!='')
	{
		unlink("../".$oldDate['favicon_logo']);
	}$oldDate=$obj->select_any_one($tableName,$condition);
	if($oldDate['logo']!='')
	{
		unlink("../".$oldDate['logo']);
	}
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