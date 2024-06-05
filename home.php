<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home page</title>

    <style>
        .welcome{
            text-align: center;
            size: 30px;
            color:red;
            margin-top: 20px;
            border: 5px;
            
        }
        .logout{
            background-color: blue;
            color: white;
            size: 3px;
            border: none;
            border-radius: 2px;
            width: 5px;
            margin: 10px 10px;
            padding: 10px 10px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h1 class="welcome"> WELCOME
        <?php echo $_SESSION['username']; ?>
    </h1>

    <div class="container">
        <a href="logout.php" class="logout">Logout</a>
    </div>
</body>
</html>