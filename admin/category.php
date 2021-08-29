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
                        <h3 class="card-title">Category Table</h3>
                      </div>
                      <div class="col-md-3">
                        <a href="category.php?case=add" class="btn btn-info mr-2">+ Add Category</a> 
                      </div>
                    </div>                    
                  </div>  
                  <br><br>              
                    <div class="table-responsive">
                        <table class="expandable-table table table-striped table-borderless">
                          <thead>
                            <tr>
                              <th>Serial No.</th>
                              <th>Category Name</th>
                              <th>Image</th> 
                              <th>Description</th> 
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                                $no=1;
                                $select_category='SELECT * FROM `category`  ORDER BY `id` DESC ';
                                $run_category=(mysqli_query($conn,$select_category));
                                while ($fetch_category=mysqli_fetch_array($run_category)) 
                                {
                              ?>
                                <tr>
                                  <td width="">#<?php echo $no;?></td>
                                  <td><?php echo $fetch_category['name'];?></td>
                                  <td><img src="<?php echo $fetch_category['img'];?>" height="150" width="150"></td>
                                  <td style="word-wrap: break-word;white-space: normal;"><?php echo $fetch_category['description'];?></td>
                                  <td>
                                    <div class="tools" style="text-align: right; right:0;">            
                                      <a href='<?php echo "category.php?case=edit&u_id=$fetch_category[id]";?>'>
                                      <i class='fa fa-edit ' style='cursor:pointer;'></i></a>
                                      <a href='<?php echo "category-process.php?case=del&del_id=$fetch_category[id]";?>'><i class='fa fa-trash-o' style='color: red; text-decoration: none;'></i></a>
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
                              <h4 class="card-title">Add Category Chart</h4>
                            </div>
                            <div class="col-md-2">
                              <a href="category.php" class="btn btn-success mr-2">Back</a> 
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
                          <form class="forms-sample" action="category-process.php?case=add" method="POST"  enctype="multipart/form-data">
                            <div class="form-group">
                              <label for="exampleInputName1">Name</label>
                              <input type="text" class="form-control" id="name" name="name" placeholder="Enter category">
                            </div>  
                            <div class="form-group">
                              <label for="description">Description</label>
                              <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                            </div> 
                            <div class="form-group">
                              <label>File upload</label>
                              <input type="file" name="img" id="img" required="" accept=".jpg,.jpeg,.png">                              
                            </div>                  
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>

                          </form>
                        </div>
                  <?php 
                  }
                  if($_REQUEST['case']=='edit')
                  {
                    $id=$_REQUEST['u_id'];
                ?>
                        <div class="card-body">
                          <h4 class="card-title">Update Category Chart</h4>
                          <p class="card-description">
                           
                          </p>
                          <form class="forms-sample" action="category-process.php?case=edit" method="POST"  enctype="multipart/form-data">
                            <div class="form-group">
                              <label for="exampleInputName1">Name</label>
                              <input type="text" class="form-control" id="name" name="name" value="<?php echo getCategory($conn,$id,'name');?>">
                              <input type="hidden" name="id" value="<?php echo $id;?>">
                            </div>  
                            <div class="form-group">
                              <label for="description">Description</label>
                              <textarea class="form-control" id="description" name="description" rows="4"> <?php echo getCategory($conn,$id,'description');?></textarea>
                            </div> 
                            <div class="form-group">
                              <label>File upload</label>
                              <input type="file" name="img" id="img" accept=".jpg,.jpeg,.png">
                              <img src="<?php echo getCategory($conn,$id,'img');?>" height="100" width="100">  
                               <input type="hidden" name="img1" value="<?php echo getCategory($conn,$id,'img');?>">                           
                            </div>                  
                            <button type="submit" class="btn btn-primary mr-2" name="Update">Submit</button>
                          </form>
                        </div>
                  <?php 
                  }?>           
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
