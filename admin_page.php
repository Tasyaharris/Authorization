<?php
 
 session_start();



include("connection.php");
include("function.php");

$sql = "select username, role from users";
$result = mysqli_query($conn, $sql);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
   
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>

    <table>
  <thead>
    <tr>
      <th>Username</th>
      <th>Role</th>
      
    </tr>
    </thead>
    <tbody id="data">
    <!-- Display data from the database here -->
    <?php
        while($row = mysqli_fetch_assoc($result)){
           echo "<tr>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['role'] . "</td>";
            //echo "<td>" . "<a href= "#" onlick= "updateData($row['id'],$row['username])"></a>"  ."</td>";
            echo "</tr>";
        } 



        mysqli_close($conn);


    ?>
    </tbody>

    </table>

    
    
    <script>
        // Load data from the database when the page loads
$(document).ready(function() {
  loadData();
});

// Load data from the database and display it in the table
function loadData() {
  $.ajax({
    url: "load_data.php",
    type: "POST",
    dataType: "html",
    success: function(response) {
      $("#data").html(response);
    }
  });
}

// Update data in the database
function updateData(id, username) {
  $.ajax({
    url: "update_data.php",
    type: "POST",
    data: {id: id, username: username},
    dataType: "html",
    success: function(response) {
      if (response == "success") {
        alert("Data updated successfully.");
        loadData();
      } else {
        alert("Error updating data.");
      }
    }
  });
}

// Delete data from the database
function deleteData(id) {
  $.ajax({
    url: "delete_data.php",
    type: "POST",
    data: {id: id},
    dataType: "html",
    success: function(response) {
      if (response == "success") {
        alert("Data deleted successfully.");
        loadData();
      } else {
        alert("Error deleting data.");
      }
    }
  });
}


    </script>
    
    
</body>
</html>

