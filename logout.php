<?php
include ("admino.php");
$status=session_status();
if($status==PHP_SESSION_ACTIVE){ 
    
    session_destroy();
    
}
?>
<script>location.replace("login.php");</script>