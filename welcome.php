<?php
   include('session.php');
   require_once('connect.php');
?>
<html">
   
   <head>
      <title>Welcome</title>
   </head>
   
   <body>
      

            
      <h1>Welcome <?php echo $login_session; ?></h1> 

      <form action="search.php" method="post">
      <input type="text" name="valueToSearch" placeholder="Search">
      <input type="submit" name="search" value="Search">
      </form>
      
      <h2>
         <?php
            $sql = "SELECT id, firstname, lastname, birthdate, email, addres, regs_date FROM users_tbl";
            $result = @mysqli_query($dbc, $sql);
            if ($result->num_rows > 0) {
               echo "<table border='1'>
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
                  <td> <a class="btn" href="">Update</a> <a class="btn" href="delete.php?id=<?php echo $row['id']?>">Delete</a></td>
               

               </tr>
               <?php
               }
               echo "</table>";
               
             } else {
               echo "NO DATA TO DISPLAY";
             }
         ?>
      </h2>
      
      <h3><a href = "logout.php">Sign Out</a></h3>
  
   </body>
   
</html>