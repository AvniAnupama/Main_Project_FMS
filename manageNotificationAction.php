<?php
/*
*  Objective: used to insert data to task table
* 
*   ver 1.0    28APR2020
*                  - initial version
*	result	   if success it will be 1 else 0 
*/
require_once('../Config/config.php');
require_once "../../".$db_connect_path;
require_once '../Functions/callback.php';
require_once '../notificationApi.php';
$obj 	= new db_connect;
/*Checking if delete_task not empty this function is used for deleting the data*/
if(isset($_REQUEST['delete_notification']))
{
	echo deleteNotificationFromTable($_REQUEST['delete_notification']);
}
else if(isset($_REQUEST['delete_notification_staff_id']))
{
	echo deleteNotificationFromTableByStaff($_REQUEST['delete_notification_staff_id']);
}
else
{
	echo 0;
}
?>