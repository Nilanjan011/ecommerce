<?php
session_start();
include('connection.php');
include('function.php');

if($_SESSION['aid'])
{


if(isset($_GET['case'])){

switch($_GET['case']){
case 'add':

	$name=$_POST['name'];
	$email=$_POST['email'];
	$ph_no=$_POST['ph_no'];
	$address=$_POST['address'];
	$password=base64_encode($_POST['name']);

	$sql="INSERT INTO `customer`(`name`, `email`, `ph_no`, `address`, `password`) VALUES ('$name','$email','$ph_no','$address','$password')";
	$res=mysqli_query($conn,$sql);
	redirect('customer.php');

break;

case 'edit':


$name=$_POST['name'];
$email=$_POST['email'];
$ph_no=$_POST['ph_no'];
$address=$_POST['address'];
$sql="UPDATE `customer` SET `name`='".mysqli_escape_string($conn,$name)."', `email` ='".mysqli_escape_string($conn,$email)."', `ph_no`='".mysqli_escape_string($conn,$ph_no)."',`address`='".mysqli_escape_string($conn,$address)."' WHERE `id`='".mysqli_escape_string($conn,$_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('customer.php');


break;
case 'delete':

$sql="DELETE FROM `customer`  WHERE `id`='".$_REQUEST['id']."'";
$res=query($conn,$sql); 
//print_r($sql);
redirect('customer.php');
}
}
}

?>