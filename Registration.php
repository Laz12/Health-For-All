<?php
// Start the session
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Form</title>
    <link rel="stylesheet" href="css/LogRegstyle.css">
    <title>Log In to Database</title>
</head>

<body>
    <div class="login">
        <div class="login__content">
            <div class="login__forms">
                <form method="post" action="" class="login__registre" id="login-in">
                    <h1 class="login__title">Register to Database</h1>

                    <div class="login__box">
                        <input type="text" placeholder="Username" class="login__input" name="username"
                            pattern="[a-zA-Z0-9]+" required>
                    </div>

                    <div class="login__box">
                        <input type="password" placeholder="Password" class="login__input" name="password" required>
                    </div>

                    <button class="login__button login__button--block" type="submit" name="register"
                        value="register">Register</button>
                    <?php
                    include('Config.php');
                    // The Post request method is a method that requests that the web server 
                    // accept the data passed in, ex: register to store
                    if (isset($_POST['register'])) {
                        $username = $_POST['username'];
                        $role = 'patient';
                        $password = $_POST['password'];
                        $query = $connection->prepare("SELECT * FROM Users WHERE username=:username");
                        $query->bindParam("username", $username, PDO::PARAM_STR);
                        $query->execute();
                        if ($query->rowCount() > 0) {
                            echo '<p class="error">This username is already registered!</p>';
                        }
                        if ($query->rowCount() == 0) {
                            $query = $connection->prepare("INSERT INTO Users(username,password,role) VALUES (:username,:password,:role)");
                            $query->bindParam("username", $username, PDO::PARAM_STR);
                            $query->bindParam("password", $password, PDO::PARAM_STR);
                            $query->bindParam("role", $role, PDO::PARAM_STR);
                            $result = $query->execute();
                            if ($result) {
                                header("Location: index.php");
                            } else {
                                echo '<p class="error">Something went wrong!</p>';
                            }
                        }
                    }
                    ?>
                </form>
            </div>
</body>

</html>