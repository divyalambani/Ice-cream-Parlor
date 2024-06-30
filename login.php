<?php
require('config.php');
?>
<?php
session_start();

$username = "divya";
$password = "divya13";
$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['username'];
    $pass = $_POST['password'];

    if ($name == $username && $pass == $password) {
        $_SESSION['loggedin'] = true;
      
        header('Location:admin.php');
        exit;
    } else {
        $error = "Invalid login credentials.";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
 

  <section class="login-section">
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Page</title>
        
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #fc2d5a;
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
            background-image:url("images/header-1.png");
                align-items: center;
                height: 100vh;
            }
            
            .login-container {
                background-color: #f2f2f2;;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
              
            }
            
            .login-container h2 {
                text-align: center;
                margin-bottom: 20px;
            }
            
            .login-form input[type="text"],
            .login-form input[type="password"] {
                width: 100%;
                padding: 10px;
                margin-bottom: 15px;
                border: 1px solid #ccc;
                border-radius: 4px;
            }
            
            .login-form input[type="submit"] {
                width: 100%;
                background-color: #fc2d5a;
                color: #fff;
                padding: 10px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }
            
            .login-form input[type="submit"]:hover {
  background-color: #fc2d5a;
                
            }
        </style>
    </head>
    <body>
        <div class="login-container">
            <h2>Admin Login</h2>
            <form class="login-form"  method="post">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="submit" value="Login">
            </form>
        </div>
    </body>
    </html>
    
  </section>

<!---- <footer>
    <p>&copy; 2024 Ice Cream Parlor. All rights reserved.</p>
  </footer>-->
</body>
</html>
