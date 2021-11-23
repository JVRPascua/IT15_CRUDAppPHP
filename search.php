<?php
require_once('connect.php');
if (isset($_POST['search'])){
    $valueToSearch = $_POST['valueToSearch'];
    
    $query= "SELECT * FROM users_tbl
    WHERE firstname LIKE '%$valueToSearch%' OR lastname LIKE '%$valueToSearch%' OR email LIKE '%$valueToSearch%'";
    $result = @mysqli_query($dbc, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1'>
        <tr>
        <th></th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Birthdate</th>
        <th>Email</th>
        <th>Address</th>
        <th>Registration Date</th>
        </tr>";
        
        while($row = @mysqli_fetch_array($result))
        {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['firstname'] . "</td>";
        echo "<td>" . $row['lastname'] . "</td>";
        echo "<td>" . $row['birthdate'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['addres'] . "</td>";
        echo "<td>" . $row['regs_date'] . "</td>";

        echo "</tr>";
        }
        echo "</table>";
        echo "<p><a href='welcome.php' class='btn'>Back to Home Page</a></p>";
       }    
   else
     { 
        echo "No result!";
        echo "<p><a href='welcome.php' class='btn'>Back to Home Page</a></p>";
     }
}
?>