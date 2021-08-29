<?php
session_start();
include('connection.php');
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
  <style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #16eb21;
}

input:focus + .slider {
  box-shadow: 0 0 1px #16eb21;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
 
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
                  <h4 class="card-title">Order
                  <div class="text-right">  <a href="export.php" class="btn btn-primary">Export</a>
                  <a href="exportDB.php" class="btn btn-primary">Export DB</a>
                  </div>
                  </h4>
                  <div class="table-responsive">
                        <table class="expandable-table table table-striped table-borderless" style="width:100%">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Order Id</th>
                              <!-- <th>Product</th> -->
                              <th>Customer</th>
                              <th>Quantity</th>
                              <th>Total Amount</th>
                              <th>Order Date</th>
                              <th>Status</th>
                              <th>Shipping</th>
                              <th>Delivery</th>
                              <!-- <th>Shipping Date</th>
                              <th>Delivery Date</th>
                              <th>invoice_no</th> -->
                            </tr>
                          </thead>
						            <tbody>
                        <?php
             			      $i=1;
                        $sql="SELECT * FROM order_statement ORDER BY id DESC ";
                        $res=mysqli_query($conn,$sql);

                        while($fetch=mysqli_fetch_array($res)){
                          ?>
                  
                          <tr>
                          <td><?= $i++?></td>
                          	<td><a href="order.php?case=statement&id=<?= $fetch['orderid']?>"><?= $fetch['orderid']?></a></td>
  						              <!-- <td><?php //getProduct($conn,$fetch['product_id'],"name")?></td> -->
                            <td><?= ucwords(getCustomer($conn,$fetch['customerid'],"name"))?></td>
                            <td class="font-weight-bold"><?= $fetch['quantity']?></td>
                            <td><?= $fetch['total']?>
                            </td>
                            <td><?php
                                  $date=date_create($fetch['status_date']);
                                  echo date_format($date,"d-m-Y");
                                  ?>
                            </td>
                            <td>
                            <?php
                              
                              if ($fetch['status']=="I") {
                              ?>
                                <!-- <a href="order-process.php?case=status_active&id=<?php#$fetch['id']?>" class='badge badge-warning'>Pending</a> -->
                                
                                <label class="switch">
                                  <input type="checkbox" onclick="status(<?=$fetch['id']?>)">
                                  <span class="slider"></span>
                                </label>
                                
                              <?php
                              }else{
                                if ($fetch['status']=="C") {
                                ?>
                                  <div class="badge badge-danger">Cancel</div>
                                  
                                <?php
                                } else {
                                ?>
                                  <label class="switch">
                                  <input type="checkbox" checked onclick="destatus(<?=$fetch['id']?>)">
                                  <span class="slider"></span>
                                  </label>
                                  <!-- <div class="badge badge-success">Confirm
                                  <br>--><?php 
                                  //  $date=date_create($fetch['status_date']);
                                  //  echo date_format($date,"d-m-Y");
                                   ?>
                                  <!-- </div> -->
                                <?php
                                }
                              }
                              
                              ?>
                                
                            </td>
                            <td style="word-wrap: break-word;white-space: normal;">
                            <?php 
                            	if ($fetch['shipping_status']=="I") {
                                ?>
                                <a href="order-process.php?case=shipping_status&id=<?=$fetch['id']?>" class='badge badge-warning'>Pending</a>
                                <?php
                            	}else{
                                ?>
                                <div class="badge badge-success" >Shipped
                                <br><?php
                                   $date=date_create($fetch['status_date']);
                                   echo date_format($date,"d-m-Y");
                                   ?>
                                </div>
                                <?php
                            	}
                            	?>
                            </td>
                            <td><?php 
                            	if ($fetch['delstatus']=="I") {
                                ?>
                                <a href="order-process.php?case=delstatus&id=<?=$fetch['id']?>" class='badge badge-warning'>Pending</a>
                                <?php
                            	}else{
                                ?>
                                <div class="badge badge-success" >Delivered
                                <br><?php
                                   $date=date_create($fetch['status_date']);
                                   echo date_format($date,"d-m-Y");
                                   ?>
                                </div>
                                <?php
                            	}
                            	?>
                            </td>
                            
                            <!-- <td class="font-weight-medium"><div class="badge"></div></td> -->
                          </tr>
                  <?php } ?>
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

    if ($_REQUEST["case"]=="today") {

    ?>
               
    	 <div class="content-wrapper">
          <div class="row">
            
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Today Order</h4>
                  
                  <div class="table-responsive">
                        <table class="expandable-table table table-striped table-borderless" style="width:100%">
                          <thead>
                          <tr>
                              <th>No</th>
                              <th>Order Id</th>
                              <!-- <th>Product</th> -->
                              <th>Customer</th>
                              <th>Quantity</th>
                              <th>Total Amount</th>
                              <th>Order Date</th>
                              <th>Status</th>
                              <th>Shipping</th>
                              <th>Delivary</th>
                              <!-- <th>Shipping Date</th>
                              <th>Delivery Date</th>
                              <th>invoice_no</th> -->
                            </tr>
                          </thead>
						            <tbody>
                        <?php
                        $i=1;
                        $date=date("Y-m-d");
                        $sql="SELECT * FROM order_statement WHERE `date`='$date' ORDER BY id DESC ";
                        $res=mysqli_query($conn,$sql);
                        if(numrows($res)){
                        while($fetch=mysqli_fetch_array($res)){
                        ?>
                  
                  <tr>
                          <td><?= $i++?></td>
                          	<td><a href="order.php?case=statement&id=<?= $fetch['orderid']?>"><?= $fetch['orderid']?></a></td>
  						              <!-- <td><?php //getProduct($conn,$fetch['product_id'],"name")?></td> -->
                            <td><?=ucwords(getCustomer($conn,$fetch['customerid'],"name"))?></td>
                            <td class="font-weight-bold"><?= $fetch['quantity']?></td>
                            <td><?= $fetch['total']?>
                            </td>
                            <td><?php
                                   $date=date_create($fetch['status_date']);
                                   echo date_format($date,"d-m-Y");
                                   ?>
                            </td>
                            <td>
                            <?php
                              
                              if ($fetch['status']=="I") {
                              ?>
                                <a href="order-process.php?case=status_active&id=<?=$fetch['id']?>" class='badge badge-warning'>Pending</a>
                              <?php
                              }else{
                                if ($fetch['status']=="C") {
                                ?>
                                  <div class="badge badge-danger">Cancel</div>
                                  
                                <?php
                                } else {
                                ?>
                                  <div class="badge badge-success">Confirm
                                  <br><?php
                                   $date=date_create($fetch['status_date']);
                                   echo date_format($date,"d-m-Y");
                                   ?>
                                  </div>
                                <?php
                                }
                              }
                              
                              ?>
                                
                            </td>
                            <td style="word-wrap: break-word;white-space: normal;">
                            <?php 
                            	if ($fetch['shipping_status']=="I") {
                                ?>
                                <a href="order-process.php?case=shipping_status&id=<?=$fetch['id']?>" class='badge badge-warning'>Pending</a>
                                <?php
                            	}else{
                                ?>
                                <div class="badge badge-success" >Shipped
                                <br><?php
                                   $date=date_create($fetch['status_date']);
                                   echo date_format($date,"d-m-Y");
                                   ?>
                                </div>
                                <?php
                            	}
                            	?>
                            </td>
                            <td><?php 
                            	if ($fetch['delstatus']=="I") {
                                ?>
                                <a href="order-process.php?case=delstatus&id=<?=$fetch['id']?>" class='badge badge-warning'>Pending</a>
                                <?php
                            	}else{
                                ?>
                                <div class="badge badge-success" >Delivered
                                <br><?php
                                   $date=date_create($fetch['status_date']);
                                   echo date_format($date,"d-m-Y");
                                   ?>
                                </div>
                                <?php
                            	}
                            	?>
                            </td>
                            <!-- <td><?php //$fetch['shipping_date']?></td> -->
                            <!-- <td><?php //$fetch['delivery_date']?></td> -->
                            <!-- <td><?php //$fetch['invoice_no']?></td> -->
                            
                            <!-- <td class="font-weight-medium"><div class="badge"></div></td> -->
                          </tr>
                <?php }//while 
                      }else{
                        echo "<tr><td colspan='10' class='text-center'>No order found</td></tr>";
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
      
<?php
    }

    if ($_REQUEST['case']=="statement") {
    ?>
    
      <div class="content-wrapper">

          <div class="row">     
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="text-right">
                  <button class="btn btn-primary m-2" onclick="printgen()">Print</button>
                  <a href="sendmail.php?id=<?=$_GET['id']?>" class="btn btn-success m-2">Send PDF </a>
                </div>
                <div class="card-body" id="pdf">
                  <h4 class="card-title">Order Id:<?= $_GET['id'] ?></h4>
                    <div class="row">
                      <div class="col-md-6"> 
                      <?php
                        // $sql="SELECT * FROM order_statement where id={$_GET['id']}";
                        // $res=mysqli_query($conn,$sql);
                        // $fetch=mysqli_fetch_array($res);

                       ?>
                        <h4 class="card-title">Supplier</h4>
                        <label>Name: Raja Ghosh</label><br>
                        <label>Address: kalyani</label>
                      </div>
                      <div class="col-md-6">
                        <h4 class="card-title">Customer</h4>
                        <?php 
                          $c_sql="SELECT * FROM `orders` WHERE order_id={$_GET['id']}";
                          $exe=query($conn, $c_sql);
                          $res=fetcharray($exe);
                          // print_r($res);
                        ?>
                        <label>Name: <?= ucwords(getCustomer($conn,$res['customer_id'],'name'))?></label><br>
                        <label>Email: <?= getCustomer($conn,$res['customer_id'],'email')?></label><br>
                        <label>Phone: <?= getCustomer($conn,$res['customer_id'],'ph_no')?></label><br>
                        <label>Delivery Address: <?= getCustomer($conn,$res['customer_id'],'address')?></label>
                      </div>
                    </div>
                 
                    <div class="table-responsive">
                      <table class="expandable-table table table-striped table-borderless" style="width:100%">                         
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Invoice</th>
                              <th>Product</th>
                              <th>Description</th>                       
                              <th>Quantity</th>
                              <th>Amount</th>
                              <th>Total</th>
                            </tr>
                          </thead>
                          <tbody>
                              
                              <?php
                                //  $sql="SELECT * FROM `orders` WHERE order_id={$_GET['id']}";
                                $total=0;
                                $res1= query($conn,$c_sql);
                                $i=1;
                                while ($fetch=mysqli_fetch_array($res1)) {
                              ?>
                              <tr>
                                <td><?= $i++?></td>
                                <td><?= $fetch['invoice_no'] ?></td>
                                <td><?= getProduct($conn,$fetch['product_id'],'name')?></td>
                                <td style="word-wrap: break-word;white-space: normal;">
                                <?= getProduct($conn,$fetch['product_id'],'description')?>
                                </td>                     
                                <td><?= $fetch['quantity']?></td>
                                <td><?= getProduct($conn,$fetch['product_id'],'selling_price')?></td>
                                <td><?= $fetch['total_amount']?>
                                <?php
                                $total +=$fetch['total_amount'];
                                ?>
                                </td>
                              </tr>
                              <?php
                                }
                              ?>
                              
                              <tr>
                                <td colspan="6">Sub total:</td>
                                <td><?= sprintf("%.2f",$total)?></td>
                              </tr>
                          </tbody>
                      </table>
                    </div>
                      
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
  <!-- <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script> -->
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
  <script>
    function printgen() {
     var pdf = document.getElementById("pdf");
     var p=window.open('','Print-Window','width=900,mheight=800');
  
     p.document.open();
     p.document.write('<html><head><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"></head><body onload="window.print()">'+pdf.innerHTML+'</body></html>');
      p.document.close();
      
      // window.print();
      //html2pdf()
      // .from(pdf)
      // .save('order');
    }

    function status(id) {
      // alert(id);
      // document.getElementById("status"+id).click();
      $.ajax({
			  url: "order-process.php?case=status_active&id="+id,
			  type: "GET",
			  cache: false,
			  success: function(dataResult){
            window.location='';
			  }
      });
    }
    function destatus(id){
      $.ajax({
			  url: "order-process.php?case=status_deactive&id="+id,
			  type: "GET",
			  cache: false,
			  success: function(dataResult){
          window.location='';
			  }
      });
    }
  </script>
</body>

</html>
