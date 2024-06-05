<?php
$login=0;
$invalid=0;

if($_SERVER['REQUEST_METHOD']=='POST'){
  include 'connect.php';
  $username=$_POST['username'];
  $password=$_POST['password'];

  $sql="select * from `registration` where username='$username' and password='$password'";
  $res=mysqli_query($con,$sql);

  if($res){
    $num=mysqli_num_rows($res);
    if($num>0){
        $login=1;
        session_start();
        $_SESSION['username']=$username;
        header('location:home.php');

    }else{
        // $invalid=1;
        echo "login failed";
    }
    
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
        }

        .container {
            background-color: #fff;
            padding: 40px 30px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
        }

        .signup-form {
            display: flex;
            flex-direction: column;
        }

        .signup-form h2 {
            margin-bottom: 20px;
            text-align: center;
            color: #333;
            font-size: 28px;
            position: relative;
        }

        .signup-form h2::after {
            content: '';
            width: 50px;
            height: 3px;
            background-color: #3498db;
            display: block;
            margin: 10px auto 0;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-group label {
            margin-bottom: 8px;
            display: block;
            color: #555;
            font-size: 14px;
        }

        .form-group input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .form-group input:focus {
            border-color: #3498db;
            box-shadow: 0 0 8px rgba(52, 152, 219, 0.2);
        }

        button {
            padding: 12px 20px;
            background: linear-gradient(135deg, #3498db, #2980b9);
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background: linear-gradient(135deg, #2980b9, #3498db);
        }

        /* Responsive design */
        @media (max-width: 600px) {
            .container {
                padding: 30px 20px;
            }
            
            .signup-form h2 {
                font-size: 24px;
            }

            .form-group input {
                font-size: 14px;
            }

            button {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>


    <div class="container">
        <form class="signup-form" action="login.php" method="POST">
            <h2>LOGIN TO APPLICATION</h2>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" >
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" >
            </div>
            <button type="submit">LOGIN</button>
        </form>
    </div>
</body>
</html>