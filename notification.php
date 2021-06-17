<?php
if($_COOKIE['DEVICE']!='' && $_SESSION['user_id']!='')
{
    
$checking_device=$obj->select_any_one("tbl_device","device='".$_COOKIE['FCM_TOKEN']."' and staff_id='".$_SESSION['user_id']."'");
if(empty($checking_device))
{
$obj->tbl_delete("tbl_device","device='staff_id='".$_SESSION['user_id']."'");
$device_id=array("device"=>$_COOKIE['FCM_TOKEN'],'staff_id'=>$_SESSION['user_id']);
$data=$obj->inserttbl($device_id,"tbl_device");
}

$todays_location=$obj->select_any_one("tbl_task_today","day='".date('d-m-Y')."' and staff_id='".$_SESSION['user_id']."'");
if($todays_location['day']=='' && $_SESSION['user_id']!='')
{
$data_array=array("day"=>date('d-m-Y'),'staff_id'=>$_SESSION['user_id'],'latitude'=>$_COOKIE['lat'],'longitude'=>$_COOKIE['long'],'login_time'=>date("Y-m-d H:i:s"));
$data=$obj->inserttbl($data_array,"tbl_task_today");
//mail("merinsunnyovelil@gmail.com","Mailee mail mail",$data);
}

} 
else
{
  $todays_location=$obj->select_any_one("tbl_task_today","day='".date('d-m-Y')."' and staff_id='".$_SESSION['user_id']."'");
if($todays_location['day']=='' && $_SESSION['user_id']!='')
{
$data_array=array("day"=>date('d-m-Y'),'staff_id'=>$_SESSION['user_id'],'login_time'=>date("Y-m-d H:i:s"));
$data=$obj->inserttbl($data_array,"tbl_task_today");
//mail("merinsunnyovelil@gmail.com","Mailee mail mail",$data);
}  
}
?>