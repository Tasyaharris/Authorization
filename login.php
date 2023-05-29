<?php
session_start();

    include("connection.php");
    include("function.php");

    //$user_data = check_login($con);
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //posted something
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(!empty($username) && !empty($password) && !is_numeric($username))
        {
            //read from database
            

            $query = "select * from users where username = '$username' limit 1 ";
            $result = mysqli_query($conn, $query);
            
            if($result){
                if($result && mysqli_num_rows($result)>0)
                {
                    $user_data = mysqli_fetch_assoc($result);
                    
                    if($user_data['password'] === $password)
                    {
                        $_SESSION['id'] = $user_data['id'];
                        header("Location: index.php");
                        die;
                    }else{
                        echo "WRONG USERNAME OR PASSWORD";
                    }
                }
            }
             

        // Get the user's role from the database (assuming you have a user table with a role column)
        $role = getUserRole($_POST['username']);

        // Check the user's role and allow or restrict access accordingly
        if ($role == 'Guest') {
        // Restrict access to the student details page
         header("Location: login.php");
        exit();
        } elseif ($role == 'User') {
        // Allow access to the student details page
        // But restrict access to the edit and delete buttons for other users' data
        //if ($_GET['id'] != $_SESSION['id']) {
        //echo "You are not authorized to edit or delete other users' data.";
        header("Location: form.php");
        exit();
        }elseif ($role == 'Admin') {
            header("Location: admin_page.php");
            exit();
            // Allow accessto tstudent details page
            // Allow access to the edit and delete buttons for all users' data
            }
    } }
        else
        {
            echo "WRONG USERNAME OR PASSWORD";
        }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>

    <form method="POST" action="">
        <div style="font-size: 20px; margin:10px;">Login</div>
        
        <label for="">Username</label>
        <input type="text" name="username"  required>
        <br><br>
        <label for="">Password</label>
        <input type="password" name="password" required>
        <br><br>

        <input type="submit" value="Login">
        <br><br>

        <a href="signup.php"> Click Here to Signup </a> 
        <br><br>



    </form>

</body>
</html>
