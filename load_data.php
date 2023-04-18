<?php
// Connect to the database
$conn = mysqli_connect("localhost", "username", "password", "database");

// Query the database and fetch the data
$sql = "SELECT * FROM mytable";
$result = mysqli_query($conn, $sql);

// Display the data in the table
while ($row = mysqli_fetch_assoc($result)) {
  echo "<tr>";
  echo "<td>" . $row['username'] . "</td>";
  echo "<td>";
  echo "<button onclick=\"updateData(" . $row['id'] . ",'" . $row['name'] . "')\">Update</button>";
  echo "<button onclick=\"deleteData(" . $row['id'] . ")\">Delete</button>";
  echo "</td>";
  echo "</tr>";
}

// Close the database connection
mysqli_close($conn);
?>
