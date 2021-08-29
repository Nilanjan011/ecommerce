<?php
session_start();
include('admin/connection.php');
include('admin/function.php');
// echo "<pre>";
// print_r($_POST);
if ($_GET['case']=="") {

	$ip=$_SERVER['REMOTE_ADDR'];
	$productid=$_POST['product_id'];
	$product_name=$_POST['product_name'];
	$selling_price=$_POST['selling_price'];
	$quantity=$_POST['quantity'];
	$date=date("Y-m-d");
	$cusid=$_SESSION['uid'];
	$location=getCustomer($conn,$cusid,'address');
	
	$sql1="SELECT * FROM `tmp_cart` WHERE `productid`='$productid' AND `ipaddress`='$ip'";
	$res1=mysqli_query($conn,$sql1);
	$rowno=mysqli_num_rows($res1);
	$data=mysqli_fetch_array($res1);
	if ($rowno > 0) {
		$quantity=$quantity+$data['quantity'];
		$total=$data['price']*$quantity;
	}else {
		$total=$selling_price * $quantity;
	}
	

	if( $rowno > 0){
		$sql2="UPDATE `tmp_cart` SET `quantity`={$quantity},`total`={$total} WHERE `id`={$data['id']}";
		$res2=query($conn,$sql2);
		redirect('index.php');
	}

	
	if (isset($cusid)) {
		$sql="INSERT INTO `tmp_cart`(`ipaddress`,`cusid`,`total`, `productid`, `quantity`, `price`,`location`,`date`) VALUES ('$ip','$cusid','$total','$productid','$quantity','$selling_price','$location','$date')";
		$res=mysqli_query($conn,$sql);
		header("location:index.php");
	} else {
		$sql="INSERT INTO `tmp_cart`(`ipaddress`,`total`, `productid`, `quantity`, `price`,`location`,`date`) VALUES ('$ip','$total','$productid','$quantity','$selling_price','$location','$date')";
		$res=mysqli_query($conn,$sql);
		header("location:index.php");
	}
}

if ($_GET['case']=="add") {
	$quantity=$_POST['quantity'];
	$btn=$_POST['btn'];
	$price=$_POST['price'];
	// $total=$price*$quantity;
	$id=$_POST['id'];

	$sql1="SELECT * FROM `tmp_cart` WHERE `id`={$id} and `quantity`={$quantity}";
	$res1=mysqli_query($conn,$sql1);
	// $data=fetcharray($res1);
	$rowno=mysqli_num_rows($res1);

	if ($rowno >0) {
		$quantity=$quantity+($btn);
		$total=$price*$quantity;
		$sql="UPDATE `tmp_cart` SET `quantity`={$quantity},`total`={$total} WHERE `id`=$id";
		$res=query($conn,$sql);

	}else{
	
		$total=$price*$quantity;
		$sql="UPDATE `tmp_cart` SET `quantity`='".mysqli_escape_string($conn,$quantity)."',`total`={$total} WHERE `id`=$id";
		$res=query($conn,$sql);
	}
	
	redirect('addtocart.php');
}

if ($_GET['case']=="delete") {
	$id=$_GET['id'];
	$sql="DELETE FROM `tmp_cart` WHERE id='".mysqli_escape_string($conn,$id)."'";
	$res=query($conn,$sql);

	redirect('addtocart.php');
}



?>
