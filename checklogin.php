<?php
require_once("../config/db_connect.php");
$obj=new db_connect;
if(isset($_REQUEST['username']) && isset($_REQUEST['password']))
{
	$username=str_replace("'","",$_REQUEST['username']);
	$password=str_replace("'","",$_REQUEST['password']);
	$check_username=$obj->select_any_one("tbl_login_info","username='".$username."'");
	if($check_username['username']==$username)
	{
		if($check_username['status']==1)
		{
		
			echo 2;
		
		}
		else
		{
		if (password_verify($password, $check_username['password'])) 
		{
		    $hour = time() + 3600 * 24 * 30;
            setcookie('username',encrypt_decrypt('encrypt',$_REQUEST['username']), $hour,"/");
            setcookie('password',encrypt_decrypt('encrypt',$_REQUEST['password']), $hour,"/");
            $_SESSION['user_id']=$check_username['login_info_id'];
			$_SESSION['id']=$check_username['login_info_id'];
			if($check_username['category']!='')
			{
				$_SESSION['access']=$check_username['category'];
				
			}
			else
			{
				$_SESSION['access']=0;
			}
			echo 1;		
		}
		else
		{
			echo 0;
		}
		}
		
	}
	else
	{
		echo 0;
	}
}
if(isset($_GET['logout']))
{
	session_start();
	unset($_SESSION['user_id']);
	session_destroy();
    setcookie('username', null, -1, '/');
    setcookie('password', null, -1, '/');
	header("location:Index?logout");
}
if(isset($_GET['username']))
{
    $username=encrypt_decrypt('decrypt',$_COOKIE['username']);
    $password=encrypt_decrypt('decrypt',$_COOKIE['password']);
    	$username=str_replace("'","",$username);
	$password=str_replace("'","",$password);
	$check_username=$obj->select_any_one("tbl_login_info","username='".$username."'");
	if($check_username['username']==$username)
	{
		if (password_verify($password, $check_username['password'])) 
		{
		    $_SESSION['user_id']=$check_username['login_info_id'];
			$_SESSION['id']=$check_username['login_info_id'];
			if($check_username['category']!='')
			{
				$_SESSION['access']=$check_username['category'];
				
			}
			else
			{
				$_SESSION['access']=0;
			}
			header("location:../public/Home");		
		}
		else
		{
			$hour = time() + 3600 * 24 * 30;
            setcookie('username','', $hour,"/");
            setcookie('password','', $hour,"/");
            header("location:../public/Index");
		}
	}
	else
	{
		echo 0;
	}
}
function encrypt_decrypt($action, $string) 
    {
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $secret_key = 'xxxxxxxxxxxxxxxxxxxxxxxx';
        $secret_iv = 'xxxxxxxxxxxxxxxxxxxxxxxxx';
        // hash
        $key = hash('sha256', $secret_key);    
        // iv - encrypt method AES-256-CBC expects 16 bytes 
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        if ( $action == 'encrypt' ) {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        } else if( $action == 'decrypt' ) {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }
        return $output;
    }
?>