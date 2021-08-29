<?php

// include('admin/connection.php');
// include('admin/function.php');  

// $ip=$ip=$_SERVER['REMOTE_ADDR'];
// $productId=mysqli_escape_string($conn,$_GET['id']);
// $sql1="SELECT * FROM `viewproduct` WHERE `productId`=$productId AND `ipaddress`='$ip'";
// $res1=query($conn,$sql1);
// $fetch1=fetcharray($res1);

// $num=numrows($res1);
// if($num>0)
// {
//     $viewno=$fetch1['viewno']+1;
//     $upSql="UPDATE `viewproduct` SET `viewno`=$viewno WHERE `id`={$fetch1['id']}";
//     $upres=query($conn,$upSql);
// }else {
//     $insert="INSERT INTO `viewproduct`(`productId`, `ipaddress`, `viewno`) VALUES ('$productId','$ip','1')";
//     $res2=query($conn,$insert);
// }

?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
  <style type="text/css">

            /*header*/

.header {
    text-align: center;
  margin-top: 2em;
}
.logo h1{
   font-family: 'Montserrat', sans-serif;
    font-size: 3em;
    color: #000;
  display: inline-block;
  position:relative;
}
.logo h1 a{
    text-decoration:none;
    color: #000;
}
.logo h1 span {
    font-size: 12px;
    display: block;
    letter-spacing: 4px;
    text-transform: uppercase;
    font-family: 'Noto Sans', sans-serif;
    padding-top: 4px;
}
.logo h1  b {
    font-size: 8px;
    background: #ED0612;
    font-weight: normal;
    padding: 3px;
    display: inline-block;
    position: absolute;
    top: 8px;
    left: -2px;
    color: #fff;
    line-height: 8px;
}
.head-t {
    margin: 1em 0;
}
.card li{
  display:inline-block;
}
.card li a{
  display:inline-block;
  color: #999;
    font-size: 0.9em;
  margin:0 0.5em;
}
.card li a i{
  margin-right:5px;
  color: #FAB005;
}
/*--social--*/
.social-top li{
  display:inline-block;
}
.icon {
  border-radius: 100px;
  cursor: pointer;
  display: inline-block;
  font-size: 0.9em;
  height: 35px;
  line-height: 37px;
  margin: 0 2px;
  position: relative;
  text-align: center;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
  width: 35px;
}

/* Circle */
.icon span {
  border-radius: 0;
  display: block;
  height: 0;
  left: 50%;
  margin: 0;
  position: absolute;
  top: 50%;
  -webkit-transition: all 0.3s;
     -moz-transition: all 0.3s;
       -o-transition: all 0.3s;
          transition: all 0.3s;
  width: 0;
}
.icon:hover span {
  width: 35px;
  height: 35px;
  border-radius: 100px;
  margin: -18px;
}
.twitter span {
  background-color: #4099ff;
}
.facebook span {
  background-color: #3B5998;
}
.pinterest span {
  background-color: #CB2028;
}
.dribbble span {
  background-color:#E04D84;
}

/* Icons */
.icon i {
  background: none;
  color: #000;
  height: 35px;
  left: 0;
  line-height: 35px;
  position: absolute;
  top: 0;
  -webkit-transition: all 0.3s;
     -moz-transition: all 0.3s;
       -o-transition: all 0.3s;
          transition: all 0.3s;
  width: 35px;
  z-index: 10;
}
.icon .fa-twitter {
  color: #4099ff;
}
.icon .fa-facebook {
  color: #3B5998;
}
.icon .fa-pinterest-p {
  color: #CB2028;
}
.icon .fa-dribbble {
  color: #E04D84;
}
.icon:hover .fa-facebook,
.icon:hover .fa-twitter,
.icon:hover .fa-pinterest-p,
.icon:hover .fa-dribbble {
  color: white;
}
/*--social--*/
/*--nav--*/
.navbar-nav {
    float: none;
    margin: 0;
}
.nav > li {
    float: none;
    display: inline-block;
}
ul.multi-column-dropdown {
    text-align: left;
}
.multi-column-dropdown li a {
    display: block;
    clear: both;
    line-height: 1.428571429;
    color: #737373 !important;
    white-space: normal;
    font-size: 13px;
}
.multi-column-dropdown li a i{
    margin-right:7px;
}
.multi-column-dropdown li {
    list-style-type: none;
    margin: 7px 0;
}

