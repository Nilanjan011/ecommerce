<?php
include('connection.php');
include('function.php');
$sql="SELECT * FROM order_statement ORDER BY id DESC ";
$res=mysqli_query($conn,$sql);
$html=' <table>
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
<tbody>';
$i=1;
while($fetch=mysqli_fetch_assoc($res)){
	$html.='<tr><td>'.$i++.'</td><td>'.$fetch['orderid'].'</td><td>'.ucwords(getCustomer($conn,$fetch['customerid'],"name")).'</td><td>'.$fetch['quantity'].'</td><td>'.$fetch['total'].'</td><td>'.$fetch['status_date']/*$date=date_create($fetch['status_date'])
    date_format($date,"d-m-Y")*/.'</td><td>'.
   getStatus($fetch['status'])
    .'</td><td>'.
    getOtherStatus($fetch['shipping_status'])
    .'</td><td>'.
    getDelStatus($fetch['delstatus'])
    .'</td></tr>';
}
$html.='</tbody></table>';
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename=report.xls');
echo $html;

function getStatus($status){
    if ($status=="I") { 
        return "pending";
    }else{
        if ($status=="C") {
            return "cancel";
        }else {
            return "Confirm";
        }
    }
}

function getOtherStatus($status){
if ($status=="I") {
    return "pending";
}else {
    return "Shipped";
    //$status['status_date'];date=date_create($fetch['status_date'])
    //date_format($date,"d-m-Y")
}
}
function getDelStatus($status){
    if ($status=="I") {
        return "pending";
    }else {
        return "Delivered";
        //$status['status_date'];date=date_create($fetch['status_date'])
        //date_format($date,"d-m-Y")
    } 
}
?>