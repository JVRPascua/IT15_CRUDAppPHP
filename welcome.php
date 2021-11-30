<?php
   include('session.php');
   require_once('connect.php');
?>
<html>
   
   <head>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <title>Welcome</title>
      <style>

#studenttable {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#studenttable td, #studenttable th {
  border: 1px solid #ddd;
  padding: 8px;
}

#studenttable tr:nth-child(even){background-color: #f2f2f2;}

#studenttable tr:hover {background-color: #ddd;}

#studenttable th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
.search-container {
  float: right;
}
input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}

input[type=text] {
    border: 1px solid #ccc;  
  }
  body {
  font-family: Arial;
}

* {
  box-sizing: border-box;
}

form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
}

form.example button {
  float: left;
  width: 20%;
  padding: 10px;
  background: #2196F3;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

button:hover {
  background: #0b7dda;
}

form.example::after {
  content: "";
  clear: both;
  display: table;
}
</style>
   </head>
   
   <body>
      

      <div class="header">  
      <h1><center>LPU-Laguna Student Records</center></h1>
      </div>
      
      <div class="search-container">
      <form action="search.php" method="post">
      <input type="text" placeholder="Search.." name="valueToSearch">
      <button type="submit" name="search"> <i class="fa fa-search"></i></button>
    </form>
  </div>
      
      <h2>
         <?php
            $sql = "SELECT id, firstname, lastname, birthdate, email, addres, regs_date FROM users_tbl";
            $result = @mysqli_query($dbc, $sql);
            if ($result->num_rows > 0) {
               echo "<table id='studenttable' border='1'>
               <tr>
               <th>ID</th>
               <th>Firstname</th>
               <th>Lastname</th>
               <th>Birthdate</th>
               <th>Email</th>
               <th>Address</th>
               <th>Registration Date</th>
               <th>Actions </th>
               </tr>";
               
               while($row = @mysqli_fetch_array($result)) { ?>
                  <tr>
                  <td> <?php echo $row['id'] ?> </td>
                  <td> <?php echo $row['firstname'] ?> </td>
                  <td> <?php echo $row['lastname'] ?> </td>
                  <td> <?php echo $row['birthdate'] ?> </td>
                  <td> <?php echo $row['email'] ?> </td>
                  <td> <?php echo $row['addres'] ?> </td>
                  <td> <?php echo $row['regs_date'] ?> </td>
                  <td> <a class="btn" href="update.php?id=<?php echo $row['id']?>">Update</a> <a class="btn" href="delete.php?id=<?php echo $row['id']?>">Delete</a></td>
               

               </tr>
               <?php
               }
               echo "</table>";
               
             } else {
               echo "NO DATA TO DISPLAY";
               
             }
         ?>
      </h2>
      
      <h3><a href="logout.php" class="btn btn-info btn-lg"> <span class="glyphicon glyphicon-log-out"></span> Log out</a></h3>
  
   </body>
   
</html>