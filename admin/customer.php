<?php
// include('connection.php');
session_start();
include('function.php');
if(!isset($_SESSION['aid']))
{
redirect('login.php');
}
?>

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
     <?php include('header.php');?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      
      
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
       <?php include('leftpanel.php');?>
      <!-- partial -->
    <div class="main-panel">
    <?php
    if ($_REQUEST['case']=="") {
    ?>
                
        <div class="content-wrapper">
          <div class="row">
            
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Customer</h4>
                  <a href="customer.php?case=add" class="btn btn-primary mb-2" >add</a>
                  
                  <div class="table-responsive">
                        <table class="expandable-table table table-striped table-borderless" style="width:100%">
                          <thead>
                            <tr>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Phone no</th>
                              <th>Address</th>
                              <th>Action</th>
                            </tr>
                          </thead>
						            <tbody>
                        <?php
                          //$data=getCustomer($conn,"select * from customer");
                          // echo "<pre>";
                          // print_r($data);
                        $sql="SELECT * FROM customer ORDER BY id DESC ";
                        $res=mysqli_query($conn,$sql);
                        if(numrows($res)){

                          while($fetch=mysqli_fetch_array($res)){
                            ?>
                            <tr>
    						              <td><?= ucwords($fetch['name'])?></td>
                              <td><?= $fetch['email']?></td>
                              <td class="font-weight-bold"><?= $fetch['ph_no']?></td>
                              <td style="word-wrap: break-word;white-space: normal;" ><?= $fetch['address']?></td>
                              <td>
                              <a href="customer.php?case=edit&id=<?=$fetch['id'] ?>" class="btn btn-primary">Edit</a>
                              <a href="customer-process.php?case=delete&id=<?=$fetch['id'] ?>" class="btn btn-danger"  onClick="return confirm('Are you sure want to Delete ?');">Delete</a>
                              </td>
                              <!-- <td class="font-weight-medium"><div class="badge"></div></td> -->
                            </tr>
                    <?php } 
                        }else{
                          echo "<h3>No data found</h3>";
                        }
                    ?>
                      </tbody>
                      </table>
                      </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <!-- partial -->
       
      
    <?php
    }

    if ($_REQUEST["case"]=="add") {

    ?>
               
        <div class="content-wrapper">
          <div class="row">
            
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Customer</h4>
                  
                  <form class="forms-sample" action="customer-process.php?case=add" method="post">
                    <div class="form-group">
                      <label for="exampleInputName1">Name</label>
                      <input type="text" class="form-control" id="name" required name="name" placeholder="Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Email address</label>
                      <input type="email" class="form-control" id="email" required name="email" placeholder="Email">
                    </div>
                    <!-- <div class="form-group">
                      <label for="exampleInputPassword4">Password</label>
                      <input type="password" class="form-control" id="password" required name="password" placeholder="Password">
                    </div> -->
                    <div class="form-group">
                      <label for="exampleInputPassword4">Phone No.</label>
                      <input type="number" class="form-control" id="ph_no" required name="ph_no" placeholder="Phone No">
                    </div>
                
                    <div class="form-group">
                      <label for="exampleTextarea1">Address</label>
                      <textarea class="form-control" name="address" required id="address" rows="4"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                  </form>
                </div>
              </div>
            </div>
            

          </div>
        </div>
      
<?php
    }
    if ($_REQUEST['case']=="edit") {
      ?>
             
        <div class="content-wrapper">
          <div class="row">
            
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Customer</h4>
                   <?php
                      $sql1="SELECT * FROM `customer` WHERE `id`='".mysqli_escape_string($conn,$_REQUEST['id'])."'";
                      $res1=query($conn,$sql1);
                      $num1=numrows($res1);
                      if($num1>0)
                      {
                      $fetch1=fetcharray($res1);
                      // var_dump($fetch1);
                      }


                    ?>
                  
                  <form class="forms-sample" action="customer-process.php?case=edit&id=<?=$fetch1['id'] ?>" method="post">
                   
                    <div class="form-group">
                      <label for="exampleInputName1">Name</label>
                      <input type="text" class="form-control" id="name" required name="name" placeholder="Name" value="<?= $fetch1['name']?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Email address</label>
                      <input type="email" class="form-control" id="email" required name="email" placeholder="Email" value="<?= $fetch1['email']?>">
                    </div>

                    <!-- <div class="form-group">
                      <label for="exampleInputPassword4">Password</label>
                      <input type="password" class="form-control" id="password" required name="password" placeholder="Password">
                    </div> -->
                    <div class="form-group">
                      <label for="exampleInputPassword4">Phone No.</label>
                      <input type="number" class="form-control" id="ph_no" required name="ph_no" placeholder="Phone No" value="<?= $fetch1['ph_no']?>">
                    </div>
                
                    <div class="form-group">
                      <label for="exampleTextarea1">Address</label>
                      <textarea class="form-control" name="address" required id="address" rows="4"><?= $fetch1['address']?>
                      </textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Update</button>
                  </form>
                </div>
              </div>
            </div>
            

          </div>
        </div>
      

    <?php
    }
    ?>
     <?php include('footer.php');?>
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
