<?php
include('connection.php');
include('function.php');
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;

$html='';

$html.='<!DOCTYPE html>
<html lang="en">

<head>
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
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      
      
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">

          <div class="row">     
            <div class="col-12 grid-margin stretch-card">
              <div class="card">';
            
            $html.='<h4 class="card-title">Order Id:'. $_GET["id"].'</h4>';
            $html.= '<div class="row">
                      <div class="col-md-6">
                        <h4 class="card-title">Supplier</h4>
                        <label>Name: Raja Ghosh</label><br>
                        <label>Address: kalyani</label>
                      </div>
                      <div class="col-md-6">
                        <h4 class="card-title">Customer</h4>';
                         
                          $c_sql="SELECT * FROM `orders` WHERE order_id={$_GET['id']}";
                          $exe=query($conn, $c_sql);
                          $res=fetcharray($exe);
                        
                     $html.= '<label>Name:' . ucwords(getCustomer($conn,$res['customer_id'],'name')).'</label><br>';
                       $html.= '<label>Email:' . getCustomer($conn,$res['customer_id'],'email').'</label><br>';
                       $html.='<label>Phone:'. getCustomer($conn,$res['customer_id'],'ph_no').'</label><br>';
                       $html.=' <label>Delivery Address:'. getCustomer($conn,$res['customer_id'],'address').'</label>';
                    $html.= '</div>
                    </div>';
                 
                    $html.='<div class="table-responsive">
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
                          <tbody>';
                              
            
                                //  $sql="SELECT * FROM `orders` WHERE order_id={$_GET['id']}";
                                $total=0;
                                $res1= query($conn,$c_sql);
                                $i=1;
                                while ($fetch=mysqli_fetch_array($res1)) {
                           $html.='<tr>';
                            $html.='<td>'. $i++ .'</td>';
                            $html.='<td>'. $fetch['invoice_no'].'</td>';
                            $html.='<td>'. getProduct($conn,$fetch['product_id'],'name').'</td>';
                            $html.='<td style="word-wrap: break-word;white-space: normal;">
                                '. getProduct($conn,$fetch['product_id'],'description').'</td>';                     
                             $html.='<td>'. $fetch['quantity'].'</td>';
                             $html.='<td>'. getProduct($conn,$fetch['product_id'],'selling_price').'</td>';
                             $html.='<td>'. $fetch['total_amount'];
                             $total +=$fetch['total_amount'];
                        
                             $html.='</td>';
                              $html.='</tr>';
                            
                            }
                                                          
                              $html.='<tr>
                                <td colspan="6">Sub total:</td>
                                <td>'. sprintf("%.2f",$total).'</td>
                              </tr>
                          </tbody>
                      </table>
                    </div>
                      
                
                </div>
            </div>
          </div>
            
      </div>
        
     </div>';

    $html.='</div></div>';


 $html.=' <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="vendors/select2/select2.min.js"></script>';

  $html.='<script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>';
  $html.='<script src="js/file-upload.js"></script>
  <script src="js/typeahead.js"></script>
  <script src="js/select2.js"></script>';
  
$html.='</body></html>';
// echo $html;

// $email=$_POST['email'];
$file_name=rand().'.pdf';  
$dompdf = new Dompdf();
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();
$file=$dompdf->output();
file_put_contents($file_name,$file);


// Recipient 
$to = "nilanjanchakraborty.nc@gmail.com"; 
 
// Sender 
$from = 'innoda.nilanjan@gmail.com';
 
// Email subject 
$subject = 'PHP Email with Attachment';  
 
// Attachment file 
$file = $file_name; 
 
// Email body content 
$htmlContent = ' 
    <h3>PHP Email with Attachment</h3> 
    <p>This email is sent from the PHP script with attachment.</p> '; 
 
// Header for sender info  
$headers = "From: innoda.nilanjan@gmail.com";
// Boundary  
$semi_rand = md5(time());  
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";  
 
// Headers for attachment  
$headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 
 
// Multipart boundary  
$message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" . 
"Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n";  
 
// Preparing attachment 
if(!empty($file) > 0){ 
    if(is_file($file)){ 
        $message .= "--{$mime_boundary}\n"; 
        $fp =    @fopen($file,"rb"); 
        $data =  @fread($fp,filesize($file)); 
 
        @fclose($fp); 
        $data = chunk_split(base64_encode($data)); 
        $message .= "Content-Type: application/octet-stream; name=\"".basename($file)."\"\n" .  
        "Content-Description: ".basename($file)."\n" . 
        "Content-Disposition: attachment;\n" . " filename=\"".basename($file)."\"; size=".filesize($file).";\n" .  
        "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n"; 
    } 
} 
$message .= "--{$mime_boundary}--"; 
$returnpath = "-f" . $from; 
 
// Send email 
$mail = @mail($to, $subject, $message, $headers, $returnpath);  
 
// Email sending status 
echo $mail?"<h1>Email Sent Successfully!</h1>":"<h1>Email sending failed.</h1>";

?>