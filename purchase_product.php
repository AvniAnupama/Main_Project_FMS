<?php
/***************************************************************************
* File name   : index.php
* Begin       : 12 April 2020
* Description : create module page
* Author: Anupama A
***************************************************************************/
require_once"../config/db_connect.php";
$obj=new db_connect;
include"../config/null_variables.php";
include_once"../templates/head.php";
include_once"../templates/preloader.php";
include_once"../templates/topbar.php";
include_once"../templates/sidebar.php";
include_once"../home/product_home.php";//content
include_once"../templates/footer.php";

?>