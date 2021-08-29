<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Administrator</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/select2/select2.min.css">
  <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />

</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
     <?php include('header.php');
      include ('function.php');?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      
      
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
       <?php include('leftpanel.php');?>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
              <?php
                if($_REQUEST['case']=='')
                  {      
                ?>                
                <div class="card-body">                  
                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-9" >
                        <h3 class="card-title">product Table</h3>
                      </div>
                      <div class="col-md-3">
                        <a href="product.php?case=add" class="btn btn-info mr-2">+ Add Product</a> 
                      </div>
                    </div>                    
                  </div>  
                  <br><br>              
                    <div class="table-responsive">
                        <table class="expandable-table table table-striped table-borderless">
                          <thead>
                            <tr>
                              <th>Serial No.</th>
                              <th>Name</th>
                              <th>Title</th>
                              <th>Image</th> 
                              <th>Description</th>
                              <th>Price</th>
                              <th>Size</th>
                              <th>Colour</th> 
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                                $no=1;
                                $select_product='SELECT * FROM `product`  ORDER BY `id` DESC ';
                                $run_product=(mysqli_query($conn,$select_product));
                                while ($fetch_product=mysqli_fetch_array($run_product)) 
                                {
                              ?>
                                <tr>
                                  <td width="">#<?php echo $no;?></td>
                                  <td style="word-wrap: break-word;white-space: normal;"><?php echo $fetch_product['name'];?></td>
                                  <td style="word-wrap: break-word;white-space: normal;"><?php echo $fetch_product['title'];?></td>
                                  <td>
                                    <div class="row">
                                    <?php
                                        $select_img="SELECT * FROM `product_img` WHERE `product_id`='$fetch_product[id]'";
                                        $run_img=(mysqli_query($conn,$select_img));
                                        while ($fetch_img=mysqli_fetch_array($run_img)) 
                                          {?>
                                          <div class="col-md-4">
                                              <img src="<?php echo $fetch_img['img'];?>" height="50" width="50">
                                           
                                          </div>
                                          <?php }?>
                                  </div>
                                  </td>
                                  <td style="word-wrap: break-word;white-space: normal;"><?php echo $fetch_product['description'];?></td>
                                  <td><?php echo $fetch_product['selling_price'];?></td>
                                  <td>
                                    <div class="row">
                                      <?php
                                          $select_size="SELECT * FROM `product_size` WHERE `product_id`='$fetch_product[id]'";
                                          $run_size=(mysqli_query($conn,$select_size));
                                          while ($fetch_size=mysqli_fetch_array($run_size)) 
                                            {?>
                                            <div class="col-md-3">
                                              <?php echo getSize($conn,$fetch_size['size_id'],'size');?>
                                            </div>
                                            <?php }?>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="row">
                                      <?php
                                          $select_colour="SELECT * FROM `product_colour` WHERE `product_id`='$fetch_product[id]'";
                                          $run_colour=(mysqli_query($conn,$select_colour));
                                          while ($fetch_colour=mysqli_fetch_array($run_colour)) 
                                            {?>
                                            <div class="col-md-3">
                                              <?php echo getColour($conn,$fetch_colour['colour_id'],'colour');?>
                                            </div>
                                            <?php }?>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="tools" style="text-align: right; right:0;">            
                                      <a href='<?php echo "product.php?case=edit&u_id=$fetch_product[id]";?>'>
                                      <i class='fa fa-edit ' style='cursor:pointer;'></i></a>
                                      <a href='<?php echo "product.php?case=view&u_id=$fetch_product[id]";?>'>
                                      <i class='fa fa-eye ' style='cursor:pointer;'></i></a>
                                      <a href='<?php echo "product-process.php?case=del&del_id=$fetch_product[id]";?>'><i class='fa fa-trash-o' style='color: red; text-decoration: none;'></i></a>
                                    </div>
                                  </td>
                            </tr>
                            <?php $no++;} ?>
                          </tbody>
                        </table>
                    </div>
                </div>
                <?php 
                  }
                if($_REQUEST['case']=='add')

                  {
                ?>
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-10" >
                              <h4 class="card-title">Add Product Chart</h4>
                            </div>
                            <div class="col-md-2">
                              <a href="product.php" class="btn btn-success mr-2">Back</a> 
                            </div>
                          </div>
                          <p class="card-description">
                           
                          </p>
                          <?php if($_REQUEST['m']==1)
                          {?>
                            <div class="alert alert-danger" align="center">
                            <button class="close" data-close="alert"></button>
                            <span>Already Exist</span>
                            </div>
                          <?php }?>
                            <?php if($_REQUEST['m']==2){?>
                            <div class="alert alert-success" align="center">
                            <button class="close" data-close="alert"></button>
                            <span>Class Added Successfully</span>
                            </div>
                            <?php }?>
                          <form class="forms-sample" action="product-process.php?case=add" method="POST"  enctype="multipart/form-data" >
                            <div class="row">
                              
                                <div class="col-md-6">
                                   <div class="form-group">
                                      <label for="exampleInputName1"><b>Name</b></label>
                                      <input type="text" class="form-control" id="name" name="name" placeholder="Enter product nane">
                                    </div>  
                                    <div class="form-group">
                                      <label for="exampleInputName1"><b>Title</b></label>
                                      <input type="text" class="form-control" id="title" name="title" placeholder="Enter product title">
                                    </div>
                                    <div class="form-group">
                                      <label for="mrp"><b>MRP</b></label>
                                      <input type="text" class="form-control" id="mrp" name="mrp" placeholder="Enter product mrp">
                                    </div>
                                    <div class="form-group">
                                      <label for="selling_price"><b>Selling Price</b></label>
                                      <input type="text" class="form-control" id="selling_price" name="selling_price" placeholder="Enter product selling price">
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleInputName1"><b>Offer</b></label>
                                      <input type="number" class="form-control" id="offer" name="offer" placeholder="Enter product offer">
                                    </div> 
                                    <div class="form-group">
                                    <label for="category_id"><b>Category</b></label><br>
                                    <select name="category_id" id="category_id" class="form-control" >
                                      <option value="" selected="" disabled="">SELECTED ONE</option>
                                      <?php
                                        $select_category="SELECT * FROM `category`";
                                        $run_category=(mysqli_query($conn,$select_category));
                                        while ($fetch_category=mysqli_fetch_array($run_category)) 
                                          {?>
                                          <option value="<?php echo $fetch_category['id'];?>"  ><?php echo $fetch_category['name'];?></option>
                                          <?php }?>
                                    </select>
                                  </div> 
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="description"><b>Description</b></label>
                                      <textarea class="form-control" id="description" name="description" rows="6"></textarea>
                                    </div>                                  
                                  <div class="form-group">
                                    <label for="size_id"><b>size</b></label><br>
                                    <div class="row">
                                      <?php
                                        $select_size="SELECT * FROM `size`";
                                        $run_size=(mysqli_query($conn,$select_size));
                                        while ($fetch_size=mysqli_fetch_array($run_size)) 
                                          {?>
                                          <div class="col-md-3">
                                            <input type="checkbox" id="size_id" name="size_id[]" value="<?php echo $fetch_size['id'];?>" class="radio-inline">
                                            <label for="size"><?php echo $fetch_size['size'];?></label><br>
                                          </div>
                                          <?php }?>
                                    </div>
                                    
                                  </div>
                                  <div class="form-group">
                                    <label for="size_id"><b>Size</b></label><br>
                                    <div class="row">
                                      <?php
                                        $select_size="SELECT * FROM `size`";
                                        $run_size=(mysqli_query($conn,$select_size));
                                        while ($fetch_size=mysqli_fetch_array($run_size)) 
                                          {?>
                                          <div class="col-md-2">
                                            <input type="checkbox" id="size_id" name="size_id[]" value="<?php echo $fetch_size['id'];?>" >
                                            <label for="size"><?php echo $fetch_size['size'];?></label><br>
                                          </div>
                                          <?php }?>
                                    </div>
                                    
                                  </div>
                                  <div class="form-group">
                                    <label for="brand_id"><b>Brand</b></label><br>                              
                                      <select name="brand_id" id="brand_id" class="form-control">
                                      <option value="" selected="" disabled="">SELECTED ONE</option>
                                      <?php
                                        $select_brand="SELECT * FROM `brand`";
                                        $run_brand=(mysqli_query($conn,$select_brand));
                                        while ($fetch_brand=mysqli_fetch_array($run_brand)) 
                                          {?>
                                          <option value="<?php echo $fetch_brand['id'];?>"  ><?php echo $fetch_brand['name'];?></option>
                                          <?php }?>
                                    </select>     
                                  </div>
                                  <div class="form-group">
                                    <label><b>Product Image</b></label>
                                    <input type="file" name="img[]" id="img" required="" multiple=" " accept=".jpg,.jpeg,.png">                              
                                  </div> 
                                  <button type="submit" class="btn btn-primary mr-2">Submit</button> 
                                </div>
                                                          
                            </div>
                           
                                            
                            
                          </form>
                          
                        </div>
                  <?php 
                  }
                  if($_REQUEST['case']=='edit')
                  {
                    $id=$_REQUEST['u_id'];
                ?>
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-10" >
                              <h4 class="card-title">Update Product</h4>
                            </div>
                            <div class="col-md-2">
                              <a href="product.php" class="btn btn-success mr-2">Back</a> 
                            </div>
                          </div>
                          <p class="card-description">
                           
                          </p>
                           <form class="forms-sample" action="product-process.php?case=edit" method="POST"  enctype="multipart/form-data" >
                            <div class="row">
                                <?php $id=$_REQUEST['u_id'];?>
                                <div class="col-md-6">
                                   <div class="form-group">
                                      <label for="exampleInputName1"><b>Name</b></label>
                                      <input type="text" class="form-control" id="name" name="name" value="<?php echo getProduct($conn,$id,'name');?>">
                                    </div>  
                                    <div class="form-group">
                                      <label for="exampleInputName1"><b>Title</b></label>
                                      <input type="text" class="form-control" id="title" name="title" value="<?php echo getProduct($conn,$id,'title');?>">
                                    </div>
                                    <div class="form-group">
                                      <label for="mrp"><b>MRP</b></label>
                                      <input type="text" class="form-control" id="mrp" name="mrp" value="<?php echo getProduct($conn,$id,'mrp');?>">
                                    </div>
                                    <div class="form-group">
                                      <label for="selling_price"><b>Selling Price</b></label>
                                      <input type="text" class="form-control" id="selling_price" name="selling_price" value="<?php echo getProduct($conn,$id,'selling_price');?>">
                                      <input type="hidden" name="id" value="<?php echo $id;?>">
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleInputName1"><b>Offer</b></label>
                                      <input type="number" class="form-control" id="offer" name="offer" value="<?php echo getProduct($conn,$id,'offer');?>">
                                    </div> 
                                    <div class="form-group">
                                    <label for="category_id"><b>Category</b></label><br>
                                    <select name="category_id" id="category_id" class="form-control" >
                                      <?php
                                        $select_category="SELECT * FROM `category`";
                                        $run_category=(mysqli_query($conn,$select_category));
                                        while ($fetch_category=mysqli_fetch_array($run_category)) 
                                        {
                                          if ($fetch_category['id']==getProduct($conn,$id,'category_id'))
                                            {

                                            ?>
                                            <option value="<?php echo $fetch_class['id'];?>" selected="" ><?php echo $fetch_category['name'];?></option>
                                            <?php
                                            }
                                            else
                                            {?>
                                              <option value="<?php echo $fetch_category['id'];?>" ><?php echo $fetch_category['name'];?></option>
                                                        <?php
                                        }}?>                                      
                                    </select>
                                  </div> 
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="description"><b>Description</b></label>
                                      <textarea class="form-control" id="description" name="description" rows="6"><?php echo getProduct($conn,$id,'description');?></textarea>
                                    </div>                                  
                                  <div class="form-group">
                                    <label for="size_id"><b>Colour</b></label><br>
                                    <div class="row">


                                      <?php
                                        $select_colour="SELECT * FROM `colour`";
                                        $run_colour=(mysqli_query($conn,$select_colour));
                                        while ($fetch_colour=mysqli_fetch_array($run_colour)) 
                                          {?>
                                          <div class="col-md-3">
                                            <input type="checkbox" id="colour_id" name="colour_id[]" value="<?php echo $fetch_colour['id'];?>" <?php if(getProductColourRow($conn,$id,$fetch_colour['id'])==1){?> checked="checked"<?php } ?>>
                                            <label for="colour"><?php echo $fetch_colour['colour'];?></label><br>
                                          </div>
                                          <?php }?>
                                    </div>
                                    
                                  </div>
                                  <div class="form-group">
                                    <label for="size_id"><b>Size</b></label><br>
                                    <div class="row">
                                      <?php
                                        $select_size="SELECT * FROM `size`";
                                        $run_size=(mysqli_query($conn,$select_size));
                                        while ($fetch_size=mysqli_fetch_array($run_size)) 
                                          {
                                            
                                            ?>
                                          <div class="col-md-3">
                                            <input type="checkbox" id="size_id" name="size_id[]" value="<?php echo $fetch_size['id'];?>" <?php if(getProductSizeRow($conn,$id,$fetch_size['id'])==1){?> checked="checked"<?php } ?>>
                                            <label for="size"><?php echo $fetch_size['size'];?></label><br>
                                          </div>
                                          <?php }?>
                                    </div>
                                    
                                  </div>
                                  <div class="form-group">
                                    <label for="brand_id"><b>Brand</b></label><br>                              
                                      <select name="brand_id" id="brand_id" class="form-control">
                                      <option value="" selected="" disabled="">SELECTED ONE</option>
                                      <?php
                                        $select_brand="SELECT * FROM `brand`";
                                        $run_brand=(mysqli_query($conn,$select_brand));
                                        while ($fetch_brand=mysqli_fetch_array($run_brand)) 
                                        {
                                          if ($fetch_brand['id']==getProduct($conn,$id,'brand_id'))
                                            {

                                            ?>
                                            <option value="<?php echo $fetch_class['id'];?>" selected="" ><?php echo $fetch_brand['name'];?></option>
                                            <?php
                                            }
                                            else
                                            {?>
                                              <option value="<?php echo $fetch_brand['id'];?>" ><?php echo $fetch_brand['name'];?></option>
                                                        <?php
                                        }}?>
                                    </select>     
                                  </div>
                                  <div class="form-group">
                                    <label><b>Product Image</b></label>
                                    <div class="row">
                                    <?php
                                        $select_img="SELECT * FROM `product_img` WHERE `product_id`='$id'";
                                        $run_img=(mysqli_query($conn,$select_img));
                                        while ($fetch_img=mysqli_fetch_array($run_img)) 
                                          {?>
                                          <div class="col-md-4">
                                              <img src="<?php echo $fetch_img['img'];?>" height="150" width="150">                                           
                                          </div>
                                          <?php } ?>
                                          <div class="col-md-2">
                                            <a href="<?php echo 'product.php?case=addimg&u_id='.$id;?>" class="btn btn-primary mr-2">ADD MORE</a>
                                          </div>
                                  </div>
                           
                                  </div> 
                                  <button type="submit" class="btn btn-primary mr-2" name="Update">Submit</button> 
                                </div>
                                                          
                            </div>
                           
                                            
                            
                          </form>
                        </div>
                  <?php 
                  }
                  if($_REQUEST['case']=='addimg')
                  {
                    $id=$_REQUEST['u_id'];
                ?>
                        <div class="card-body">
                          <h4 class="card-title">Update Size Chart</h4>
                          <p class="card-description">
                           
                          </p>
                          <form class="forms-sample" action="product-process.php?case=addimg" method="POST"  enctype="multipart/form-data">
                            <div class="form-group">
                              <label for="exampleInputName1"><b>Image Upload</b></label><br>
                              <input type="file" name="img[]" id="img" required="" multiple=" " accept=".jpg,.jpeg,.png"> 
                              <input type="hidden" name="id" value="<?php echo $id;?>">
                            </div>                     
                            <button type="submit" class="btn btn-primary mr-2" name="Upload">Upload</button>
                          </form>
                        </div>
                  <?php 
                  }
                  if($_REQUEST['case']=='view')
                  {
                    $id=$_REQUEST['u_id'];
                ?>
                  <div class="card-body">
                          <div class="row">
                            <div class="col-md-10" >
                              <h4 class="card-title">Update Product</h4>
                            </div>
                            <div class="col-md-2">
                              <a href="product.php" class="btn btn-success mr-2">Back</a> 
                            </div>
                          </div>
                          <p class="card-description">
                           
                          </p>
                           <form class="forms-sample" action="product-process.php?case=edit" method="POST"  enctype="multipart/form-data" >
                            <div class="row">
                                <?php $id=$_REQUEST['u_id'];?>
                                <div class="col-md-6">
                                   <div class="form-group">
                                      <label for="exampleInputName1"><b>Name</b></label>: 
                                      <?php echo getProduct($conn,$id,'name');?>
                                    </div>  
                                    <div class="form-group">
                                      <label for="exampleInputName1"><b>Title</b></label>
                                      : <?php echo getProduct($conn,$id,'title');?>
                                    </div>
                                    <div class="form-group">
                                      <label for="mrp"><b>MRP</b></label>
                                      :<?php echo getProduct($conn,$id,'mrp');?>Rs
                                    <div class="form-group">
                                      <label for="selling_price"><b>Selling Price</b></label>
                                      :<?php echo getProduct($conn,$id,'selling_price');?>Rs
                                      <input type="hidden" name="id" value="<?php echo $id;?>">
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleInputName1"><b>Offer</b></label>
                                      :<?php echo getProduct($conn,$id,'offer');?>
                                    </div>                                     
                                    <div class="form-group">
                                    <label for="category_id"><b>Category</b></label><br>
                                      <?php
                                        $select_category="SELECT * FROM `category`";
                                        $run_category=(mysqli_query($conn,$select_category));
                                        while ($fetch_category=mysqli_fetch_array($run_category)) 
                                        {
                                          if ($fetch_category['id']==getProduct($conn,$id,'category_id'))
                                            {
                                              echo $fetch_category['name'];
                                        }}?>                                      
                                    
                                  </div> 
                                </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="description"><b>Description</b></label>
                                    :<?php echo getProduct($conn,$id,'description');?>
                                  </div>                              
                                  <div class="form-group">
                                    <label for="size_id"><b>Colour</b></label>:
                                    <div class="row">
                                      <?php
                                        $select_colour="SELECT * FROM `colour`";
                                        $run_colour=(mysqli_query($conn,$select_colour));
                                        while ($fetch_colour=mysqli_fetch_array($run_colour)) 
                                          {
                                            if(getProductColourRow($conn,$id,$fetch_colour['id'])==1){
                                              ?>
                                          <div class="col-md-3">
                                            <?php echo $fetch_colour['colour'];?>
                                          </div>
                                          <?php }}?>
                                    </div>
                                    
                                  </div>
                                  <div class="form-group">
                                    <label for="size_id"><b>Size</b></label><br>
                                    <div class="row">
                                      <?php
                                        $select_size="SELECT * FROM `size`";
                                        $run_size=(mysqli_query($conn,$select_size));
                                        while ($fetch_size=mysqli_fetch_array($run_size)) 
                                          {
                                            if(getProductSizeRow($conn,$id,$fetch_size['id'])==1){
                                            ?>
                                           <div class="col-md-3"><?php echo $fetch_size['size'];?>
                                          </div>
                                          <?php } }?>
                                    </div>
                                    
                                  </div>
                                  <div class="form-group">
                                    <label for="brand_id"><b>Brand</b></label>:
                                      <?php
                                        $select_brand="SELECT * FROM `brand`";
                                        $run_brand=(mysqli_query($conn,$select_brand));
                                        while ($fetch_brand=mysqli_fetch_array($run_brand)) 
                                        {
                                          if ($fetch_brand['id']==getProduct($conn,$id,'brand_id'))
                                            {
                                               echo $fetch_brand['name'];
                                        }}?>
                                   
                                  </div>
                                  
                           
                                  </div> 
                                  
                                </div>
                                 <div class="col-md-12">
                                   <div class="form-group">
                                    <label><b>Product Image</b></label>
                                    <div class="row">
                                    <?php
                                        $select_img="SELECT * FROM `product_img` WHERE `product_id`='$id'";
                                        $run_img=(mysqli_query($conn,$select_img));
                                        while ($fetch_img=mysqli_fetch_array($run_img)) 
                                          {?>
                                          <div class="col-md-2">
                                              <img src="<?php echo $fetch_img['img'];?>" height="150" width="150">                                           
                                          </div>
                                          <?php } ?>
                                          
                                  </div>
                                 </div>                         
                            </div>
                           
                                            
                            
                          </form>
                        </div>
                <?php }?>          
              </div>
            </div>
            
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php include('footer.php');?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="vendors/select2/select2.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/file-upload.js"></script>
  <script src="js/typeahead.js"></script>
  <script src="js/select2.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