.multi-column-dropdown li a:hover {
    color: #000 !important;
}


.w3l{
  padding:0;
}
.w3l img{
  margin-top:2em;
}

nav.navbar.navbar-default {
    float: left;
    height: 44px;
}
.cart{
  float: right; 
  cursor: pointer;
  margin-top: 11px;
    width: 9%;
}

/*--nav--*/
.multi-column-dropdown li a {
    color: #999 !important;
}
.navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:hover, .navbar-default .navbar-nav > .active > a:focus {
    background-color:#FAB005;
    color: #fff;
}
.nav > li > a {
    padding: 12px 20px  !important;
}
.navbar-default .navbar-collapse, .navbar-default .navbar-form {
    border: none;
}
.navbar-default {
    background: none;
    border: none;
}
.navbar-collapse {
    padding: 0;
}
ul.multi-column-dropdown h6 {
    font-size: 1.5em;
    color: #000;
    margin: 0 0 1em;
    padding: 0.7em 0;
    border-bottom: 2px solid #62BF43;
    text-transform: capitalize;
    font-family: 'Glegoo', serif;
}

.dropdown-menu.multi {
    min-width: 745px;
    padding: 30px 30px;
}
.nav .open > a, .nav .open > a:hover, .nav .open > a:focus {
    background: none;
    border: none;
}
.navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .open > a:hover, .navbar-default .navbar-nav > .open > a:focus {
    background-color: transparent;
}
.navbar-default .navbar-nav > li > a:hover{
    color: black;
    background-color: transparent;
}
.navbar-default .navbar-nav > li > a:focus {
    color: #fff;
}
.navbar {
    min-height: auto;
    margin-bottom: 0px;
}
.dropdown-menu {
    top: 98%;
    left: -85%;
}
.multi1{
  left: -330%;
}
.row1 {
    padding-left: 0;
  padding-right:7px;
}
.row2{
  padding-right: 0;
  padding-left:7px;
}
.row-top {
    margin-top: 1em;
}

 .navbar-default .navbar-nav > .open > a:hover{
    color: #fff;
}
 .navbar-default .navbar-nav > .open > a:focus {
    color: #999;
}
span.fa.fa-shopping-cart.my-cart-icon {
    position: absolute !important;
    font-size: 1.5em;
    color: #039445;
}
.badge {
    display: inline-block;
    width: 18px;
    height: 18px;
    line-height: 19px;
    padding: 0; 
    font-size: 10px;
    font-weight: bold;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    background-color: #FAB005;
    border-radius: 10px;
}
.multi1 {
    top: 98%;
    left: -129%;
}
.multi2 {
    top: 98%;
    left: -275%;
}
.picZoomer{
  position: relative;
    /*margin-left: 40px;
    padding: 15px;*/
}
.picZoomer-pic-wp{
  position: relative;
  overflow: hidden;
    text-align: center;
}
.picZoomer-pic-wp:hover .picZoomer-cursor{
  display: block;
}
.picZoomer-zoom-pic{
  position: absolute;
  top: 0;
  left: 0;
}
.picZoomer-pic{
  /*width: 100%;
  height: 100%;*/
}
.picZoomer-zoom-wp{
  display: none;
  position: absolute;
  z-index: 999;
  overflow: hidden;
    border:1px solid #eee;
    height: 460px;
    margin-top: -19px;
}
.picZoomer-cursor{
  display: none;
  cursor: crosshair;
  width: 100px;
  height: 100px;
  position: absolute;
  top: 0;
  left: 0;
  border-radius: 50%;
  border: 1px solid #eee;
  background-color: rgba(0,0,0,.1);
}
.picZoomCursor-ico{
  width: 23px;
  height: 23px;
  position: absolute;
  top: 40px;
  left: 40px;
  background: url(images/zoom-ico.png) left top no-repeat;
}

.my_img {
    vertical-align: middle;
    position: absolute;
    top: 0;
    bottom: 0;
    margin: auto;
    height: 100%;
}
.piclist li{
    display: inline-block;
    width: 90px;
    height: 114px;
    border: 1px solid #eee;
}
.piclist li img{
    width: 97%;
    height: auto;
}

/* custom style */
.picZoomer-pic-wp,
.picZoomer-zoom-wp{
    border: 1px solid #eee;
}



