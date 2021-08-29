<?php
include('admin/connection.php');
include('admin/function.php');


session_start();
if(!isset($_SESSION['uid']))
{
	redirect('login.php');
}

// $_SESSION['cid']=3;
$address=getCustomer($conn,$_SESSION['uid'],$field);

$ip=$_SERVER['REMOTE_ADDR'];
$random=rand(111111,9999999);
$invoice_no=rand(10000,999999999);
$sql="SELECT * FROM `tmp_cart` WHERE `ipaddress`='".mysqli_escape_string($conn,$ip)."' OR `cusid`='".mysqli_escape_string($conn,$_SESSION['uid'])."'";
$res=query($conn,$sql);
$num=numrows($res);

if($num>0){
	while($fetch=fetcharray($res)){
		if($fetch['orderid']==$random)
		{
			redirect('delivery.php?wrong=1');
		}else{
			$quan=$quan+$fetch['quantity'];
			$sql1="INSERT INTO `orders`(`order_id`,`customer_id`,`product_id`,`quantity`,`total_amount`,`order_date`,`shipping_address`,`invoice_no`) VALUES('".$random."','".$_SESSION['uid']."','".mysqli_escape_string($conn,$fetch['productid'])."','".mysqli_escape_string($conn,$fetch['quantity'])."','".mysqli_escape_string($conn,$fetch['total'])."','".date('Y-m-d')."','".$address."','".$invoice_no."')";
			$res1=query($conn,$sql1);
		}
	}
$total=0;

if($_SESSION['uid'])
{
	$sqltotal="SELECT SUM(`total`) AS total FROM `tmp_cart` WHERE `ipaddress`='".$ip."' OR `cusid`='".$_SESSION['uid']."'";
}else{
	$sqltotal="SELECT SUM(`total`) AS total FROM `tmp_cart` WHERE `ipaddress`='".$ip."'";
}
$restotal=query($conn,$sqltotal);
$numtotal=numrows($restotal);
if($numtotal>0)
{
	$fetchtotal=fetcharray($restotal);
	if(getItem($conn,$ip,$_SESSION['uid'])>0)
	{
		$sql2="INSERT INTO `order_statement`(`orderid`,`ipaddress`,`customerid`,`total`,`address1`,`date`,`paymethod`,`quantity`) VALUES('".$random."','".$ip."','".mysqli_escape_string($conn,$_SESSION['uid'])."','".mysqli_escape_string($conn,$fetchtotal['total'])."','".$address."','".date('Y-m-d')."','Cash on Delivery','".$quan."')";
		$res2=query($conn,$sql2);
		// $idd=mysql_insert_id();
	}
}

}

redirect('index.php');
?>
