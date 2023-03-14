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
$con=mysqli_connect($server,$username,$password,$database);
if(!$con){
    die("connection failed ".mysqli_connect_error());
}
$sql4="select * from `amusement_db`.`users`";
$result4=mysqli_query($con,$sql4);
if(isset($_GET['ravan'])){
  $tit=$_GET['snoEdi'];
  $sql2="  DELETE FROM `amusement_db`.`users` WHERE `id`='$tit'";
   $result1=mysqli_query($con,$sql2);
  
    }
if($_SERVER['REQUEST_METHOD']=='POST'){
  
if(isset($_POST['ram'])){
  $title=$_POST['titleEdit'];
  $description=$_POST['descriptionEdit'];
  $user_id=$_POST['snoEdit'];
  $email=$_POST['emailEdit'];
  $password=$_POST['passwordEdit'];
 $sql="  UPDATE `amusement_db`.`users` SET `name`='$title',`email`='$email',`password`='$password',`user_role`='$description' WHERE `id`='$user_id'";
 $result1=mysqli_query($con,$sql);
}
}
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

<body style=" background-image:url('userlist.jpg'); background-size:cover; color:white;">

 
<!-- Button trigger modal 
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
Edit
</button>-->

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editModalLabel">EDIT THIDS NOTE</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="userslist.php" method="post">
      <input type="text" type="hidden" id="snoEdit" name="snoEdit" >
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">NAME</label>
    <input type="text" class="form-control" id="titleEdit" name="titleEdit" aria-describedby="emailHelp">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">user_role</label>
    <input type="text" class="form-control" id="descriptionEdit" name="descriptionEdit">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">email</label>
    <input type="text" class="form-control" id="emailEdit" name="emailEdit">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">password</label>
    <input type="text" class="form-control" id="passwordEdit" name="passwordEdit">
  </div>
  
  <button  name="ram"type="submit" class="btn btn-primary">UPDATE</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>





<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="deleteModalLabel">DO U WANT TO DELETE THIS USER</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="userslist.php" method="get">
      
      
      <input input type="text" type="hidden" id="snoEdi" name="snoEdi" >
 
  <button  name="ravan"type="submit" class="btn btn-danger">DELETE</button>
  
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>























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
    <a href="user.php" class="dp n i"><i class=" fa-solid fa-caret-right"></i>ADD NEW</a>
    <a href="#" class=" dp ls i"><i class=" fa-solid fa-caret-right"></i>LIST</a>

  </div>








  <div class="hero" style="color:white;">
  <div class="button" >
          
          <input type="submit" style="background: linear-gradient(135deg, #71b7e6, #9b59b6); 
          border: none;
    font-size:30px;
    color:white;
    border-radius:10px;
    margin-bottom:20px;
    width:300px;
    box-shadow: 3px 3px 6px rgba(0, 0, 0, 0.4);" name="search" value="USER LIST">
</div>

  <table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">user_id</th>
      <th scope="col">name</th>
      <th scope="col">user_role</th>
      <th scope="col">email</th>
      <th scope="col">password</th>
      <th scope="col">actions</th>
    </tr>
  </thead>
  <tbody style="background:white;">
    <?php
    $sql="CALL `listing_user`() ";
    $result=mysqli_query($con,$sql);
    $sn=1;
    while($row=mysqli_fetch_assoc($result)){
      echo "   <tr>
      
      <th >".$row['id']."</th>
      <td>".$row['name']."</td>
      <td>".$row['user_role']."</td>
      <td>".$row['email']."</td>
      <td>".$row['password']."</td>
      <td><button class='edit btn btn-sm btn-primary' id=".$row['id'].">EDIT</button><button class='delete btn btn-sm btn-danger mx-2' id=d".$row['id'].">Delete</button></td>
    </tr>";
    $sn=$sn+1;
    };
    ?>
   
    
  </tbody>
</table>
































  
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
  <script>
   edits= document.getElementsByClassName('edit')
   Array.from(edits).forEach((element)=>{
    element.addEventListener("click",(e)=>{
console.log("edit",e);
tr=e.target.parentNode.parentNode;

title=tr.getElementsByTagName("td")[0].innerText;
description=tr.getElementsByTagName("td")[1].innerText;
enma=tr.getElementsByTagName("td")[2].innerText;
pass=tr.getElementsByTagName("td")[3].innerText;
console.log(title,description);
titleEdit.value=title;
descriptionEdit.value=description;
snoEdit.value=e.target.id
emailEdit.value=enma
passwordEdit.value=pass

$('#editModal').modal('toggle')


    })
   })

</script>
   
  <script>
   deletes= document.getElementsByClassName('delete');
   Array.from(deletes).forEach((element)=>{
    element.addEventListener("click",(d)=>{

tr=d.target.parentNode.parentNode;

title=tr.getElementsByTagName("th")[0].innerText;
console.log(title)
snoEdi.value=title;
$('#deleteModal').modal('toggle')



    })
   })
    </script>
    
 
</body>

</html>