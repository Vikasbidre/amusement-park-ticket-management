<?php
$nm=0;
$ur=0;
$p=0;
$e=0;
$cp=0;
$err=0;
$err1=0;
$suc=0;
$err3=0;
$server="localhost";
$username="root";
$password="";
$database="amusement_db";
$con=mysqli_connect($server,$username,$password);
if(!$con){
    die("connection failed ".mysqli_connect_error());
}
else{
if($_SERVER['REQUEST_METHOD']=='POST'){
  $name=$_POST['name'];
  $user_role=$_POST['roles'];
  $password=$_POST['password'];
  $confirm_password=$_POST['confirm_password'];
  $email=$_POST['email'];

  if(empty($name)){
    $nm=1;
  }
  elseif(empty($user_role)){
    $ur=1;
  }
  elseif(empty($password)){
    $p=1;
  }
  elseif(empty($email)){
    $e=1;
  }
  elseif(empty($confirm_password)){
    $cp=1;
  }
  else{  
  $sql="select * from `amusement_db`.`users` where name='$name'";
  $sql1="select * from `amusement_db`.`users` where email='$email'";
  $result=mysqli_query($con,$sql);
  $result1=mysqli_query($con,$sql1);
  $num=mysqli_num_rows($result);
  $num1=mysqli_num_rows($result1);
  
if($num1>0){
    $err1=1;
  }
  elseif($password==$confirm_password){
    $sql2="INSERT INTO `amusement_db`.`users`( `name`, `user_role`, `email`,`password`) VALUES ('$name','$user_role','$email','$password')";
    $result2=mysqli_query($con,$sql2);
    if($result2){
      $suc=1;
    }
  }
  if($password!=$confirm_password){
    $err3=1;
  }
}
}

























  $con->close();
}


?>






































<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">
  <link href="style2.css" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-expand-lg navini">
    <a href="#"><button id="bar"><i class="fa-solid fa-bars bar"></i></button></a>

    <div class="container-fluid fluid">

      <h2 class="admin">ADMIN</h2>

    </div>
    <div class="profile">
      <h3 style="color:white ;">profile</h3>
      <i class="fa-regular fa-square-caret-down" style="color: white; margin-left:10px; margin-right: 10px;"></i>
    </div>
  </nav>
  <div class="sidebar i" id="tum">
    
    <a href="#" class="board d i"><i class="left-menu-icon fa-solid fa-tv"></i>DASHBOARD</a>
    <a href="#" id="bor" class="board v i"><i class="fa-solid fa-face-grin-beam"></i>RIDE SECTION<button id="dp"
        style="border:none ;background-color:rgb(22, 168, 240) ;"><i
          class="fa-regular fa-square-caret-down "></i></button></a>
    <a href="ride.php" class="drop new i"><i class="fa-duotone fa-caret-right"></i>ADD NEW</a>
    <a href="#" class="drop list i"><i class="fa-duotone fa-caret-right"></i>LIST</a>
    <a href="#" id="bo" class="board f i"><i class="left-menu-icon fa-regular fa-bookmark"></i>TICKETING SECTION<button id="p"
        style="border:none ;background-color:rgb(22, 168, 240) ;"><i
          class="fa-regular fa-square-caret-down"></i></button></a>
    <a href="#" class="drp nw i"><i class="fa-duotone fa-caret-right"></i>ADD NEW</a>
    <a href="#" class=" drp lis i"><i class="fa-duotone fa-caret-right"></i>LIST</a>
    <a href="#" class="board g i"><i class="fa-sharp fa-solid fa-chart-line"></i>SALES REPORT SECTION</a>
    <a href="#" id="b" class="board k i"><i class="left-menu-icon fa-solid fa-users"></i>USERS<button id="j"
        style="border:none ;background-color:rgb(22, 168, 240) ;"><i
          class="fa-regular fa-square-caret-down"></i></button></a>
    <a href="#" class="dp n i"><i class="fa-duotone fa-caret-right"></i>ADD NEW</a>
    <a href="#" class=" dp ls i"><i class="fa-duotone fa-caret-right"></i>LIST</a>

  </div>
  <div class="hero">
  <form method="post">
    <h> name</h>
    <input type="text" name="name">
    <?php
      if($nm>0){ 
      echo '<div class="alert alert-danger" role="alert">
      name is required
     </div>';}
     if($err>0){ 
      echo '<div class="alert alert-danger" role="alert">
      name already exists
     </div>';}
     ?>
    
    <h>user role</h>
    <select name="roles" id="role">
    <option value=""></option>
      <option value="admin">admin</option>
      <option value="staff">staff</option>
    </select>
    <?php
      if($ur>0){ 
      echo '<div class="alert alert-danger" role="alert">
      user role is required
     </div>';}
     ?>
    <h>email</h>
    <input type="email" name="email">
    <?php
      if($e>0){ 
      echo '<div class="alert alert-danger" role="alert">
      email is required
     </div>';}
     if($err1>0){ 
      echo '<div class="alert alert-danger" role="alert">
      email exists
     </div>';}
     ?>
    <h>password</h>
    <input type="password" name="password">
    <?php
      if($p>0){ 
      echo '<div class="alert alert-danger" role="alert">
      password is required
     </div>';}
     ?>
    <h>confirm password</h>
    <input type="password" name="confirm_password">
    <?php
      if($cp>0){ 
      echo '<div class="alert alert-danger" role="alert">
      confirm password is required
     </div>';}
     if($err3>0){ 
      echo '<div class="alert alert-danger" role="alert">
      password and confirm password are not same
     </div>';}
     ?>
    <button> submit</button>
    <?php
    if($suc==1){ 
 
 echo '<div class="alert alert-success" role="alert">
 <h4 class="alert-heading">Well done!</h4>
 <p>Aww yeah, you successfully added new user</p>
 <hr>
 </div>';
 }
 ?>


</form>
  </div>
  















  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script>
  <script src="admin.js"></script>
</body>

</html>