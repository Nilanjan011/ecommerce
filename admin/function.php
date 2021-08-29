<?php
include("connection.php");
date_default_timezone_set('Asia/Calcutta');

function redirect($url)
{
header('Location: '.$url);
exit();
}
function query($conn,$sql)
{
$res=mysqli_query($conn,$sql);
return $res;
}
function numrows($exe)
{
$no=mysqli_num_rows($exe);
return $no;
}
function fetcharray($res)
{
$fetch=mysqli_fetch_array($res);
return $fetch;
}
function getCustomer($conn,$id,$field)
{
$sql="SELECT * FROM `customer` WHERE `id`='".$id."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch[$field];
}
}

function getProduct($conn,$id,$field)
{
$sql="SELECT * FROM `product` WHERE `id`='".$id."'";
$res=query($conn,$sql);
$num=numrows($res);
if($num>0)
{
$fetch=fetcharray($res);
return $fetch[$field];
}
}
function getProductIMG($conn,$id,$field)
{
	$sql="SELECT * FROM `product_img` WHERE `product_id`='".$id."'";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		$fetch=fetcharray($res);
		return $fetch[$field];
	}

}
function getItem($conn,$ip,$id)
{
	$sql="SELECT * FROM `tmp_cart` WHERE `cusid`='".$id."' and `ipaddress`='".$ip."'";
	$res=query($conn,$sql);
	$num=numrows($res);
	if($num>0)
	{
		
		return $num;
	}
}


?>