<?php
session_start();
include('connection.php');
include('function.php');
if ($_REQUEST['case']=='') {

	 $sql="SELECT * FROM `admin` WHERE `email`='".mysqli_escape_string($conn,$_POST['email'])."' AND `password`=".mysqli_escape_string($conn,$_POST['password']);
	$res=query($conn,$sql);

	$fetch=fetcharray($res);
	$num=numrows($res);
	if($num>0)
	{
	$_SESSION['aid']=$fetch['id'];
	redirect('index.php');
	}else
	{
	redirect('login.php?m=1');

	}
}
if ($_REQUEST['case']=='logout') {

	session_destroy();
	unset($_SESSION["uid"]);
	redirect('login.php');
}
?>