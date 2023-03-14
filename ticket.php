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
 
  
 
<form name="rana" method="post" action="makepdf.php">
  
<select name="id" id="id" >
        <option>select</option>
        <?php
        $sql="select * from `amusement_db`.`pricing` ";
        $result=mysqli_query($con,$sql);
        while($rows=mysqli_fetch_array($result)){
            echo '<option>'.$rows['ridename'].'</option>';

        }
        
        
        
        ?>
</select>

<input type="submit" name="searchdata" id="searchdata" value="search">
  <div id="vedformid" method="post" action="makepdf.php" >
  
      </div>

















<h>enter adult price</h>
<select name="idea" id="idea" required >
        <option>select</option>
        <?php
        $sql="select * from `amusement_db`.`pricing` ";
        $result=mysqli_query($con,$sql);
        while($rows=mysqli_fetch_array($result)){
            echo '<option>'.$rows['adult_price'].'</option>';

        }
        
        
        
        ?>
</select>
    <h>enter child price</h>
    <select name="vivo" id="vivo" required >
        <option>select</option>
        <?php
        $sql="select * from `amusement_db`.`pricing` ";
        $result=mysqli_query($con,$sql);
        while($rows=mysqli_fetch_array($result)){
            echo '<option>'.$rows['child_price'].'</option>';

        }
        
        
        
        ?>
</select>
<h>customer</h>
    <input type="text" value=""required name="customer" id="customer" >

<h>no.of adult</h>
    <input type="number" required name="adult_no" id="adult_no" >
    <h>no. of child</h>
    <input type="number" required name="child_no" id="child_no">
    <h>amount to be paid</h>
    <input type="number" value=""required name="pay" id="pay" >
    <h>amount tendered</h>
    <input type="number" value=""required name="tendered" id="tendered">
    <h>change</h>
    <input type="number" value=""required name="change" id="change" >
    
    <button name="save" >print</button>
    
      </form>



  
       
  </div>


  <script type="text/javascript">
  $(document).ready(function(){
     $('#searchdata').click(function (e){
      e.preventDefault();
      var id= $('select[name=id]').val();
      $.ajax({
        type:"POST",
        url:"fetch.php",
        data:{
          "search_post_btn": 1,
          "id": id,
        },
        dataType:"text",
        success: function (response){
          
          $("#vedformid").html(response)
      
  				
          
        }


      });
     });
  });
  

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
  var totalamount=(Number($("#adult_no").val()))*(Number($("#idea").val()))+(Number($("#child_no").val()))*(Number($("#vivo").val()));
  $("#pay").val(totalamount.toFixed(2));
  
 }
  }
 
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
  
  $("#change").val(totalchange);
  
 }

  }



  </script>














  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script>
    <script src="admin.js"></script>
 
</body>

</html>