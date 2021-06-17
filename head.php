<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>fms</title>
    <!-- Favicon icon -->
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> 
    <!-- Custom Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
	<?=($include_style_to_head!=''?$include_style_to_head:'');?>
	
	<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
	</head>
<body> 
<?php
@session_start();
if(isset($_SESSION['user_id']))
{
if($_SESSION['user_id']=='' || is_numeric($_SESSION['user_id']!=1))
	{
		header("location:Index");
		exit();
	}
}
else
{
	header("location:Index");
	exit();
}
?>
