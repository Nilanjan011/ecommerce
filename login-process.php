<?php
session_start();
include('admin/function.php');
include('admin/connection.php');
switch ($_GET['case']) {
    case '':
        $ip=$_SERVER['REMOTE_ADDR'];
        $sql="SELECT * FROM `customer` WHERE `email`='".mysqli_escape_string($conn,$_POST['email'])."' AND `verify`='A' AND `password`='".mysqli_escape_string($conn,base64_encode($_POST['password']))."'";
        $res=query($conn,$sql);
        // print_r($sql);
        $fetch=fetcharray($res);
        $num=numrows($res);
        if($num>0)
        {
        $_SESSION['uid']=$fetch['id'];
        // UPDATE `tmp_cart` SET `cusid`='44' WHERE `ipaddress`='::1'
        $sql2="UPDATE `tmp_cart` SET `cusid`='".$fetch['id']."' WHERE `ipaddress`='$ip'";
        $res2=query($conn,$sql2);
        redirect('index.php');
        }else
        {
            redirect('login.php?m=1');
        }
        break;
    case 'logout':
        session_destroy();
        unset($_SESSION['uid']);
        redirect('login.php');
        break;
    case 'resend':
        $id=$_SESSION['last_id'];
        $name=getCustomer($conn,$id,"name");
        $otp=rand(1000,9999);
        $sql1= "UPDATE `customer` SET `otp`=$otp WHERE `id`=$id";
        $res=query($conn,$sql1);
        $to = $email;
        $subject = "Your OTP";
        $txt = "Welcome ".$name."! It is your otp:$otp";
        $headers = "From: innoda.nilanjan@gmail.com";

        mail($to,$subject,$txt,$headers);
        redirect('otp.php');
        break;
    case 'otp':
        $id=$_SESSION['last_id'];
        $sql="SELECT * FROM `customer` WHERE `id`=$id AND NOW()<=DATE_ADD(`create_at`,INTERVAL 1 MINUTE) AND `otp`='".mysqli_escape_string($conn,$_POST['otp'])."'" ;
        $res=query($conn,$sql);
        // print_r($sql);
        $fetch=fetcharray($res);
        $num=numrows($res);
        if($num>0)
        {
           $sql1= "UPDATE `customer` SET `verify`='A' WHERE `id`=$id";
           $res=query($conn,$sql1);
            $_SESSION['uid']=$fetch['id'];
            redirect('index.php');
        }else
        {
            redirect('otp.php?m=1');
        }
        break;
        
    case 'register':
        $email=mysqli_escape_string($conn,$_POST['email']);
        $password=mysqli_escape_string($conn,$_POST['password']);

        $otp=rand(1000,9999);
        $password=base64_encode($password);
        $sql="INSERT INTO `customer`(`name`, `email`, `ph_no`, `address`, `password`,`otp`) VALUES ('".mysqli_escape_string($conn,$_POST['name'])."','$email','".mysqli_escape_string($conn,$_POST['ph_no'])."','".mysqli_escape_string($conn,$_POST['address'])."','$password','$otp')";

        $res=mysqli_query($conn,$sql);
        $_SESSION['last_id']=mysqli_insert_id($conn);

        $to = $email;
        $subject = "Your OTP";
        $txt = "Welcome ".$_POST['name']."! It is your otp:$otp";
        $headers = "From: innoda.nilanjan@gmail.com";

        mail($to,$subject,$txt,$headers);
        
        redirect('otp.php');
        break;
}

// function randomPassword() {
//     $alphabet = 'abcdefghijklmnopqrstuvwxy54584545zABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
//     $pass = array(); //remember to declare $pass as an array
//     $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
//     for ($i = 0; $i < 8; $i++) {
//         $n = rand(0, $alphaLength);
//         $pass[] = $alphabet[$n];
//     }
//     return implode($pass); //turn the array into a string
// }
// $sql="SELECT * FROM `customer` WHERE `email`='".mysqli_escape_string($conn,base64_encode($_POST['email']))."' AND `password`='".mysqli_escape_string($conn,base64_encode($_POST['password']))."'";
// $res=query($conn,$sql);
// // print_r($sql);
// $fetch=fetcharray($res);
// $num=numrows($res);
// if($num>0)
// {
// $_SESSION['uid']=$fetch['id'];
// redirect('index.php');
// }else
// {
// redirect('login.php?m=1');

// }
?>