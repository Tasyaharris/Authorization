<?php
include("connection.php");
include("function.php");

// Connect to the database
//$conn = mysqli_connect("localhost", "username", "password", "database");

// Get the data from the AJAX request

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $id = $_POST['id'];
    $username = $_POST['username'];

    // Update the data in the database
$sql = "UPDATE users SET username='$username' WHERE id=$id";
$result = mysqli_query($conn, $sql);

// Send a response back to the client
if ($result) {
  echo "success";
} else {
  echo "error";
}

}




// Close the database connection
mysqli_close($conn);
?>
