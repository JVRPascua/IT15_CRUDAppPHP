<?php
require_once('connect.php');


if(isset($_POST['register'])){
    
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $birthdate = $_POST['birthdate'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $password = $_POST['password'];
  
    $query_email_duplicate = "SELECT email FROM users_tbl WHERE email='$email'";
    $result_email_duplicate = @mysqli_query($dbc, $query_email_duplicate);

    if(mysqli_num_rows($result_email_duplicate) > 0){
        echo '<script>alert("Email already used!");
        window.location.href = "registrationpage.html";</script>'; 
    }

    else {
    $query_register = "INSERT INTO users_tbl(firstname, lastname, birthdate, email, addres, pass, regs_date) 
                        VALUES ('$firstname','$lastname','$birthdate','$email','$address','$password',NOW())";
    $result = @mysqli_query($dbc, $query_register);

        if (!$result) {
        $err[] = "Failed to add user: " . mysqli_error($dbc);
        }

        else{
   
        echo '<script>alert("User Successfully Added!");
        window.location.href = "loginpage.html";</script>';  
        }
    }
        mysqli_close($dbc);
}

else{
    exit('Could not connect to the database ' .mysqli_connect_error());
}
 
?>