<?php
session_start();
include('connection.php');
include('function.php');

if($_SESSION['aid'])
{


if(isset($_GET['case'])){

switch($_GET['case']){
	case 'status_active':
		$id=$_REQUEST['id'];
		$date=date('Y-m-d');
		// UPDATE `orders` SET `status`='A' WHERE `id`=2;
		echo $sql="UPDATE `order_statement` SET `status`='A',`status_date`='$date' WHERE `id`='".mysqli_escape_string($conn,$id)."'";
		// die();
		mysqli_query($conn,$sql);

		redirect('order.php');
	break;
	case 'status_deactive':
		$id=$_REQUEST['id'];
		// $date=date('Y-m-d');
		// UPDATE `orders` SET `status`='A' WHERE `id`=2;
		echo $sql="UPDATE `order_statement` SET `status`='I' WHERE `id`='".mysqli_escape_string($conn,$id)."'";
		// die();
		mysqli_query($conn,$sql);

		redirect('order.php');
	break;

	case 'delstatus':
		$id=$_REQUEST['id'];
		$date=date('Y-m-d');
		$sql="UPDATE `order_statement` SET `delstatus`='A',`deldate`='$date' where id='".mysqli_escape_string($conn,$id)."'";
		mysqli_query($conn,$sql);

		redirect('order.php');

	break;
	case 'shipping_status':
		$id=$_REQUEST['id'];
		$date=date('Y-m-d');

		$sql="UPDATE `order_statement` SET `shipping_status`='A',`shipping_date`='$date' where id='".mysqli_escape_string($conn,$id)."'";
		mysqli_query($conn,$sql);

		redirect('order.php');
	break;
	}
}
}

?>