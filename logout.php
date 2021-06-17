<?php
/***************************************************************************
* File name   : logout.php
* Begin       : 12 April 2020
* Description : used for loging out
* Author: Anupama A
***************************************************************************/
if(isset($_GET['logout']))
{
	session_start();
	unset($_SESSION['user_id']);
	unset($_SESSION['access']);
	session_destroy();
	 setcookie('username', null, -1, '/');
    setcookie('password', null, -1, '/');
	header("location:Index");
	exit();
}
else
{	
	session_start();
	unset($_SESSION['user_id']);
	unset($_SESSION['access']);
	session_destroy();
	 setcookie('username', null, -1, '/');
    setcookie('password', null, -1, '/');
	header("location:Index");
	exit();
}
?>