.section-bg {
    background-color: #fff1e0;
}
section {
    padding: 60px 0;
}
.row-sm .col-md-6 {
    padding-left: 5px;
    padding-right: 5px;
}

/*===pic-Zoom===*/
._boxzoom .zoom-thumb {
    width: 90px;
    display: inline-block;
    vertical-align: top;
    margin-top: 0px;
}
._boxzoom .zoom-thumb ul.piclist {
    padding-left: 0px;
    top: 0px;
}
._boxzoom ._product-images {
    width: 80%;
    display: inline-block;
}
._boxzoom ._product-images .picZoomer {
    width: 100%;
}
._boxzoom ._product-images .picZoomer .picZoomer-pic-wp img {
    left: 0px;
}
._boxzoom ._product-images .picZoomer img.my_img {
    width: 100%;
}
.piclist li img {
    height:100px;
    object-fit:cover;
}

/*======products-details=====*/
._product-detail-content {
    background: #fff;
    padding: 15px;
    border: 1px solid lightgray;
}
._product-detail-content p._p-name {
    color: black;
    font-size: 20px;
    border-bottom: 1px solid lightgray;
    padding-bottom: 12px;
}
.p-list span {
    margin-right: 15px;
}
.p-list span.price {
    font-size: 25px;
    color: #318234;
}
._p-qty > span {
    color: black;
    margin-right: 15px;
    font-weight: 500;
}
._p-qty .value-button {
    display: inline-flex;
    border: 0px solid #ddd;
    margin: 0px;
    width: 30px;
    height: 35px;
    justify-content: center;
    align-items: center;
    background: #fd7f34;
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    color: #fff;
}

._p-qty .value-button {
    border: 0px solid #fe0000;
    height: 35px;
    font-size: 20px;
    font-weight: bold;
}
._p-qty input#number {
    text-align: center;
    border: none;
    border-top: 1px solid #fe0000;
    border-bottom: 1px solid #fe0000;
    margin: 0px;
    width: 50px;
    height: 35px;
    font-size: 14px;
    box-sizing: border-box;
}
._p-add-cart {
    margin-left: 0px;
    margin-bottom: 15px;
}
.p-list {
    margin-bottom: 10px;
}
._p-features > span {
    display: block;
    font-size: 16px;
    color: #000;
    font-weight: 500;
}
._p-add-cart .buy-btn {
    background-color: #fd7f34;
    color: #fff;
}
._p-add-cart .btn {
    text-transform: capitalize;
    padding: 6px 20px;
    /* width: 200px; */
    border-radius: 52px;
}
._p-add-cart .btn {
    margin: 0px 8px;
}

/*=========Recent-post==========*/
.title_bx h3.title {
    font-size: 22px;
    text-transform: capitalize;
    position: relative;
    color: #fd7f34;
    font-weight: 700;
    line-height: 1.2em;
}
.title_bx h3.title:before {
    content: "";
    height: 2px;
    width: 20%;
    position: absolute;
    left: 0px;
    z-index: 1;
    top: 40px;
    background-color: #fd7f34;
}
.title_bx h3.title:after {
    content: "";
    height: 2px;
    width: 100%;
    position: absolute;
    left: 0px;
    top: 40px;
    background-color: #ffc107;
}
.common_wd .owl-nav .owl-prev, .common_wd .owl-nav .owl-next {
    background-color: #fd7f34 !important;
    display: block;
    height: 30px;
    width: 30px;
    text-align: center;
    border-radius: 0px !important;
}
.owl-nav .owl-next {
    right:-10px;
}
.owl-nav .owl-prev, .owl-nav .owl-next {
    top:50%;
    position: absolute;
}
.common_wd .owl-nav .owl-prev i, .common_wd .owl-nav .owl-next i {
    color: #fff;
    font-size: 14px !important;
    position: relative;
    top: -1px;
}
.common_wd .owl-nav {
    position: absolute;
    top: -21%;
    right: 4px;
    width: 65px;
}
.owl-nav .owl-prev i, .owl-nav .owl-next i {
    left: 0px;
}
._p-qty .decrease_ {
    position: relative;
    right: -5px;
    top: 3px;
}

