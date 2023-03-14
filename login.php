<?php
session_start();
$server="localhost";
$username="root";
$password="";
$database="amusement_db";
$con=mysqli_connect($server,$username,$password);
if(!$con){
    die("connection failed ".mysqli_connect_error());
}
else{
    $num=0;
    $err=0;
    if($_SERVER['REQUEST_METHOD']=='POST'){
$var=$_POST['user'];
$var1=$_POST['pass'];
$var1=md5($var1);
$sql="select * from `amusement_db`.`users` where email='$var' AND password='$var1'";
  $result1=mysqli_query($con,$sql);
  $num=mysqli_num_rows($result1);
  if($num>0){
    $sql8= $con->query("select *  from `amusement_db`.`users` where email='$var'");
    $yakla=$sql8->fetch_array()['user_role'];
    $yar=strtoupper($yakla);
    if($yar=="ADMIN"){
$_SESSION['username']=$var;

header('location:admino.php');
    }
   else{
    $_SESSION['username']=$var;
header('location:staff.php');
   }






  }
  else{
$err=1;
  }





    }
}








?>



















<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>amusement park management system</title>
    <link href="style.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;900&family=Sen:wght@400;700&display=swap" rel="stylesheet">
</head>

<body >
    <h1 class="head">Amusement Park Management System</h1>
    <form method="post">
    <div class="login">
    
        <h2 class="heading">login</h2>
        <?php  if($err>0){
            echo '<p style="font-size:10px;color:red;">ENTER CORRECT USERNAME OR PASSWORD</p>';
        } ?>
        <input type="email" name="user"class="username" required placeholder="username" autocomplete="off">
        
        <input type="password" name="pass" class="password" required placeholder="password" autocomplete="off">
        <div class="me">
        <input type="checkbox" placeholder="tick" autocomplete="off">
        <p class="remember">remember me?</p>
        <button class="signin" name="submit">sign in</button>
        </div>
    </div>
</form>


</body>

</html>