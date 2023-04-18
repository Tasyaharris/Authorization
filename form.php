<?php

  session_start();

    include("connection.php");
    include("function.php");

?>




<!DOCTYPE html>
<html>
  <head>
    <title>Client-Side Input Validation</title>
    <style>
		label{
      width :240px;
      display : inline-block;
    }
    
	</style>
  </head>
  <body>
    <h1>A. Student Details</h1>
    <form action="serverside.php" method="POST">
    <label for="name">Name (Legal/Official) : </label>
            <input type="text" name="name" id="name"  required>
            <br><br>
  
            <label for="matric">Matric No : </label>
            <input type="text" name="matric" id="matric" required>
            <br><br>

            <label for="caddress">Current Address : </label>
            <textarea id="caddress" name="caddress"></textarea>
            <br><br>

            <label for="haddress">Home Address : </label>
            <textarea id="haddress" name="haddress"></textarea>
            <br><br>

            <label for="email">Email (Gmail Account) : </label>
            <input type="email" name="email" id="email" required>
            <br><br>

            <label for="phone">Mobile Phone No : </label>
		        <input type="tel" id="phone" name="phone" required>
            <br><br>

            <label for="hphone">Home Phone No(Emergency) : </label>
		        <input type="tel" id="hphone" name="hphone" required>
            <br><br>
            <button type="submit" onclick="validateForm()">Submit</button>
    </form>
    
  

    <script src="validateform.js"></script>
  </body>
</html>
