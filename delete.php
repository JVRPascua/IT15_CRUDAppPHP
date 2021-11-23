<?php
require_once('connect.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "DELETE FROM `users_tbl` WHERE id = '$id'";
    $result = $dbc->query($query);

    if($result == TRUE){
        echo '<script>alert("User Successfully Deleted!")
        window.location.href = "welcome.php";</script>';
    }
    else{
        echo '<script>alert("Error!")
        window.location.href = "welcome.php";</script>';
    }

 }
?>