import AppConfig from './config.js';
import AppRequests from './requests.js';

const encryptionKey = "12345678901234567890123456789012";
const iv = "1234567890123456";

const config = new AppConfig(encryptionKey, iv);
const request = new AppRequests(config);

document.addEventListener("DOMContentLoaded", () => {

    const registrationForm = document.getElementById("registration-form");
    const loginForm        = document.getElementById("login-form");
    const verification     = document.getElementById("verifyForm")
    const regname          = document.getElementById("name");
    const regusername      = document.getElementById("username");
    const regemail         = document.getElementById("email");
    const regphone         = document.getElementById("phone");
    const regpass          = document.getElementById("password");
    const logemail         = document.getElementById("logemail");
    const logpass          = document.getElementById("logpassword");
    const name_error       = document.getElementById("name_error_message");
    const uname_error      = document.getElementById("username_error_message");
    const email_error      = document.getElementById("email_error_message");
    const phone_error      = document.getElementById("phone_error_message");
    const pass_error       = document.getElementById("password_error_message");
    const lemail_error     = document.getElementById("logemail_error_message");
    const lpass_error      = document.getElementById("logpassword_error_message");
    const emailPattern     = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    const passwordPattern  = /.{6,}/;
    const namePattern      = /^[a-zA-Z\s]*$/;
    const usernamePattern  = /^[a-zA-Z0-9_.-]+$/;
    const phonePattern     = /^[0-9]*$/;

    // Handle registration form submission
    if (registrationForm) {
        registrationForm.addEventListener("submit", async (event) => {
            event.preventDefault();

            const isNameValid    = config.validateInput(namePattern, regname, name_error, "Please enter a valid email address");
            const isUsernameValid = config.validateInput(usernamePattern, regusername, uname_error, "Password must be at least 6 characters");
            const isPhoneValid = config.validateInput(phonePattern, regphone, phone_error, "Password must be at least 6 characters");
            const isEmailValid    = config.validateInput(emailPattern, regemail, email_error, "Please enter a valid email address");
            const isPasswordValid = config.validateInput(passwordPattern, regpass, pass_error, "Password must be at least 6 characters");



            // Get input values
            var fullname      = config.encryptData(regname.value);
            var username      = config.encryptData(regusername.value);
            var email_address = config.encryptData(regemail.value);
            var phone         = config.encryptData(regphone.value);
            var pass          = config.encryptData(regpass.value);
            var width         = screen.width;
            var height        = screen.height;

            // Create user data object
            const userData = { fullname, username, email_address, phone, pass, width, height };

            try {
                // Send data to server
                const response = await request.registerUser(userData);
                if (response === "User already exists") {
                    config.showPopUp("User already exists", "red");
                  } else if (response === "Registration failed") {
                    config.showPopUp("Registration failed", "red");
                  } else if (response === "Registration successful") {
                    config.showPopUp("Registration successful", "green");
                    setTimeout(() => {
                        window.location.href = "../index.php";
                    }, 1500);
                  }
           
            } catch (error) {
                console.error("Registration error:", error);
            }
        });
    }

    // Handle login form submission
    if (loginForm) {
        loginForm.addEventListener("submit", async (event) => {
            event.preventDefault();

            // Validate inputs
            const isEmailValid    = config.validateInput(emailPattern, logemail, lemail_error, "Please enter a valid email address");
            const isPasswordValid = config.validateInput(passwordPattern, logpass, lpass_error, "Password must be at least 6 characters");

            if (!isEmailValid || !isPasswordValid) {
                config.showPopUp("Validation failed!", "red");
                return;
            }

            // Get input values
            var emailAddress = config.encryptData(logemail.value);
            var pass         = config.encryptData(logpass.value);

            // Create login data object
            const loginData = { emailAddress, pass };

            try {
                // Send data to server
                const response = await request.loginUser(loginData);
                if (response.message === "Please verify your identity. A 2FA code has been sent to your email") {
                    config.showPopUp("Please verify your identity. A 2FA code has been sent to your email", "red");
                    setTimeout(() => {
                        window.location.href = "verify.php";
                    }, 1500);
                } else if (response.message === "2FA code could not be sent") {
                    showPopUp("2FA code could not be sent, check your internet connection", "red");
                } else if (response.message === "Invalid credentials") {
                     config.showPopUp("Invalid credentials, please try again", "red");
                } else if (response.message === "Login successful") {
                    config.showPopUp("Login successful", "green");
                    setTimeout(() => {
                        window.location.href = "../index.php";
                    }, 1500);
                }
            } catch (error) {
                console.error("Login error:", error);
            }
        });
    }


    if(verification){
        verification.addEventListener("submit", async (event) => {
            event.preventDefault();

            let code = '';
            for (let i = 1; i <= 6; i++) {
                code += document.getElementById('box' + i).value;
            }
            if (code.length === 6) {
              var verification_code = encryptData(code);
                
              const verificationData = { verification_code };

              try {
                  // Send data to server
                  const response = await request.verifyUser(verificationData);
                  if (response.message === "2FA verification successful") {
                      config.showPopUp("2FA verification successful, Login again", "red");
                      setTimeout(() => {
                        window.location.href = "register.php";
                    }, 1500);
                  } else if (response.message === "Invalid 2FA code") {
                      showPopUp("Invalid 2FA code", "red");
                  } 
              } catch (error) {
                  console.error("Verification error:", error);
              }
     
            } else {
                showPopUp("Please complete the verification code.", "red");
            }
        });
    }
});
