<?php
require_once"../../config/db_connect.php";
$obj=new db_connect;

$tableName="tbl_login_info";
//print_r($_REQUEST);
if(isset($_REQUEST['Save']))
{
	unset($_REQUEST['Save']);
	
	$_REQUEST['password']=password_hash($_REQUEST['password'],PASSWORD_DEFAULT);
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
	$con=array('login_info_id'=>$_REQUEST['update']);
	unset($_REQUEST['update']);
	$_REQUEST['password']=password_hash($_REQUEST['password'],PASSWORD_DEFAULT);
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
if(isset($_REQUEST['login_info_id']))
{
	$condition="login_info_id='".$_REQUEST['login_info_id']."'";
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
if(isset($_REQUEST['update_user']))
{
	
	$con=array('login_info_id'=>$_REQUEST['update_user']);
	$id=$_REQUEST['update_user'];
	unset($_REQUEST['update_user']);
	$pass=$_REQUEST['password'];
	$_REQUEST['password']=password_hash($_REQUEST['password'],PASSWORD_DEFAULT);
	$_REQUEST['status']=0;
	$result=$obj->updatetbl($_REQUEST,$tableName,$con);
	if($result>0)
	{
		require_once("../../user/sendMail.php");
		$user_data=$obj->select_any_one($tableName,"login_info_id='".$id."'");
		$subject="Login Details for FMS PORTAL";
		$message="Dear Sir/Madam<br>Your Username for FMS PORTAL is ".$user_data['username']." <br> and Password is ".$pass." <br>Thank You.<br>FMS PORTAL .LLC";
		sendMail($user_data['username'],$message,$subject);
		echo $result;
	}
	else
	{
		echo 0;
	}
}

if(isset($_REQUEST['forgot_email']) )
{
	
	$username=str_replace("'","",$_REQUEST['forgot_email']);
	
	$check_username=$obj->select_any_one("tbl_login_info","username='".$username."'");
	if($check_username['username']==$username)
	{
		
	$con=array('username'=>$check_username['username']);
	$data['password']="";
	$result=$obj->updatetbl($data,$tableName,$con);
	$user=$obj->encrypt($username);
	$password_reset_link_is="http://localhost/FMS/public/forgot_password.php?flag=".$user."";
		require_once("../../user/sendMail.php");
		$subject="Password Reset Link from FMS PORTAL";
		$message="Dear Sir/Madam<br>Password rest link is <a href='".$password_reset_link_is."'>Click here to set your password</a> <br>Thank You.<br>FMS PORTAL .LLC";
		sendMail($check_username['username'],$message,$subject);
		header("location:../../public/login.php?reset_flag");
	}
	else
	{
		
	  header("location:../../public/login.php?reset_flag_failed");
	}
	
	
}
if(isset($_REQUEST['new_password_rest']) )
{
	
	
		
	$con=array('login_info_id'=>$_REQUEST['my_id']);
	
	$pass=$_REQUEST['new_password_rest'];
	$pass=password_hash($_REQUEST['new_password_rest'],PASSWORD_DEFAULT);
	$data['password']=$pass;
	$result=$obj->updatetbl($data,$tableName,$con);
		header("location:../../public/login.php?reset_sucess");
	
	
	
}
?>