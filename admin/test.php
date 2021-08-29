<?php
session_start();
include('connection.php');
include('function.php');



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

if($_FILES['file']['name'])
{
if(strpos($_FILES['file']['name'], 'php') == false)
{
$sqlim="SELECT * FROM `customer` WHERE `id`='".mysqli_escape_string($conn,$_REQUEST['id'])."'";
$resim=query($conn,$sqlim);
$numim=numrows($resim);
if($numim>0)
{
$rand1=rand(1,999999);
$target="courseFile/";
$path1=$rand1.$_FILES['file']['name'];

$ext=pathinfo($path1, PATHINFO_EXTENSION);
if($ext=='gif' || $ext=='png' || $ext=='jpg' || $ext=='jpeg' || $ext=='pdf')
{
$target=$target.basename($path1); 
move_uploaded_file($_FILES['file']['tmp_name'], $target);
$sql="UPDATE `customer` SET `file`='".$path1."' WHERE `id`='".mysqli_escape_string($conn,$_REQUEST['id'])."'";
$res=query($conn,$sql);
}
}else
{ 
$rand1=rand(1,999999);
$target="courseFile/";
$path1=$rand1.$_FILES['file']['name'];

$ext=pathinfo($path1, PATHINFO_EXTENSION);
if($ext=='gif' || $ext=='png' || $ext=='jpg' || $ext=='jpeg'|| $ext=='pdf' )
{
$target=$target.basename($path1); 
move_uploaded_file($_FILES['file']['tmp_name'], $target);

$sqlim1="INSERT INTO `customer` (`file`,`id`) VALUES ('".$path1."','".mysqli_escape_string($conn,$_REQUEST['id'])."') ";
$resim1=query($conn,$sqlim1);
}
}
}
}
$sql="UPDATE `customer` SET `category`='".mysqli_escape_string($conn,$_POST['category'])."' WHERE `id`='".mysqli_escape_string($conn,$_REQUEST['id'])."'";
$res=query($conn,$sql);

redirect('course.php');


break;
case 'delete':

$sql="DELETE FROM `customer`  WHERE `id`='".$_REQUEST['id']."'";
$res=query($conn,$sql); 
//print_r($sql);
redirect('customer.php');
}
}

?>