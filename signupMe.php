<?php 
    session_start();

    if (isset($_SESSION['login'])) {
        echo '<script type="text/javascript">alert("Already Logged in.");</script>';
    } else {
        if (isset($_POST['signup'])) {
            require 'connect.php';
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $pass = $_POST['pass'];

            $checkQuery = "select userid from login where id='$email'";
            $checkResult = mysqli_query($conn, $checkQuery);

            if (!mysqli_num_rows($checkResult)) {
                $query = "INSERT INTO user (email, password, fname, lname) values ('$email', '$pass', '$fname', '$lname')";
                $result = mysqli_query($conn, $query);

                if (!$result) {
                    echo "Problem creating account.".mysqli_error($conn)."<br>Please contact to admin.";
                } elseif ($result) {
                    echo '<script type="text/javascript">alert("Account created successfully.");</script>';
                }
            } else {
                echo '<script type="text/javascript">alert("Please try any other email id this is already used.");</script>';
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign up</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="fname"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="fname" id="name" placeholder="First Name"/>
                            </div>
                            <div class="form-group">
                                <label for="lname"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="lname" id="name" placeholder="Last Name"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password"/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="loginMe.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>