<?php
	include ('function.php');

	if(isset($_GET['case']))
	{

		switch($_GET['case'])
			{
				case 'add':
							$colour=strtoupper($_POST['colour']);						
							$result= mysqli_query($conn,"SELECT * FROM `colour` WHERE `colour`='$colour'");
				        	$cunt=mysqli_num_rows($result);
					        if ($cunt<1)					       
					        {
								$insert_data="INSERT INTO `colour`(`colour`) VALUES ('$colour')";
								mysqli_query($conn,$insert_data);	
								header("Location:colour.php?case=add&m=2");							
							}	
							else
							{
								header("Location:colour.php?case=add&m=1");
							}
							
				break;
				case 'del':
							$id=$_REQUEST['del_id'];					
							$sql="DELETE FROM `colour`  WHERE `id`='$id'";
							$res=mysqli_query($conn,$sql);											
							header("Location:colour.php");
				break;
				case 'edit':
							$colour=strtoupper($_POST['colour']);
							$id=$_POST['id'];			  		
			          		$update_data="UPDATE `colour` SET `colour`='$colour' WHERE `id`='$id'";
			          		mysqli_query($conn,$update_data);
			          		print_r($update_data);
							header("Location:colour.php");
				break;			
			}
	}			
?>
