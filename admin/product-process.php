<?php
	include ('function.php');

	if(isset($_GET['case']))
	{

		switch($_GET['case'])
			{
				case 'add':
							$name=strtoupper($_POST['name']);
							$title=strtoupper($_POST['title']);
							$description=strtoupper($_POST['description']);
							$category_id=$_POST['category_id'];
							$mrp=$_POST['mrp'];
							$selling_price=$_POST['selling_price'];
							$offer=$_POST['offer'];
							$brand_id=$_POST['brand_id'];
							$result= mysqli_query($conn,"SELECT * FROM `product` WHERE `name`='$name'");
				        	$cunt=mysqli_num_rows($result);
					        if ($cunt<1)					       
					        {
								$insert_data="INSERT INTO `product`(`name`, `title`, `description`, `category_id`, `mrp`, `selling_price`, `offer`, `brand_id`) VALUES ('$name', '$title', '$description', '$category_id', '$mrp', '$selling_price', '$offer', '$brand_id')";
								mysqli_query($conn,$insert_data);
								print_r($insert_data);
								$id=mysqli_insert_id($conn);
								@mkdir('PRODUCT_IMAGE');

								foreach ($_FILES['img']['name'] as $key => $value) 
							        {
							        	$rand=rand(1,99999999999);
							        	echo $file_name=$_FILES['img']['name'][$key];
							        	echo $tmp_name=$_FILES['img']['tmp_name'][$key];
							        	echo $file_size=$_FILES['img']['size'][$key];
							        	if($tmp_name!="")
							        	{
							        		$rand=rand(1,99999999999);
							        		$path="PRODUCT_IMAGE/".$rand.$file_name;
							        		copy($tmp_name,$path);
									         $insert_data1="INSERT INTO `product_img`(`img`,`product_id`) VALUES('$path','$id')";
									        mysqli_query($conn,$insert_data1);
									        print_r($insert_data1);
									    }
									}
								
								foreach ($_POST['size_id'] as $key => $value) 
							        {
							        	$size_id=$_POST['size_id'][$key];
								        $insert_data="INSERT INTO `product_size`(`size_id`,`product_id`) VALUES('$size_id','$id')";
								        mysqli_query($conn,$insert_data);
									    
									}	
								foreach ($_POST['colour_id'] as $key => $value) 
							        {
							        	$size_id=$_POST['colour_id'][$key];
								        $insert_data="INSERT INTO `product_colour`(`colour_id`,`product_id`) VALUES('$size_id','$id')";
								        mysqli_query($conn,$insert_data);
									    
									}	
									 header("Location:product.php?case=add&m=2");									
							}
							else
									{
										header("Location:product.php?case=add&m=1");
									}	
							
				break;
				case 'del':
							$id=$_REQUEST['del_id'];					
							$sql="DELETE FROM `product`  WHERE `id`='$id'";
							$res=mysqli_query($conn,$sql);
							$sql="DELETE FROM `product_size`  WHERE `id`='$id'";
							$res=mysqli_query($conn,$sql);	
							$select_img="SELECT * FROM `product_img` WHERE `product_id`='$id'";
                            $run_img=(mysqli_query($conn,$select_img));
                            $fetch_img=mysqli_fetch_array($run_img);
                            unlink($fetch_img['img']);
							$sql="DELETE FROM `product_img`  WHERE `product_id`='$id'";
							$res=mysqli_query($conn,$sql);
							$sql="DELETE FROM `product_colour`  WHERE `id`='$id'";
							$res=mysqli_query($conn,$sql);											

							header("Location:product.php");
				break;
				case 'edit':
							$name=strtoupper($_POST['name']);
							$title=strtoupper($_POST['title']);
							$description=strtoupper($_POST['description']);
							$category_id=$_POST['category_id'];
							$mrp=$_POST['mrp'];
							$selling_price=$_POST['selling_price'];
							$offer=$_POST['offer'];
							$brand_id=$_POST['brand_id'];
					  		$id=$_POST['id'];
					  		$sql="DELETE FROM `product_colour` WHERE `product_id`='$id'";
							$res=mysqli_query($conn,$sql);
							$sql="DELETE FROM `product_size` WHERE `product_id`='$id'";
							$res=mysqli_query($conn,$sql);
					        $update_data="UPDATE `product` SET`name`='$name',`title`='$title',`description`='$description',`category_id`='$category_id',`mrp`='$mrp',`selling_price`='$selling_price',`offer`='$offer',`brand_id`='$brand_id' WHERE `id`='$id'";
					        mysqli_query($conn,$update_data);
					        print_r($update_data);

					        
							foreach ($_POST['size_id'] as $key => $value) 
							        {
							        	$size_id=$_POST['size_id'][$key];
								        $insert_data="INSERT INTO `product_size`(`size_id`,`product_id`) VALUES('$size_id','$id')";
								        mysqli_query($conn,$insert_data);
									    
									}	
							foreach ($_POST['colour_id'] as $key => $value) 
							        {
							        	$size_id=$_POST['colour_id'][$key];
								        $insert_data="INSERT INTO `product_colour`(`colour_id`,`product_id`) VALUES('$size_id','$id')";
								        mysqli_query($conn,$insert_data);
									    
									}
							header("Location:product.php");
				break;	
				case 'addimg':
							$id=$_POST['id'];
							foreach ($_FILES['img']['name'] as $key => $value) 
					        {
					        	$rand=rand(1,99999999999);
					        	echo $file_name=$_FILES['img']['name'][$key];
					        	echo $tmp_name=$_FILES['img']['tmp_name'][$key];
					        	echo $file_size=$_FILES['img']['size'][$key];
					        	if($tmp_name!="")
					        	{
					        		$rand=rand(1,99999999999);
					        		$path="PRODUCT_IMAGE/".$rand.$file_name;
					        		copy($tmp_name,$path);
							         $insert_data1="INSERT INTO `product_img`(`img`,`product_id`) VALUES('$path','$id')";
							        mysqli_query($conn,$insert_data1);
							        print_r($insert_data1);
							    }
							}
							header("Location:product.php?case=edit&u_id=$id");

				break;					
			}
	}			
?>