._p-qty .increase_ {
    position: relative;
    top: 3px;
    left: -5px;
}
/*========box========*/
.sq_box {
    padding-bottom: 5px;
    border-bottom: solid 2px #fd7f34;
    background-color: #fff;
    text-align: center;
    padding: 15px 10px;
    margin-bottom: 20px;
    border-radius: 4px;
}
.item .sq_box span.wishlist {
    right: 5px !important;
}
.sq_box span.wishlist {
    position: absolute;
    top: 10px;
    right: 20px;
}
.sq_box span {
    font-size: 14px;
    font-weight: 600;
    margin: 0px 10px;
}
.sq_box span.wishlist i {
    color: #adb5bd;
    font-size: 20px;
}
.sq_box h4 {
    font-size: 18px;
    text-align: center;
    font-weight: 500;
    color: #343a40;
    margin-top: 10px;
    margin-bottom: 10px !important;
}
.sq_box .price-box {
    margin-bottom: 15px !important;
}
.sq_box .btn {
    border-radius: 50px;
    padding: 5px 13px;
    font-size: 15px;
    color: #fff;
    background-color: #fd7f34;
    font-weight: 600;
}
.sq_box .price-box span.price {
    text-decoration: line-through;
    color: #6c757d;
}
.sq_box span {
    font-size: 14px;
    font-weight: 600;
    margin: 0px 10px;
}
.sq_box .price-box span.offer-price {
    color:#28a745;
}
.sq_box img {
    object-fit: cover;
    height: 150px !important;
    margin-top: 20px;
}
.sq_box span.wishlist i:hover {
    color: #fd7f34;
}
/*-- //footer-top --*/
.footer-bottom {
    text-align: center;
    margin: 4em 0 0;
}
.footer-bottom h2 {
    font-family: 'Montserrat', sans-serif;
    font-size: 3.5em;
    display: inline-block;
  position:relative;
}
.footer-bottom h2 a {
    text-decoration: none;
    color: #fff;
}
.footer-bottom h2 span {
    font-size: 12px;
    display: block;
    letter-spacing: 5px;
    text-transform: uppercase;
    font-family: 'Noto Sans', sans-serif;
    padding-top: 6px;
}
.footer-bottom h2 b {
    font-size: 10px;
    background: #CC2127;
    font-weight: normal;
    padding: 3px;
    display: inline-block;
    line-height: 10px;
    position: absolute;
    top: 9px;
    left: -7px;
}
 p.fo-para {
    font-size: 1em;
    line-height: 2em;
    color: #fff;
    padding: 1em 0 3em;
    width: 70%;
    margin: 0 auto;
}
.fo-grid1 p{
   font-size:1em;
  line-height:2em;
  color:#fff;
}
.fo-grid1 p a{
  text-decoration:none;
  color:#fff;
}
.fo-grid1 p a:hover {
    color: #FAB005;
}
.fo-grid1 p  i{
  margin-right:7px;
}
.social-fo  li{
  list-style-type:none;
  display:inline-block;
  margin:0 5px;
}
.social-fo li a {
    width: 35px;
  height: 35px;
    display: block;
    background: #3B5998;
    border-radius: 100px;
    color: #fff;
    line-height: 2.5em;
}
.social-fo li a:hover {
   transform:rotate(-360deg);
}
.social-fo li a.twi {
    background: #4099FF;
}
.social-fo li a.pin {
    background: #CD2830;
}
.social-fo li a.dri {
    background:#E35E90;
}
.address {
    margin-top: 2em;
}
/*-- //footer-top --*/
.footer {
    background: #353535;
    padding: 5em 0;
}
.footer-grid h3 {
    color: #fff;
    font-size: 1.7em;
    margin-bottom: 1em;
}
.footer-grid p {
    color: #ABABAB;
    line-height: 2.2em;
    font-size: 14px;
}
.footer-grid ul li{
  list-style-type:none;
  font-size:14px;
  line-height:2.2em;
    color: #ABABAB;

}
.footer-grid ul li a{

    color: #ABABAB;   
}
.footer-grid ul li a:hover{
    color:#FAB005;    
}

.copy-right p {
    color: #fff;
    font-size: 14px;
    text-align: center;
    margin-top: 4em;
}
.copy-right p a {
    color: #fff;  
}
.copy-right p a:hover {
    color: #E21737; 
}
/*Slider CSS*/

