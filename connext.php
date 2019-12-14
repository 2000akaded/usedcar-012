<?php
    //connect Server
    $conn = new mysqli("localhost", "root","12345678","usedcar-012");
    if($conn->connect_errno){
        die("connection failed : ".$conn->connect_error);
    }
?>