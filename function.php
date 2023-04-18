<?php

include("connection.php");
function check_login($conn)
{
    if(isset($_SESSION['username']))
    {
        $id = $_SESSION['username'];
        $query = "select * from users where username = 'username' limit 1";
    
        $result = mysqli_query($conn, $query);
        if($result && mysqli_num_rows($result)> 0 )
        {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }

    //redirect to login
    header("Location: login.php");
    die;
   
}

function getUserRole($username){

    $conn = mysqli_connect('localhost','username','password','authentication');
    //to prevent sql injection
    $username = mysqli_real_escape_string($conn,$username);
    //retrieve user's role from database
    $result = mysqli_query($conn, "select role from users where username = '$username'");

    // Check if the query was successful
    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the role from the result set
        $row = mysqli_fetch_assoc($result);
        $role = $row['role'];

        // Close the database connection
        mysqli_close($conn);

        return $role;
    } 
   
    

}




?>