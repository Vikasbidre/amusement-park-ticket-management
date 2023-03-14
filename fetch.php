<?php 
 
$connection=mysqli_connect("localhost","root","");
if(isset($_POST['search_post_btn'])){
    if(isset($_POST['id'])){ 
    $id=$_POST['id'];
    $query="select * from `amusement_db`.`pricing` where ridename='$id'";
    $query_run=mysqli_query($connection,$query);
    
    if( $query_run){
     while($row=mysqli_fetch_array($query_run)){
        ?>
        <tr>

            <th>adult_price<th>
                <td><input type="number" name="haal" id="haal" value="<?php echo $row['adult_price'] ?>"></td>
               
     </tr>
     <tr>
            <th>child_price<th>
                <td><input type="number" name="child" id="child" value="<?php echo $row['child_price'] ?>"></td>
     </tr>
     
        <?php
     }
    }
}

     
    else{
        echo "data not found";
    }
    
}




   










?>
