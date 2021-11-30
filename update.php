<?php 
    require_once('connect.php');

    if(isset($_POST['update'])){

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $birthdate = $_POST['birthdate'];
        $address = $_POST['address'];
        $id = $_GET['id'];

    $query = "UPDATE `users_tbl` SET `firstname`='$firstname',`lastname`='$lastname',`birthdate`='$birthdate',`email`='$email',`addres`='$address' WHERE `id`='$id'";
    
    $result=@mysqli_query($dbc,$query);

    if($result==true){
      echo '<script>alert("Record Successfully Updated!");
      window.location.href = "welcome.php";</script>';
    }
    else{
        echo '<script>alert("Error Updating Record!");
        window.location.href = "welcome.php";</script>';
    }
  }
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $q = "SELECT * FROM users_tbl WHERE id ='$id'";
        $result=@mysqli_query($dbc,$q);

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $firstname = $row['firstname'];
                $lastname = $row['lastname'];
                $email = $row['email'];
                $birthdate = $row['birthdate'];
                $address = $row['addres'];

            }
            ?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Update Record</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>

<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css'><link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="container">

    <form class="well form-horizontal" action="" method="post"  id="contact_form">
<fieldset>

<!-- Form Name -->
<legend><center><h2><b>Update Record</b></h2></center></legend><br>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">First Name</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="firstname" value="<?php echo $firstname?>" placeholder="First Name" class="form-control"  type="text">
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Last Name</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="lastname" value="<?php echo $lastname?>" placeholder="Last Name" class="form-control"  type="text">
    </div>
  </div>
</div>

<!-- Text input-->

  <div class="form-group"> 
  <label class="col-md-4 control-label">Birth Date</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
    <input type="date" name="birthdate" value="<?php echo $birthdate?>" class="form-control selectpicker">
      
  </div>
</div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label">E-Mail</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input name="email" value="<?php echo $email?>" placeholder=" E-Mail Address" class="form-control"  type="text">
    </div>
  </div>
</div>
  
<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">Address</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
  <input  name="address"  value="<?php echo $address?>"
   placeholder="Address" class="form-control"  type="text">
    </div>
  </div>
</div>



<!-- Button -->

    <center><input type="submit" name="update" value="Update" class="btn btn-warning" ></center>
  </div>
</div>


</fieldset>
</form>
</div>
    </div><!-- /.container -->
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>
<script  src="./script.js"></script>

</body>
</html>

<?php    
        }
        else {
          header('Location: welcome.php');
        }
    }
?> 