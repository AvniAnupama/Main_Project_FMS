<?php
/***************************************************************************
*  Objective: used to do operation in the notification module from another modules
* 
*   ver 1.0    28APR2020
*                  - initial version
***************************************************************************/
require_once(dirname(__FILE__)."/Config/config.php");
if (!class_exists('db_connect')){require_once(dirname(__FILE__)."/../".$db_connect_path);}
require_once (dirname(__FILE__)."/Functions/callback.php");
$con=new db_connect;
/*
* Objective:used to insert data to task table
* $NotificationDataArray = {
    "title":   title of the task
    "details":   details of task 
	"moduleUrl":   complete Url to track task 
    "createdDate":   task created date
    }
*/
function insertDataToNotificationTable($NotificationDataArray)
{

   global $con; 
   $tableName="tbl_notification_main";
   $InsertData=$con->inserttbl($NotificationDataArray,$tableName);
   return $InsertData;
}
/*
* Objective:used to delete data from table
*$taskMainId= primary key value of notification table
*/
function deleteNotificationFromTable($notificationMainId)
	{
    global $con; 
	$tableName="tbl_notification_main";
	$taskCondition='notification_main_id='.$notificationMainId.'';
	$deleteData=$con->tbl_delete($tableName,$taskCondition);
	return $deleteData;
	}
/*
* Objective:used to delete data from table by staff
* $staffId= id of the staff
*/
function deleteNotificationFromTableByStaff($staffId)
	{
    global $con; 
	$tableName="tbl_notification_main";
	$taskCondition='staff_id='.$staffId.'';
	$deleteData=$con->tbl_delete($tableName,$taskCondition);
	return $deleteData;
	}
?>