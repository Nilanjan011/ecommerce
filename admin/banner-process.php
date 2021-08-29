<?php
	include ('function.php');

	if(isset($_GET['case']))
	{

		switch($_GET['case'])
			{
				case 'add':
							
							$insert_data="INSERT INTO `banner`(`id`,`img`) VALUES (' ',' ')";
								mysqli_query($conn,$insert_data);

								$id=mysqli_insert_id($conn);
								@mkdir("banner");
								$rand=rand(1,99999999999);
					        	$file_name=$_FILES['img']['name'];
					        	$tmp_name=$_FILES['img']['tmp_name'];
					        	$fivariablele_size=$_FILES['img']['size'];
					        	$path="banner/".$rand.$file_name;
					        	if($tmp_name!="")
					        	{
					        		$path="banner/".$id."_".$rand.$file_name;
					        		copy($tmp_name,$path);
							          $insert_img_data="UPDATE `banner`SET `img`='$path' WHERE `id`='$id'";
							          mysqli_query($conn,$insert_img_data);
							          //print_r($insert_img_data);
									   header("Location:banner.php?case=add");							
															
								}	
							
				break;
				case 'edit':
							
					  		$id=$_POST['id'];
					  		$img=$_POST['img1'];
					  		
					  		if($_FILES['img']['name'])			  		
					  		{
					  			unlink($img) ;
					  			@mkdir("banner");						        
					        	$rand=rand(1,99999999999);
					        	$file_name=$_FILES['img']['name'];
					        	$tmp_name=$_FILES['img']['tmp_name'];
					        	$fivariablele_size=$_FILES['img']['size'];
					        	$img="banner/".$rand.$file_name;
					        	if($tmp_name!="")
					        	{
					        		echo $img="banner/".$id."_".$rand.$file_name;
					        		copy($tmp_name,$img);
					        	}
					  		}
					  		
					          $update_data="UPDATE `banner` SET `img`='$img' WHERE `id`='$id'";
					          mysqli_query($conn,$update_data);
					          print_r($update_data);
							  header("Location:banner.php");
				break;	
				case 'del':
							$id=$_REQUEST['del_id'];					
							$sql="DELETE FROM `banner`  WHERE `id`='$id'";
							$res=mysqli_query($conn,$sql);											
							header("Location:banner.php");
			}
	}			
?>
