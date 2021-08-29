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
                      <div class="col-md-10" >
                        <h3 class="card-title">Size Table</h3>
                      </div>
                      <div class="col-md-2">
                        <a href="size.php?case=add" class="btn btn-info mr-2">+ Add Size</a> 
                      </div>
                    </div>                    
                  </div>  
                  <br><br>              
                    <div class="table-responsive">
                        <table class="expandable-table table table-striped table-borderless" style="width:100%">
                          <thead>
                            <tr>
                              <th>Serial No.</th>
                              <th>Size</th>
                              <th>Action</th> 
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                                $no=1;
                                $select_size='SELECT * FROM `size`  ORDER BY `id` DESC ';
                                $run_size=(mysqli_query($conn,$select_size));
                                while ($fetch_size=mysqli_fetch_array($run_size)) 
                                {
                              ?>
                                <tr>
                                  <td>#<?php echo $no;?></td>
                                  <td><?php echo $fetch_size['size'];?></td>
                                  <td>
                                    <div class="tools" style="text-align: right; right:0;">            
                                      <a href='<?php echo "size.php?case=edit&u_id=$fetch_size[id]";?>'>
                                      <i class='fa fa-edit ' style='cursor:pointer;'></i></a>
                                      <a href='<?php echo "size-process.php?case=del&del_id=$fetch_size[id]";?>'><i class='fa fa-trash-o' style='color: red; text-decoration: none;'></i></a>
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
                              <h4 class="card-title">Add Size Chart</h4>
                            </div>
                            <div class="col-md-2">
                              <a href="size.phpc" class="btn btn-success mr-2">Back</a> 
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
                          <form class="forms-sample" action="size-process.php?case=add" method="POST">
                            <div class="form-group">
                              <label for="exampleInputName1">Size</label>
                              <input type="text" class="form-control" id="size" name="size" placeholder="Enter Size">
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
                          <h4 class="card-title">Update Size Chart</h4>
                          <p class="card-description">
                           
                          </p>
                          <form class="forms-sample" action="size-process.php?case=edit" method="POST">
                            <div class="form-group">
                              <label for="exampleInputName1">Size</label>
                              <input type="text" class="form-control" id="size" name="size" value="<?php echo getSize($conn,$id,'size');?>">
                              <input type="hidden" name="id" value="<?php echo $id;?>">
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