@import url(http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css);
.col-item
{
    border: 1px solid #E1E1E1;
    border-radius: 5px;
    background: #FFF;
}
.col-item .photo img
{
    margin: 0 auto;
    width: 100%;
}

.col-item .info
{
    padding: 10px;
    border-radius: 0 0 5px 5px;
    margin-top: 1px;
}

.col-item:hover .info {
    background-color: #F5F5DC;
}
.col-item .price
{
    /*width: 50%;*/
    float: left;
    margin-top: 5px;
}

.col-item .price h5
{
    line-height: 20px;
    margin: 0;
}

.price-text-color
{
    color: #219FD1;
}

.col-item .info .rating
{
    color: #777;
}

.col-item .rating
{
    /*width: 50%;*/
    float: left;
    font-size: 17px;
    text-align: right;
    line-height: 52px;
    margin-bottom: 10px;
    height: 52px;
}

.col-item .separator
{
    border-top: 1px solid #E1E1E1;
}

.clear-left
{
    clear: left;
}

.col-item .separator p
{
    line-height: 20px;
    margin-bottom: 0;
    margin-top: 10px;
    text-align: center;
}

.col-item .separator p i
{
    margin-right: 5px;
}
.col-item .btn-add
{
    width: 50%;
    float: left;
}

.col-item .btn-add
{
    border-right: 1px solid #E1E1E1;
}

.col-item .btn-details
{
    width: 50%;
    float: left;
    padding-left: 10px;
}
.controls
{
    margin-top: 20px;
}
[data-slide="prev"]
{
    margin-right: 10px;
}
.nav-top{
  position: relative;
  padding:0px;
  top: 0px;
  background: #3b5998;
  color: #fff;
}

.navbar-default .navbar-nav > li > a {
    color: #fab005;
}
/*//Slider*/
/*-- //footer --*/
  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />
</head>
<body>
    <!-- header -->
    <?php include 'header.php';?><br>
    <!-- //header -->
<?php
// include('admin/connection.php');
// include('admin/function.php');  

$ip=$ip=$_SERVER['REMOTE_ADDR'];
$productId=mysqli_escape_string($conn,$_GET['id']);
$sql1="SELECT * FROM `viewproduct` WHERE `productId`=$productId AND `ipaddress`='$ip'";
$res1=query($conn,$sql1);
$fetch1=fetcharray($res1);

$num=numrows($res1);
if($num>0)
{
    $viewno=$fetch1['viewno']+1;
    $upSql="UPDATE `viewproduct` SET `viewno`=$viewno WHERE `id`={$fetch1['id']}";
    $upres=query($conn,$upSql);
}else {
    $insert="INSERT INTO `viewproduct`(`productId`, `ipaddress`, `viewno`) VALUES ('$productId','$ip','1')";
    $res2=query($conn,$insert);
}

