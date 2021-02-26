<?php
        require 'conn.php';
        $id=$_GET['e_id'];
        $d="DELETE FROM employees WHERE ID='$id'";
        if(mysqli_query($conn,$d)){
            echo "<script>alert('Record Deleted Successfully!');</script>";
            header('Location: dash.php');
        }
        else{
            echo mysqli_error();
        }



?>