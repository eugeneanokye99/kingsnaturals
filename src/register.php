<?php
    if (isset($_COOKIE['uid'])) {
        header("Location: ../index.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../metatags.php"; ?>
    <link rel="stylesheet" href="../styles/register.css">
</head>

<body>
    <!---------------------- NAVBAR ------------------------------>
    <?php include "../navbar.php"; ?>

    <!-------------------- ACCOUNT PAGE -------------------------->
    <div class="account-page">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <img src="<?php echo LOGO_IMAGE; ?>" alt="image" width="100%">
                </div>

                <div class="col-2">
                    <div class="form-container">
                        <div class="form-btn">
                            <span onclick="login()">Login</span>
                            <span onclick="register()">Register</span>
                            <hr id="indicator">
                        </div>

                        <form id="login-form">
                            <div class="input-group">
                                    <input type="email" id="logemail" name="logemail" placeholder="Email" required>
                                    <div id="logemail_error_message" style="color: red; display: none;"></div>
                                </div>
                                <div class="input-group">
                                    <input type="password" id="logpassword" name="logpassword" placeholder="Password" required>
                                    <div id="logpassword_error_message" style="color: red; display: none;"></div>
                                </div>
                            <button type="submit" class="btn">Login</button>
                            <div class="loader"></div>
                            <a href="" class="fp">Forgot Password</a>
                        </form>

                        <form id="registration-form">
                            <div class="input-group">
                                <input type="text" id="name" name="name" placeholder="Full Name" required>
                                <div id="name_error_message" style="color: red; display: none;"></div>
                            </div>
                            <div class="input-group">
                                <input type="text" id="username" name="username" placeholder="Username" required>
                                <div id="username_error_message" style="color: red; display: none;"></div>
                            </div>
                            <div class="input-group">
                                <input type="email" id="email" name="email" placeholder="Email" required>
                                <div id="email_error_message" style="color: red; display: none;"></div>
                            </div>
                            <div class="input-group">
                                <input type="tel" id="phone" name="phone" placeholder="Phone Number" required>
                                <div id="phone_error_message" style="color: red; display: none;"></div>
                            </div>
                            <div class="input-group">
                                <input type="password" id="password" name="password" placeholder="Password" required>
                                <div id="password_error_message" style="color: red; display: none;"></div>
                            </div>
                            <div class="input-group">
                                <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
                                <div id="confirm_password_error_message" style="color: red; display: none;"></div>
                            </div>
                            <button type="submit" class="btn">Register</button>
                            <div class="loader"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <!---------------------- FOOTER ------------------------------>
    <?php include "../footer.php"; ?>

    <div class="copyright">
        <p>copyright &copy; 2024 All rights reserved</p>
    </div>


    <?php include "includes/js_files.php"; ?>
</body>

</html>