<?php
	include ('function.php');

	if(isset($_GET['case']))
	{

		switch($_GET['case'])
			{
				case 'add':
							$size=strtoupper($_POST['size']);						
							$result= mysqli_query($conn,"SELECT * FROM `size` WHERE `size`='$size'");
				        	$cunt=mysqli_num_rows($result);
					        if ($cunt<1)					       
					        {
								$insert_data="INSERT INTO `size`(`size`) VALUES ('$size')";
								mysqli_query($conn,$insert_data);								
							   	header("Location:size.php?case=add&m=2");							
							}	
							else
							{
								header("Location:size.php?case=add&m=1");
							}
				break;
				case 'del':
							$id=$_REQUEST['del_id'];					
							$sql="DELETE FROM `size`  WHERE `id`='$id'";
							$res=mysqli_query($conn,$sql);											
							header("Location:size.php");
				break;
				case 'edit':
							$size=strtoupper($_POST['size']);
							$id=$_POST['id'];			  		
			          		$update_data="UPDATE `size` SET `size`='$size' WHERE `id`='$id'";
			          		mysqli_query($conn,$update_data);
			          		print_r($update_data);
							header("Location:size.php");
				break;				
			}
	}			
?>
