<?php
/***************************************************************************
* File name   : index.php
* Begin       : 12 April 2020
* Description : create module page
* Author: Anupama A
***************************************************************************/
require_once"../config/db_connect.php";
$obj=new db_connect;
if(isset($_POST['id']))
{
	if($_POST['realvalue']=='')
	{
		$_POST['realvalue']=0;
	}
	//print_r($_POST);
	$i=$_POST['id'];
	$_SESSION['cart_data_final'][$i]['price']=$_POST['price'];
	$_SESSION['cart_data_final'][$i]['count']=$_POST['realvalue'];
	print_r($_SESSION['cart_data_final']);
}
?>