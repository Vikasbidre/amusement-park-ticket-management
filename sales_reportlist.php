<?php
if(!isset($_SESSION)){ 
  session_start();
  if(!isset($_SESSION['username'])){
    header('location:login.php');
  }
  }
$sucess=0;
$num=0;
$delete=false;
$server="localhost";
$username="root";
$password="";
$database="amusement_db";
$con=mysqli_connect($server,$username,$password);
if(!$con){
    die("connection failed ".mysqli_connect_error());
}
$sql4="select * from `amusement_db`.`users`";
$result4=mysqli_query($con,$sql4);


?>







<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ridelist</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">
  <link href="style2.css" rel="stylesheet">
  <link href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css"rel="stylesheet">
  <link rel="stylesheet" href="travdet.css">
  
</head>

<body style=" background-image:url('sales.jpg'); background-size:cover; ">












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



    <a href="#" class="board g i"><i class="fa-sharp fa-solid fa-chart-line"></i>SALES REPORT SECTION</a>
    <a href="#" id="b" class="board k i"><i class="left-menu-icon fa-solid fa-users"></i>USERS<button id="j"
        style="border:none ;background-color:rgb(22, 168, 240) ;"><i
          class="fa-regular fa-square-caret-down"></i></button></a>
    <a href="user.php" class="dp n i"><i class=" fa-solid fa-caret-right"></i>ADD NEW</a>
    <a href="userslist.php" class=" dp ls i"><i class=" fa-solid fa-caret-right"></i>LIST</a>

  </div>





  <div class="hero" style="color:white;">
  <div class="container"  >
    <div class="title" style="color:gold;">SALES REPORT</div>
    <div class="content">
      <form action="#" method="POST">
        <div class="user-details">
        <div class="input-box">
            <span class="details">FROM</span>
            <input type="date" placeholder="ENTER DATE" required name="date">
          </div>

          <div class="input-box">
            <span class="details">FINAL</span>
            <input type="date" placeholder="ENTER DATE" required name="fdate">
          </div>

          
          
        </div>
        <div class="button">
          
          <input type="submit" name="search" value="GET PRICE">
        </div>
      </form>
    </div>
  </div>



  <table class="table "id="myTable" >
  <thead>
    <tr>
      <th scope="col">sales_id</th>
      <th scope="col">date</th>
      <th scope="col">customer_name</th>
      <th scope="col">ride_name</th>
      <th scope="col">adult_ticket</th>
      <th scope="col">adult_price</th>
      <th scope="col">child_ticket</th>
      <th scope="col">child_price</th>
      <th scope="col">total_price</th>
      


    </tr>
  </thead>
  <tbody style='background:white;    '>
    <?php
if(!empty($_POST['date'])&& !empty($_POST['fdate'])){


$var1=$_POST['date'];
 $y=str_replace('/','-',$var1);
 $date=date("Y-m-d",strtotime($y));


 $var2=$_POST['fdate'];
 $y1=str_replace('/','-',$var2);
 $date1=date("Y-m-d",strtotime($y1));






  $sql13="select * from `amusement_db`.`sales_report` WHERE date BETWEEN '$date' AND '$date1' ";
  $result13=mysqli_query($con,$sql13);
  while($row=mysqli_fetch_assoc($result13)){
    echo "   <tr >
    
    <th >".$row['id']."</th>
    <td>".$row['date']."</td>
    <td>".$row['customer_name']."</td>
    <td>".$row['ridename']."</td>
    <td>".$row['adult_ticket']."</td>
    <td>".$row['adult_price']."</td>
    <td>".$row['child_ticket']."</td>
    <td>".$row['child_price']."</td>
    <td>".$row['total_amount']."</td>
    
  </tr>";
  $sql16="select SUM(total_amount) from `amusement_db`.`sales_report` WHERE date BETWEEN '$date' AND '$date1' ";
  $result16=mysqli_query($con,$sql16);
  
  };
}
else{ 
    $sql="select * from `amusement_db`.`sales_report` ";
    $result=mysqli_query($con,$sql);
    $sn=1;
    while($row=mysqli_fetch_assoc($result)){
      echo "   <tr>
      
      <th >".$row['id']."</th>
      <td>".$row['date']."</td>
      <td>".$row['customer_name']."</td>
      <td>".$row['ridename']."</td>
      <td>".$row['adult_ticket']."</td>
      <td>".$row['adult_price']."</td>
      <td>".$row['child_ticket']."</td>
      <td>".$row['child_price']."</td>
      <td>".$row['total_amount']."</td>
      
    </tr>";
    $sql9="select SUM(total_amount) from `amusement_db`.`sales_report` ";
    $result9=mysqli_query($con,$sql9);
   
    };
  }

    ?>
   
    
  </tbody>
</table>

<?php
if(isset($result16)){ 
while($row=mysqli_fetch_assoc($result16)){
  echo '<h2 style="color:red; display:inline;"> TOTAL PRICE ESTIMATION: </h2>'.$row['SUM(total_amount)'];
    }
  }
elseif(isset($result9)){
  while($row=mysqli_fetch_assoc($result9)){
    echo'<h2 style="color:red; display:inline;"> TOTAL PRICE ESTIMATION: </h2>'.$row['SUM(total_amount)'];
      }
}
?>






























  
  </div>
  













  <script src="https://code.jquery.com/jquery-3.6.1.min.js"integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  
  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"crossorigin="anonymous"></script>
  <script src="admin.js"></script>
  <script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
    </script>
  
   
 
    
 
</body>

</html>