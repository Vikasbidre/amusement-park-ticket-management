<?php
if(!isset($_SESSION)){ 
  session_start();
  if(!isset($_SESSION['username'])){
    header('location:login.php');
  }
  }
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
  $sql4="select * from `amusement_db`.`users`";
  $result4=mysqli_query($con,$sql4);
if($_SERVER['REQUEST_METHOD']=='POST'){
  $name=$_POST['name'];
  $user_role=$_POST['roles'];
  $new=$_POST['password'];
  $new=md5($new);
  $confirm_password=$_POST['confirm_password'];
  $confirm_password=md5($confirm_password);
  $email=$_POST['email'];

  if(empty($name)){
    $nm=1;
  }
  elseif(empty($user_role)){
    $ur=1;
  }
  elseif(empty($new)){
    $p=1;
  }
  elseif(empty($email)){
    $e=1;
  }
  elseif(empty($confirm_password)){
    $cp=1;
  }
  else{  
    $sql4="select * from `amusement_db`.`users`";
    $result4=mysqli_query($con,$sql4);
  $sql="select * from `amusement_db`.`users` where name='$name'";
  $sql1="select * from `amusement_db`.`users` where email='$email'";
  $result=mysqli_query($con,$sql);
  $result1=mysqli_query($con,$sql1);
  $num=mysqli_num_rows($result);
  $num1=mysqli_num_rows($result1);
  
if($num1>0){
    $err1=1;
  }
  elseif($new==$confirm_password){
   
   
    $sql2="INSERT INTO `amusement_db`.`users`( `name`, `user_role`, `email`,`password`) VALUES ('$name','$user_role','$email','$new')";
    
    

    $result2=mysqli_query($con,$sql2);
    if($result2){
      $suc=1;
    }
  }
  if($new!=$confirm_password){
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
  <link rel="stylesheet" href="travdet.css">
</head>

<body style=" background-image:url('side.png'); background-size:cover;">
<nav class="navbar navbar-expand-lg navini">
    <a href="#"><button id="bar"><i class="fa-solid fa-bars bar"></i></button></a>

    <div class="container-fluid fluid d-flex justify-content-between">

      <h2 class="admin">ADMIN</h2>
     
    
    
      <div class="profile">
    <h3 style="color:white ;margin-left:2px;"><?php  while($row=mysqli_fetch_assoc($result4)){ 
      
      if( $_SESSION['username']==$row['email']){
        echo '<i class="fa-regular fa-user"></i>';
        echo" ";
       echo "<th >".$row['name']."</th>";
      }
         }  ?></h3>

         
    <form method="post">
    <a class="btn btn-info mx-2" name="logout" href="logout.php" id="logout"role="button">Log out</a>
  </form>
    </div>
</div>
  </nav>




  <div class="sidebar i" id="tum">
    
    <a href="admino.php" class="board d i "><i class="left-menu-icon fa-solid fa-tv "></i>DASHBOARD</a>
    <a href="#" id="bor" class="board v i"><i class="fa-solid fa-face-grin-beam"></i>RIDE SECTION<button id="dp"
        style="border:none ;background-color:rgb(22, 168, 240) ;"><i
          class="fa-regular fa-square-caret-down "></i></button></a>
    <a href="ride.php" class="drop new i"><i class=" fa-solid fa-caret-right"></i>ADD NEW</a>
    <a href="ridelist.php" class="drop list i"><i class=" fa-solid fa-caret-right"></i>LIST</a>




    <a href="#" id="bori" class="board va i"><i class="fa-solid fa-face-grin-beam"></i>PRICING SECTION<button id="dop"
      style="border:none ;background-color:rgb(22, 168, 240) ;"><i
        class="fa-regular fa-square-caret-down "></i></button></a>
  <a href="pricing.php" class="dropi newi i"><i class=" fa-solid fa-caret-right"></i>ADD NEW</a>
  <a href="pricinglist.php" class="dropi listi i"><i class=" fa-solid fa-caret-right"></i>LIST</a>
    <a href="#" id="bo" class="board f i"><i class="left-menu-icon fa-regular fa-bookmark"></i>TICKETING SECTION<button id="p"
        style="border:none ;background-color:rgb(22, 168, 240) ;"><i
          class="fa-regular fa-square-caret-down"></i></button></a>
    <a href="ticki.php" class="drp nw i"><i class=" fa-solid fa-caret-right"></i>ADD NEW</a>
    <a href="ticketlist.php" class=" drp lis i"><i class=" fa-solid fa-caret-right"></i>LIST</a>



    <a href="sales_reportlist.php" class="board g i"><i class="fa-sharp fa-solid fa-chart-line"></i>SALES REPORT SECTION</a>
    <a href="#" id="b" class="board k i"><i class="left-menu-icon fa-solid fa-users"></i>USERS<button id="j"
        style="border:none ;background-color:rgb(22, 168, 240) ;"><i
          class="fa-regular fa-square-caret-down"></i></button></a>
    <a href="#" class="dp n i"><i class=" fa-solid fa-caret-right"></i>ADD NEW</a>
    <a href="userslist.php" class=" dp ls i"><i class=" fa-solid fa-caret-right"></i>LIST</a>

  </div>

  <div class="hero">
  <div class="container">
    <div class="title">USERS DETAILS</div>
    <div class="content">
      <form action="#" method="POST">
        <div class="user-details">
        <div class="input-box">
            <span class="details">NAME</span>
            <input type="text" placeholder="ENTER NAME" required name="name">
          </div>
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
    <div class="input-box">
    <span class="details">USER ROLE</span>
    <select name="roles" id="role">
    
      <option value="admin">admin</option>
      <option value="staff">staff</option>
    </select>
    </div>
    <?php
      if($ur>0){ 
      echo '<div class="alert alert-danger" role="alert">
      user role is required
     </div>';}
     ?>
    <div class="input-box">
            <span class="details">EMAIL</span>
            <input type="email" placeholder="ENTER EMAIL" required name="email">
          </div>
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
   <div class="input-box">
            <span class="details">PASSWORD</span>
            <input type="password" placeholder="ENTER EMAIL" required name="password">
          </div>
    <?php
      if($p>0){ 
      echo '<div class="alert alert-danger" role="alert">
      password is required
     </div>';}
     ?>
   <div class="input-box">
            <span class="details">CONFIRM PASSWORD</span>
            <input type="password" placeholder="ENTER EMAIL" required name="confirm_password">
          </div>
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
     </div>
     <div class="button">
          
          <input type="submit" name="search" value="SAVE">
        </div>
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
</div>
<div>
  






<!--<div class="container">
    <div class="title">USERS DETAILS</div>
    <div class="content">
      <form action="#" method="POST">
        <div class="user-details">
          <div class="input-box">
            <span class="details">RIDENAME</span>
            <input type="password" placeholder="ENTER EMAIL" required name="password">
          </div>
          <div class="input-box">
            <span class="details">DESCRIPTION</span>
            <input type="textarea" placeholder="ENTER DESCRIPTION" required name="description">
          </div>
          
          
        </div>
        <div class="button">
          
          <input type="submit" name="search" value="SAVE">
        </div>
      </form>
    </div>
  </div>-->















  







  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script>
  <script src="admin.js"></script>
</body>

</html>