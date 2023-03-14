<?php
$server="localhost";

$username="root";
$password="";
$database="amusement_db";
$con=mysqli_connect($server,$username,$password);
if(!$con){
    die("connection failed ".mysqli_connect_error());
}
else{
  $adult_price=0.00;
  $child_price=0.00;
  $adult_no=0;
  $child_no=0;
  if($_SERVER['REQUEST_METHOD']=='POST'){
  
    
$select=$_POST['select'];
if(isset($_POST['get_price'])  ){
  if($select!="select"){
  $sql="select * from `amusement_db`.`pricing` where ridename='$select'";
  $result=mysqli_query($con,$sql);
  $num1=mysqli_num_rows($result);
  if($num1>0){
    $sql8= $con->query("select *   from `amusement_db`.`pricing` where ridename='$select'");
    $rows=mysqli_fetch_array($sql8);
    $adult_price=$rows['adult_price'];
    $child_price=$rows['child_price'];
    

    
    
    
    
  
  }
  }else{
    $get=1;
  }
}

  
}


 
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
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
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
    <h>customer</h>
    <input type="text" value=""required name="customer" id="customer" >
    <h>ridename/entrance</h>
    <select class="viki"name="select" id="viki" >
        <option>select</option>
        <?php
        $sql="select * from `amusement_db`.`ride` ";
        $result=mysqli_query($con,$sql);
        while($rows=mysqli_fetch_array($result)){
            echo '<option>'.$rows['ridename'].'</option>';

        }
        
        
        
        ?>
</select>

<button name="get_price">get price</button>

<h>no.of adult</h>
    <input type="number" required name="adult_no" id="adult_no" >
    <h>no. of child</h>
    <input type="number" required name="child_no" id="child_no">
    
    <table>
        <thead>
            <tr>
                <th>type</th>
                <th>price</th>
                <th>no</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>adult</td>
                <td> <?php if(isset($adult_price)){ echo  number_format($adult_price, 1);};?></td>
                <td id="adult" name="adult">0 </td>
            </tr>
            <tr>
                <td>child</td>
                <td> <?php if(isset($child_price)){echo number_format($child_price, 1);}; ?></td>
                <td id="">0 </td>
            </tr>
        </tbody>
        
    </table>

    <h>amount to be paid</h>
    <input type="number" value=""required name="pay" id="pay">
    <h>amount tendered</h>
    <input type="number" value=""required name="tendered" id="tendered">
    <h>change</h>
    <input type="number" value=""required name="change" id="change">
    <button name="submit"> submit</button>
    <button name="print"> print</button>
</form>
  </div>



<script>
  
  const my=document.getElementById('viki');
  console.log(my);
  var haa="alla";
  my.addEventListner("change",(event)=>{
haa=document.querySelector('#viki').value;
  })

console.log(haa);





















  let alla=<?php echo $adult_price;  ?>;
  let alla1=<?php echo $child_price;  ?>;
  $("#adult_no").change(function(){
    amounttopay();
  })
  $("#child_no").change(function(){
    amounttopay();
  })
  function amounttopay(){
 if($("#adult_no").val()==""){
  return false;

 }
 if($("#child_no").val()==""){
  return false;
 }
 else{
  
  var totalamount=0;
  var totalamount=(Number($("#adult_no").val()))*alla+(Number($("#child_no").val()))*alla1;
  $("#pay").val(totalamount.toFixed(2));
  
 }
  }
  </script>
<script>
$("#pay").change(function(){
    chillar();
  })
  $("#tendered").change(function(){
    chillar();
  })
  function chillar(){

    if($("#pay").val()==""){
  return false;

 }
 if($("#tendered").val()==""){
  return false;
 }
 else{
  var totalchange=0;
  var totalchange=(Number($("#tendered").val()))-(Number($("#pay").val()));
  $("#change").val(totalchange.toFixed(2));
  
 }

  }









  </script>












  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script>
 
</body>

</html>