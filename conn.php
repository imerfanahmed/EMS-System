<?php
    $conn=mysqli_connect("localhost","root","ramzanali19","ems");

    if(!$conn){
        die("Unable To Connect");
    }
    else{
        echo "<script> console.log('Database Connected Successfully')</script>";
    }

?>