?>

  <section id="services" class="services section-bg">
   <div class="container-fluid">
      <div class="row row-sm">
         <div class="col-md-6 _boxzoom">
            <div class="zoom-thumb">
               <ul class="piclist">
               <?php 
                   $sql="SELECT * FROM `product_img` WHERE `product_id`='".mysqli_escape_string($conn,$_GET['id'])."'";
                   $res=query($conn,$sql);
                   $rowno=numrows($res);
                   if ($rowno >0) {
                       while ($row=fetcharray($res)) {
                        ?>   
                           <li><img src="admin/<?= $row['img'] ?>" alt="img"></li>
                      <?php
                       }
                   }
               ?>
                  <!-- <li><img src="https://s.fotorama.io/2.jpg" alt=""></li>
                  <li><img src="https://s.fotorama.io/3.jpg" alt=""></li>
                  <li><img src="https://ucarecdn.com/382a5139-6712-4418-b25e-cc8ba69ab07f/-/stretch/off/-/resize/760x/" alt=""></li> -->
               </ul>
            </div>
            <?php 
                $sql="SELECT * FROM `product` WHERE `id`='".mysqli_escape_string($conn,$_GET['id'])."'";
                $res=query($conn,$sql);
                $row=fetcharray($res);
                
            ?>
            <div class="_product-images">
               <div class="picZoomer">
                  <img class="my_img" src="admin/<?=getProductIMG($conn,$row['id'],'img')?>" alt="img">
                  <!-- <img class="my_img" src="https://s.fotorama.io/1.jpg" alt=""> -->
               </div>
            </div>
         </div>
         <div class="col-md-6">
            <div class="_product-detail-content">
               <p class="_p-name"> <?= $row['name'] ?> </p>
               <div class="_p-price-box">
                  <div class="p-list">
                    <span> M.R.P. : <i class="fa fa-inr"></i> <del> <?= $row['mrp'] ?>  </del>   </span>
                    <span class="price"> Rs. <?= $row['selling_price'] ?> </span>
                  </div>
                  <div class="_p-add-cart">
                     <div class="_p-qty">
                        <span>Add Quantity</span>
                        <div class="value-button decrease_" id="" value="Decrease Value">-</div>
                        <input type="number" name="qty" id="number" value="1" />
                        <div class="value-button increase_" id="" value="Increase Value">+</div>
                     </div>
                  </div>
                  <div class="_p-features">
                     <span> Description About this product:- </span>
                     <?= $row['description'] ?>
                     
                  </div>
                  <form action="addCart-process.php" method="post" accept-charset="utf-8">
                     <ul class="spe_ul"></ul>
                     <div class="_p-qty-and-cart">
                        <div class="_p-add-cart">
                           <button class="btn-theme btn buy-btn" tabindex="0">
                           <i class="fa fa-shopping-cart"></i> Buy Now
                           </button>
                           <button class="btn-theme btn btn-success" tabindex="0">
                           <i class="fa fa-shopping-cart"></i> Add to Cart
                           </button>
                           <input type="hidden" name="product_id" value="<?= getProduct($conn,$fetch1['id'],"id")?>">
                            <input type="hidden" name="product_name" value="<?= getProduct($conn,$fetch1['id'],"name")?>">
                            <input type="hidden" name="selling_price" value="<?=getProduct($conn,$fetch1['id'],"selling_price")?>">
                            <input type="hidden" name="quantity" value="1">
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<!-- Slider -->
<div class="container">
    <div class="row">
        <div class="row">
            <div class="col-md-9">
                <h3> Relater Products </h3>
            </div>
            <div class="col-md-3">
                <!-- Controls -->
                <div class="controls pull-right">
                    <a class="left fa fa-chevron-left btn btn-success" href="#carousel-example"
                        data-slide="prev"></a><a class="right fa fa-chevron-right btn btn-success" href="#carousel-example"
                            data-slide="next"></a>
                </div>
            </div>
        </div>
        <div id="carousel-example" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="col-item">
                                <div class="photo">
                                    <img src="http://placehold.it/350x260" class="img-responsive" alt="a" />
                                </div>
                                <div class="info">
                                    <div class="row">
                                        <div class="price col-md-6">
                                            <h5>
                                                Sample Product</h5>
                                            <h5 class="price-text-color">
                                                Rs.199</h5>
                                        </div>
                                        <div class="rating hidden-sm col-md-6">
                                            <i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                            </i><i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                            </i><i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="separator clear-left">
                                        <p class="btn-add">
                                            <i class="fa fa-shopping-cart"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">Add to cart</a></p>
                                        <p class="btn-details">
                                            <i class="fa fa-list"></i><a href="product_details.php" class="hidden-sm">More details</a></p>
                                    </div>
                                    <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="col-item">
                                <div class="photo">
                                    <img src="http://placehold.it/350x260" class="img-responsive" alt="a" />
                                </div>
                                <div class="info">
                                    <div class="row">
                                        <div class="price col-md-6">
                                            <h5>
                                                Product Example</h5>
                                            <h5 class="price-text-color">
                                                Rs.249</h5>
                                        </div>
                                        <div class="rating hidden-sm col-md-6">
                                        </div>
                                    </div>
                                    <div class="separator clear-left">
                                        <p class="btn-add">
                                            <i class="fa fa-shopping-cart"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">Add to cart</a></p>
                                        <p class="btn-details">
                                            <i class="fa fa-list"></i><a href="product_details.php" class="hidden-sm">More details</a></p>
                                    </div>
                                    <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="col-item">
                                <div class="photo">
                                    <img src="http://placehold.it/350x260" class="img-responsive" alt="a" />
                                </div>
                                <div class="info">
                                    <div class="row">
                                        <div class="price col-md-6">
                                            <h5>
                                                Next Sample Product</h5>
                                            <h5 class="price-text-color">
                                                Rs.149</h5>
                                        </div>
                                        <div class="rating hidden-sm col-md-6">
                                            <i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                            </i><i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                            </i><i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="separator clear-left">
                                        <p class="btn-add">
                                            <i class="fa fa-shopping-cart"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">Add to cart</a></p>
                                        <p class="btn-details">
                                            <i class="fa fa-list"></i><a href="product_details.php" class="hidden-sm">More details</a></p>
                                    </div>
                                    <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="col-item">
                                <div class="photo">
                                    <img src="http://placehold.it/350x260" class="img-responsive" alt="a" />
                                </div>
                                <div class="info">
                                    <div class="row">
                                        <div class="price col-md-6">
                                            <h5>
                                                Sample Product</h5>
                                            <h5 class="price-text-color">
                                                Rs.199</h5>
                                        </div>
                                        <div class="rating hidden-sm col-md-6">
                                            <i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                            </i><i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                            </i><i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="separator clear-left">
                                        <p class="btn-add">
                                            <i class="fa fa-shopping-cart"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">Add to cart</a></p>
                                        <p class="btn-details">
                                            <i class="fa fa-list"></i><a href="product_details.php" class="hidden-sm">More details</a></p>
                                    </div>
                                    <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="col-item">
                                <div class="photo">
                                    <img src="http://placehold.it/350x260" class="img-responsive" alt="a" />
                                </div>
                                <div class="info">
                                    <div class="row">
                                        <div class="price col-md-6">
                                            <h5>
                                                Product with Variants</h5>
                                            <h5 class="price-text-color">
                                                Rs.199</h5>
                                        </div>
                                        <div class="rating hidden-sm col-md-6">
                                            <i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                            </i><i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                            </i><i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="separator clear-left">
                                        <p class="btn-add">
                                            <i class="fa fa-shopping-cart"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">Add to cart</a></p>
                                        <p class="btn-details">
                                            <i class="fa fa-list"></i><a href="product_details.php" class="hidden-sm">More details</a></p>
                                    </div>
                                    <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="col-item">
                                <div class="photo">
                                    <img src="http://placehold.it/350x260" class="img-responsive" alt="a" />
                                </div>
                                <div class="info">
                                    <div class="row">
                                        <div class="price col-md-6">
                                            <h5>
                                                Grouped Product</h5>
                                            <h5 class="price-text-color">
                                                Rs.249</h5>
                                        </div>
                                        <div class="rating hidden-sm col-md-6">
                                        </div>
                                    </div>
                                    <div class="separator clear-left">
                                        <p class="btn-add">
                                            <i class="fa fa-shopping-cart"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">Add to cart</a></p>
                                        <p class="btn-details">
                                            <i class="fa fa-list"></i><a href="product_details.php" class="hidden-sm">More details</a></p>
                                    </div>
                                    <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="col-item">
                                <div class="photo">
                                    <img src="http://placehold.it/350x260" class="img-responsive" alt="a" />
                                </div>
                                <div class="info">
                                    <div class="row">
                                        <div class="price col-md-6">
                                            <h5>
                                                Product with Variants</h5>
                                            <h5 class="price-text-color">
                                                Rs.149</h5>
                                        </div>
                                        <div class="rating hidden-sm col-md-6">
                                            <i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                            </i><i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                            </i><i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="separator clear-left">
                                        <p class="btn-add">
                                            <i class="fa fa-shopping-cart"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">Add to cart</a></p>
                                        <p class="btn-details">
                                            <i class="fa fa-list"></i><a href="product_details.php" class="hidden-sm">More details</a></p>
                                    </div>
                                    <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="col-item">
                                <div class="photo">
                                    <img src="http://placehold.it/350x260" class="img-responsive" alt="a" />
                                </div>
                                <div class="info">
                                    <div class="row">
                                        <div class="price col-md-6">
                                            <h5>
                                                Product with Variants</h5>
                                            <h5 class="price-text-color">
                                                Rs.199</h5>
                                        </div>
                                        <div class="rating hidden-sm col-md-6">
                                            <i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                            </i><i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                            </i><i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="separator clear-left">
                                        <p class="btn-add">
                                            <i class="fa fa-shopping-cart"></i><a href="http://www.jquery2dotnet.com" class="hidden-sm">Add to cart</a></p>
                                        <p class="btn-details">
                                            <i class="fa fa-list"></i><a href="product_details.php" class="hidden-sm">More details</a></p>
                                    </div>
                                    <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<!-- // Slider -->

