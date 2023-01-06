<!-- 
    Logging users in.
    This checks the information in the 
    database to see if the username and password combination entered into the form 
    is correct.
-->
<?php
// Start the session
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <link rel="stylesheet" href="css/indexStyle.css"> -->
    <!-- <link rel="stylesheet" href="css/signinStyles.css"> -->
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
                    <h1 class="login__title">Login to Database</h1>

                    <div class="login__box">
                        <input type="text" placeholder="Username" class="login__input" name="username"
                            pattern="[a-zA-Z0-9]+" required>
                    </div>

                    <div class="login__box">
                        <input type="password" placeholder="Password" class="login__input" name="password" required>
                    </div>

                    <button class="login__button login__button--block" type="submit" name="login" value="login">Log
                        In</button>
                    <?php
                        include('Config.php');
                        if (isset($_POST['login'])) {
                            $username = $_POST['username'];
                            $password = $_POST['password'];
                            $query = $connection->prepare("SELECT * FROM Users WHERE username=:username");
                            $query->bindParam("username", $username, PDO::PARAM_STR);
                            $query->execute();
                            $result = $query->fetch(PDO::FETCH_ASSOC);
                            if (!$result) {
                                echo '<p class="error">Username and password combination is wrong!</p>';
                            } else {
                                if ($password == $result['password']) {
                                    $_SESSION['role'] = $result['role'];
                                    echo '<p class="success">Congratulations, you are logged in!</p>';
                                    if ($_SESSION['role'] == 'admin') {
                                        header("Location: roles/admin.php");
                                    }
                                    if ($_SESSION['role'] == 'doctor') {
                                        header("Location: roles/doctor.php");
                                    }
                                    if ($_SESSION['role'] == 'patient') {
                                        header("Location: roles/patient.php");
                                    }
                                } else {
                                    echo '<p class="error">Username and password combination is wrong!</p>';
                                }
                            }
                        }
                        ?>
                </form>
            </div>
</body>

</html>