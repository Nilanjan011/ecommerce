<?php
	include ('function.php');

	if(isset($_GET['case']))
	{

		switch($_GET['case'])
			{
				case 'add':
							$name=strtoupper($_POST['name']);	
							$description=strtoupper($_POST['description']);
							$result= mysqli_query($conn,"SELECT * FROM `category` WHERE `name`='$name'");
				        	$cunt=mysqli_num_rows($result);
					        if ($cunt<1)					       
					        {
								$insert_data="INSERT INTO `category`(`name`,`description`) VALUES ('$name','$description')";
								mysqli_query($conn,$insert_data);

								$id=mysqli_insert_id($conn);
								@mkdir("CATEGORY");
								$rand=rand(1,99999999999);
					        	$file_name=$_FILES['img']['name'];
					        	$tmp_name=$_FILES['img']['tmp_name'];
					        	$fivariablele_size=$_FILES['img']['size'];
					        	$path="CATEGORY/".$rand.$file_name;
					        	if($tmp_name!="")
					        	{
					        		$path="CATEGORY/".$id."_".$rand.$file_name;
					        		copy($tmp_name,$path);
							          $insert_img_data="UPDATE `category`SET `img`='$path' WHERE `id`='$id'";
							          mysqli_query($conn,$insert_img_data);
							          //print_r($insert_img_data);
									   header("Location:category.php?case=add&m=2");							
									}						
							}
							else
									{
										header("Location:category.php?case=add&m=1");
									}	
							
				break;
				case 'edit':
							$name=strtoupper($_POST['name']);
							$description=strtoupper($_POST['description']);
					  		$id=$_POST['id'];
					  		$img=$_POST['img1'];
					  		if($_FILES['img']['name'])			  		
					  		{
					  			unlink($img) ;
					  			@mkdir("CATEGORY");						        
					        	$rand=rand(1,99999999999);
					        	$file_name=$_FILES['img']['name'];
					        	$tmp_name=$_FILES['img']['tmp_name'];
					        	$fivariablele_size=$_FILES['img']['size'];
					        	$img="CATEGORY/".$rand.$file_name;
					        	if($tmp_name!="")
					        	{
					        		echo $img="CATEGORY/".$id."_".$rand.$file_name;
					        		copy($tmp_name,$img);
					        	}
					  		}
					  		
					          $update_data="UPDATE `category` SET `name`='$name', `description`='$description' ,`img`='$img' WHERE `id`='$id'";
					          mysqli_query($conn,$update_data);
					          print_r($update_data);
							  header("Location:category.php");
				break;	
				case 'del':
							$id=$_REQUEST['del_id'];					
							$sql="DELETE FROM `category`  WHERE `id`='$id'";
							$res=mysqli_query($conn,$sql);											
							header("Location:category.php");
			}
	}			
?>
