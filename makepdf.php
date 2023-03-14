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

 
  $num=0;
  $num2=0;
  $err=0;
  $sucess=0;
    if(isset($_POST['save'])){
  
  $name=$_POST['customer'];
  $ridename=$_POST['id'];
  $adult_price=$_POST['idea'];
  $child_price=$_POST['vivo'];
  $adult_no=$_POST['adult_no'];
  $child_no=$_POST['child_no'];
  $total_amt=$_POST['pay'];
 
  
  $ticket_no=rand(12354678,99872635);
  $sql8= "select *   from `amusement_db`.`pricing` where ridename='$ridename'";
  $result8=mysqli_query($con,$sql8);
  $num2=mysqli_num_rows($result8);
  
  if($num2>0){ 
  $sql12="select * from `amusement_db`.`ticketing` where ticket_no='$ticket_no'";
  $result2=mysqli_query($con,$sql12);
  $num1=mysqli_num_rows($result2);
  
  
  if($num>0){
    $err=1;
  }
  else{ 
  $sql1="INSERT INTO `amusement_db`.`ticketing`( `ticket_no`, `customer_name`, `date_created`,`ridename`,`adult_ticket`,`child_ticket`) VALUES ('$ticket_no','$name',current_timestamp(),'$ridename','$adult_no','$child_no')";
  
  
  
  
  
  if ($con->query($sql1)==true) {
    $sql9= $con->query("select *   from `amusement_db`.`ticketing` where ticket_no='$ticket_no'");
      $yakla=$sql9->fetch_array()['id'];
  
    $sql2="INSERT INTO `amusement_db`.`sales_report`( `date`, `customer_name`, `ridename`,`adult_ticket`,`adult_price`,`child_ticket`,`child_price`,`total_amount`,`ticket_id`) VALUES (current_timestamp(),'$name','$ridename','$adult_no','$adult_price','$child_no','$child_price','$total_amt','$yakla')";
    if ($con->query($sql2)==true) {

      echo'<script>alert("data sucessfully added");</script>';
      if(isset($_POST['save'])){
        $name=$_POST['customer'];
        $ridename=$_POST['id'];
        $date= date('j M Y');
      }
     $html='
    <h1>AMUSEMENT PARK TICKET</h1>
    <h2>name:'.$name.'</h2>
    <h2>ridename:'.$ridename.'</h2>
    <h2>date:'.$date.'</h2>
    
     ';
     
     require_once __DIR__ . '/vendor/autoload.php';
     $mpdf=new \Mpdf\Mpdf();
     $mpdf->WriteHTML($html);
     $file="ticket.pdf";
     $mpdf->Output( $file,'D');
    
    
     
    }
    }
  }
    }
   else{
    echo'<script>alert("INVALID DATA TO GENERATE TICKET");</script>';
   }
  }
}




































    
 // if(isset($_POST['save'])){
    //$name=$_POST['customer'];
    //$ridename=$_POST['id'];
//    $date= date('j M Y');
//  }
// $html='
//<h1>AMUSEMENT PARK TICKET</h1>
//<h2>name:'.$name.'</h2>
//<h2>ridename:'.$ridename.'</h2>
//<h2>date:'.$date.'</h2>

 //';
 
// require_once __DIR__ . '/vendor/autoload.php';
 //$mpdf=new \Mpdf\Mpdf();
 //$mpdf->WriteHTML($html);
 //$file="ticket.pdf";
 //$mpdf->Output( $file,'D');


 
//}

?>


