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
                        <h3 class="card-title">banner Table</h3>
                      </div>
                      <div class="col-md-3">
                        <a href="banner.php?case=add" class="btn btn-info mr-2">+ Add banner</a> 
                      </div>
                    </div>                    
                  </div>  
                  <br><br>              
                    <div class="table-responsive">
                        <table class="expandable-table table table-striped table-borderless">
                          <thead>
                            <tr>
                              <th>Serial No.</th>
                              <th>Image</th> 
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                                $no=1;
                                $select_banner='SELECT * FROM `banner`  ORDER BY `id` DESC ';
                                $run_banner=(mysqli_query($conn,$select_banner));
                                while ($fetch_banner=mysqli_fetch_array($run_banner)) 
                                {
                              ?>
                                <tr>
                                  <td width="">#<?php echo $no;?></td>
                                  <td><img src="<?php echo $fetch_banner['img'];?>" height="150" width="150"></td>
                                  <td>
                                    <div class="tools" style="text-align: right; right:0;">            
                                      <a href='<?php echo "banner.php?case=edit&u_id=$fetch_banner[id]";?>'>
                                      <i class='fa fa-edit ' style='cursor:pointer;'></i></a>
                                      <a href='<?php echo "banner-process.php?case=del&del_id=$fetch_banner[id]";?>'><i class='fa fa-trash-o' style='color: red; text-decoration: none;'></i></a>
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
                              <h4 class="card-title">Add Bsanner Img</h4>
                            </div>
                            <div class="col-md-2">
                              <a href="banner.php" class="btn btn-success mr-2">Back</a> 
                            </div>
                          </div>
                          <p class="card-description">
                           
                          </p>
                            
                          <form class="forms-sample" action="banner-process.php?case=add" method="POST"  enctype="multipart/form-data">
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
                          <h4 class="card-title">Update Banner Img</h4>
                          <p class="card-description">
                           
                          </p>
                          <form class="forms-sample" action="banner-process.php?case=edit" method="POST"  enctype="multipart/form-data">
                            <div class="form-group">
                              <label>File upload</label>
                              <input type="file" name="img" id="img" accept=".jpg,.jpeg,.png">
                              <input type="hidden" name="id" id="id" value="<?php echo $id;?>">
                              <img src="<?php echo getbanner($conn,$id,'img');?>" height="100" width="100">  
                               <input type="hidden" name="img1" value="<?php echo getbanner($conn,$id,'img');?>">                           
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