<!--footer-->
<?php include 'footer.php';?>
<!-- //footer-->

</body>
  <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

    <script type="text/javascript">
  ;(function($){
  $.fn.picZoomer = function(options){
    var opts = $.extend({}, $.fn.picZoomer.defaults, options), 
      $this = this,
      $picBD = $('<div class="picZoomer-pic-wp"></div>').css({'width':opts.picWidth+'px', 'height':opts.picHeight+'px'}).appendTo($this),
      $pic = $this.children('img').addClass('picZoomer-pic').appendTo($picBD),
      $cursor = $('<div class="picZoomer-cursor"><i class="f-is picZoomCursor-ico"></i></div>').appendTo($picBD),
      cursorSizeHalf = {w:$cursor.width()/2 ,h:$cursor.height()/2},
      $zoomWP = $('<div class="picZoomer-zoom-wp"><img src="" alt="" class="picZoomer-zoom-pic"></div>').appendTo($this),
      $zoomPic = $zoomWP.find('.picZoomer-zoom-pic'),
      picBDOffset = {x:$picBD.offset().left,y:$picBD.offset().top};

    
    opts.zoomWidth = opts.zoomWidth||opts.picWidth;
    opts.zoomHeight = opts.zoomHeight||opts.picHeight;
    var zoomWPSizeHalf = {w:opts.zoomWidth/2 ,h:opts.zoomHeight/2};

    //初始化zoom容器大小
    $zoomWP.css({'width':opts.zoomWidth+'px', 'height':opts.zoomHeight+'px'});
    $zoomWP.css(opts.zoomerPosition || {top: 0, left: opts.picWidth+30+'px'});
    //初始化zoom图片大小
    $zoomPic.css({'width':opts.picWidth*opts.scale+'px', 'height':opts.picHeight*opts.scale+'px'});

    //初始化事件
    $picBD.on('mouseenter',function(event){
      $cursor.show();
      $zoomWP.show();
      $zoomPic.attr('src',$pic.attr('src'))
    }).on('mouseleave',function(event){
      $cursor.hide();
      $zoomWP.hide();
    }).on('mousemove', function(event){
      var x = event.pageX-picBDOffset.x,
        y = event.pageY-picBDOffset.y;

      $cursor.css({'left':x-cursorSizeHalf.w+'px', 'top':y-cursorSizeHalf.h+'px'});
      $zoomPic.css({'left':-(x*opts.scale-zoomWPSizeHalf.w)+'px', 'top':-(y*opts.scale-zoomWPSizeHalf.h)+'px'});

    });
    return $this;

  };
  $.fn.picZoomer.defaults = {
        picHeight: 460,
    scale: 2.5,
    zoomerPosition: {top: '0', left: '380px'},

    zoomWidth: 400,
    zoomHeight: 460
  };
})(jQuery); 



