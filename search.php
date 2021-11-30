<form action="welcome.php">
    <input class="button dashboardbutton" type="submit" value="Go to Dashboard" />
</form>
<style>
  .dashboardbutton {
  background-color: white;
  color: black;
  border: 2px solid #e7e7e7;
  padding: 10px 24px;
  transition-duration: 0.4s;
}
.dashboardbutton:hover{
  background-color: #e7e7e7;
}

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

</style>

<?php
require_once('connect.php');
if (isset($_POST['search'])){
    $valueToSearch = $_POST['valueToSearch'];
    
    $query= "SELECT * FROM users_tbl
    WHERE firstname LIKE '%$valueToSearch%' OR lastname LIKE '%$valueToSearch%' OR email LIKE '%$valueToSearch%'";
    $result = @mysqli_query($dbc, $query);
   
    if (mysqli_num_rows($result) > 0) {
        
        echo "<table border='1' id='studenttable'>
        <tr>
        <th></th>
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
         echo '<script>alert("No records found!");
         window.location.href = "loginpage.html";</script>';
       }
       

}
   ?>
   