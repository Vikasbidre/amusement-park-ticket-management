<?php
$server="localhost";

$username="root";
$password="";
$database="amusement_db";
$con=mysqli_connect($server,$username,$password,$database);
if(!$con){
    die("connection failed ".mysqli_connect_error());
}
else{
  
 
  $num=0;
  $num09=0;
  $num2=0;
  $err=0;
  $err9=0;
  $sucess=0;
    if(isset($_POST['save'])){
  
  $name=$_POST['customer'];
  $ridename=$_POST['id'];
  $adult_price=$_POST['idea'];
  $child_price=$_POST['vivo'];
  $adult_no=$_POST['adult_no'];
  $child_no=$_POST['child_no'];
  $total_amt=$_POST['pay'];
    $sql09= "select *   from `amusement_db`.`pricing` where ridename='$ridename' AND adult_price='$adult_price' AND child_price='$child_price'";
    $result09=mysqli_query($con,$sql09);
    $num09=mysqli_num_rows($result09);
  if($num09==0){
    echo'<script>alert("WRONG PRICE ENTRY");</script>';
  }  
 



  else{ 
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



   //$sql120="DROP TRIGGER IF EXISTS `ram`";
   // mysqli_query($con,$sql120);
   
   $a += 5;
  $sql1="INSERT INTO `amusement_db`.`ticketing`( `ticket_no`, `customer_name`, `date_created`,`ridename`,`adult_ticket`,`child_ticket`,`adult_price`,`child_price`,`total_amt`) VALUES ('$ticket_no','$name',current_timestamp(),'$ridename','$adult_no','$child_no','$adult_price','$child_price','$total_amt')";

  
  
  
  
 if ($con->query($sql1)==true) {
    $sql9= $con->query("select *   from `amusement_db`.`ticketing` where ticket_no='$ticket_no'");
      $yakla=$sql9->fetch_array()['id'];
      $delete=['tike'];
  
   //$sql2=" CREATE TRIGGER `ram` AFTER INSERT ON `ticketing`
   //FOR EACH ROW  INSERT INTO sales_report VALUES(NULL,current_timestamp(),NEW.customer_name,NEW.ridename,NEW.adult_ticket,NEW.adult_price,NEW.child_ticket,NEW.child_price,NEW.total_amt,NEW.id)";
   //if ($con->query($sql2)==true) {
  
      echo'<script>alert("data sucessfully added");</script>';
      if(isset($_POST['save'])){
        $name=$_POST['customer'];
        $ridename=$_POST['id'];
        $date= date('j M Y');
      }
     $html='
    <h1>AMUSEMENT PARK TICKET</h1>
    <h2>ticket_no:'.$ticket_no.'</h2>
    <h2>------------------------------</h2>
    <h2>name:'.$name.'</h2>
    <h2>adult_no:'.$adult_no.'</h2>
    <h2>child_no:'.$child_no.'</h2>
    <h2>ridename:'.$ridename.'</h2>
    <h2>date:'.$date.'</h2>
    
     ';
     
     require_once __DIR__ . '/vendor/autoload.php';
     $mpdf=new \Mpdf\Mpdf();
     $mpdf->WriteHTML($html);
     $file="ticket.pdf";
     $mpdf->Output( $file,'D');
    
    
     
 // }
    }
  }
    }
   else{
    echo'<script>alert("INVALID DATA TO GENERATE TICKET");</script>';
   }
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