$(document).ready(function () {
     $('.picZoomer').picZoomer();
    $('.piclist li').on('click', function (event) {
        var $pic = $(this).find('img');
        $('.picZoomer-pic').attr('src', $pic.attr('src'));
    });
   
  var owl = $('#recent_post');
              owl.owlCarousel({
                margin:20,
                dots:false,
                nav: true,
                navText: [
                  "<i class='fa fa-chevron-left'></i>",
                  "<i class='fa fa-chevron-right'></i>"
                ],
                autoplay: true,
                autoplayHoverPause: true,
                responsive: {
                  0: {
                    items: 2
                  },
                  600: {
                    items:3
                  },
                  1000: {
                    items:5
                  },
                  1200: {
                    items:4
                  }
                }
  });    
  
        $('.decrease_').click(function () {
            decreaseValue(this);
        });
        $('.increase_').click(function () {
            increaseValue(this);
        });
        function increaseValue(_this) {
            var value = parseInt($(_this).siblings('input#number').val(), 10);
            value = isNaN(value) ? 0 : value;
            value++;
            $(_this).siblings('input#number').val(value);
        }

        function decreaseValue(_this) {
            var value = parseInt($(_this).siblings('input#number').val(), 10);
            value = isNaN(value) ? 0 : value;
            value < 1 ? value = 1 : '';
            value--;
            $(_this).siblings('input#number').val(value);
        }
    });

</script>
</html>