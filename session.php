<?php
   include('connect.php');
   session_start();
   
   $email = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($dbc,"SELECT email FROM users_tbl WHERE email = '$email' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['email'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
      die();
   }
?>