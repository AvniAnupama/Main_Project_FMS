<?php
require_once"../../config/db_connect.php";
$obj=new db_connect;
$tableName="tbl_category_category";
//print_r($_REQUEST);
if(isset($_REQUEST['Save']))
{
	unset($_REQUEST['Save']);
	if(!isset($_FILES['thumbnail']) || $_FILES['thumbnail']['error'] == UPLOAD_ERR_NO_FILE) {
	   $_REQUEST['thumbnail']=$_REQUEST['thumbnail_file_dummy'];
	   unset($_REQUEST['thumbnail_file_dummy']);
		} else {
		
							$imgTp=$_FILES["thumbnail"]["type"];
							$ret=rand('20','40000001111111111111111111');
							$rnam=$_FILES['thumbnail']['name'];
							$path="../category/Files/";//folder name is users
							$img=$_FILES['thumbnail']['tmp_name'];//upimage is image field
							$name=$ret. microtime() .$rnam;
							if(move_uploaded_file($img,"../".$path.$name))
							{
							$pathname="$path$name";
							$_REQUEST['thumbnail']=$pathname;
							if($_REQUEST['thumbnail_file_dummy']!='')
							{
							 unlink("../".$_REQUEST['thumbnail_file_dummy']);	
							}
							}
							else
							{
							$_REQUEST['thumbnail']='';
							 
							}
		}
		unset($_REQUEST['thumbnail_file_dummy']);
	
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
	$con=array('category_category_id'=>$_REQUEST['update']);
	unset($_REQUEST['update']);
	if(!isset($_FILES['thumbnail']) || $_FILES['thumbnail']['error'] == UPLOAD_ERR_NO_FILE) {
	   $_REQUEST['thumbnail']=$_REQUEST['thumbnail_file_dummy'];
	   unset($_REQUEST['thumbnail_file_dummy']);
		} else {
		
							$imgTp=$_FILES["thumbnail"]["type"];
							$ret=rand('20','40000001111111111111111111');
							$rnam=$_FILES['thumbnail']['name'];
							$path="../category/Files/";//folder name is users
							$img=$_FILES['thumbnail']['tmp_name'];//upimage is image field
							$name=$ret. microtime() .$rnam;
							if(move_uploaded_file($img,"../".$path.$name))
							{
							$pathname="$path$name";
							$_REQUEST['thumbnail']=$pathname;
							if($_REQUEST['thumbnail_file_dummy']!='')
							{
							 unlink("../".$_REQUEST['thumbnail_file_dummy']);	
							}
							}
							else
							{
							$_REQUEST['thumbnail']='';
							 
							}
		}
		unset($_REQUEST['thumbnail_file_dummy']);
	
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
if(isset($_REQUEST['category_category_id']))
{
	$condition="category_category_id='".$_REQUEST['category_category_id']."'";
	$oldDate=$obj->select_any_one($tableName,$condition);
	if($oldDate['thumbnail']!='')
	{
		unlink("../".$oldDate['thumbnail']);
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