<?php
require_once('connect.php');
session_start();

if(isset($_POST['login'])){ 
    $email = $_POST['email'];
    $password = $_POST['password'];


    $login_query = "SELECT * from users_tbl WHERE email='$email' AND pass='$password' ";

    $result = @mysqli_query($dbc,$login_query);

    if(mysqli_num_rows($result)){
        echo '<script>window.location.href = "welcome.php";</script>';  
        $_SESSION['login_user'] = $email;
    }
    else{
        echo '<script>alert("Email and Password are incorrect!");
        window.location.href = "loginpage.html";</script>';  
    }

     }

?>