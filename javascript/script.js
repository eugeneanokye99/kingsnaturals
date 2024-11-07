


  if (regForm) {
    name_error.style.display     = "none";
    uname_error.style.display    = "none";
    email_error.style.display    = "none";
    pass_error.style.display     = "none";
    phone_error.style.display    = "none";

    var error_name      = false;
    var error_username  = false;
    var error_email     = false;
    var error_phone     = false;
    var error_password  = false;

    regname.addEventListener("focusout", check_name);
    regusername.addEventListener("focusout", check_username);
    regemail.addEventListener("focusout", check_email);
    regphone.addEventListener("focusout", check_phone);
    regpass.addEventListener("focusout", check_password);

    function check_name() {
      var pattern = /^[a-zA-Z\s]*$/;
      var name = regname.value;
      if (pattern.test(name) && name !== "") {
        name_error.style.display = "none";
        regname.style.borderBottom = "2px solid #34F458";
      } else {
        name_error.innerHTML = "Should contain only Characters";
        name_error.style.display = "block";
        regname.style.borderBottom = "2px solid #F90A0A";
        error_name = true;
      }
    }

    function check_username() {
      var pattern = /^[a-zA-Z0-9_.-]+$/;
      var username = regusername.value;
      
      if (pattern.test(username) && username !== "") {
        uname_error.style.display = "none";
        regusername.style.borderBottom = "2px solid #34F458";
      } else {
        uname_error.innerHTML = "Username should contain only letters, numbers, underscores, hyphens, or dots";
        uname_error.style.display = "block";
        regusername.style.borderBottom = "2px solid #F90A0A";
        error_username = true;
      }
    }
    
      
    function check_phone() {
      var pattern = /^[0-9]*$/;
      var phone = regphone.value;

      if (pattern.test(phone) && phone !== '') {
        phone_error.style.display = "none";
        regphone.style.borderBottom = "2px solid #34F458";
      } else {
        phone_error.innerHTML = "Should contain only numbers";
        phone_error.style.display = "block";
        regphone.style.borderBottom = "2px solid #F90A0A";
        error_phone = true;
      }
    }

    function check_email() {
      var pattern =
        /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
      var Email = regemail.value;
      if (pattern.test(Email) && Email !== "") {
        email_error.style.display = "none";
        regemail.style.borderBottom = "2px solid #34F458";
      } else {
        email_error.innerHTML = "Incorrect email format";
        email_error.style.display = "block";
        regemail.style.borderBottom = "2px solid #F90A0A";
        error_email = true;
      }
    }

    function check_password() {
      var password_length = regpass.value.length;
      if (password_length < 8) {
        pass_error.innerHTML = "Should contain at least 8 Characters";
        pass_error.style.display = "block";
        error_password = true;
        regpass.style.borderBottom = "2px solid #F90A0A";
      } else {
        pass_error.style.display = "none";
        regpass.style.borderBottom = "2px solid #34F458";
      }
    }

    function check_confirm_password() {
      var password = regpass.value;
      var confirm_password = confirm_password.value;
      if (password !== confirm_password) {
         document.getElementById('confirm_password_error_message').innerHTML = 'Passwords Did not Match';
         document.getElementById('confirm_password_error_message').style.display = 'block';
         confirm_password.style.borderBottom = '2px solid #F90A0A';
         error_confirm_password = true;
      } else {
         document.getElementById('confirm_password_error_message').style.display = 'none';
         confirm_password.style.borderBottom = '2px solid #34F458';
      }
   }

    regForm.addEventListener("submit", function (e) {
      e.preventDefault();

      error_name = error_username = error_email = error_password = error_phone = false;


      check_name();
      check_username();
      check_email();
      check_phone();
      check_password();

      if (!error_name && !error_username && !error_email && !error_password && !error_phone) {
        var fullname      = encryptData(regname.value);
        var username      = encryptData(regusername.value);
        var email_address = encryptData(regemail.value);
        var phone         = encryptData(regphone.value);
        var pass          = encryptData(regpass.value);
        var width         = screen.width;
        var height        = screen.height;


        document.querySelector(".loader").style.display = "inline-block";
        document.querySelector(".btn").style.display = "none";

        // Using Fetch API for AJAX request
        fetch("../includes/requests.php", {
          method: "POST",
          headers: { "Content-Type": "application/x-www-form-urlencoded" },
          body: `action=userRequest&userRequest=sign_up&name=${encodeURIComponent(
            fullname
          )}&username=${encodeURIComponent(username)}&phone=${encodeURIComponent(phone)}&email=${encodeURIComponent(
            email_address
          )}&pass=${encodeURIComponent(pass)}&width=${encodeURIComponent(width)}&height=${encodeURIComponent(height)}`,
        })
          .then((response) => response.json())
          .then((res) => {
            if (res === "User already exists") {
              showPopUp("User already exists", "red");
            } else if (res === "Registration failed") {
              showPopUp("Registration failed", "red");
            } else if (res === "Registration successful") {
              showPopUp("Registration successful", "green");
              window.location.href = "../index.php";
            }
          })
          .catch((error) => console.error("Error:", error));
      } else {
        showPopUp("Please fill the form correctly", "red");
      }
    });
  }

  if (loginForm) {
    lemail_error.style.display = "none";
    lpass_error.style.display = "none";

    var error_email = false;
    var error_password = false;

    logemail.addEventListener("focusout", check_email);
    logpassword.addEventListener("focusout", check_password);

    function check_email() {
      var pattern =
        /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
      var Email = logemail.value;
      if (pattern.test(Email) && Email !== "") {
        lemail_error.style.display = "none";
        logemail.style.borderBottom = "2px solid #34F458";
      } else {
        lemail_error.innerHTML = "Incorrect email format";
        lemail_error.style.display = "block";
        logemail.style.borderBottom = "2px solid #F90A0A";
        error_email = true;
      }
    }

    function check_password() {
      var password_length = logpass.value.length;
      if (password_length < 8) {
        lpass_error.innerHTML = "Should contain at least 8 Characters";
        lpass_error.style.display = "block";
        logpass.style.borderBottom = "2px solid #F90A0A";
        error_password = true;
      } else {
        lpass_error.style.display = "none";
        logpass.style.borderBottom = "2px solid #34F458";
      }
    }
    loginForm.addEventListener("submit", function (e) {
      e.preventDefault();
      startTrackingLocation(user_id);

      error_email = error_password = false;


      check_email();
      check_password();

      if (!error_email && !error_password) {
        var emailAddress = encryptData(logemail.value);
        var pass         = encryptData(logpass.value);

        document.querySelector(".loader").style.display = "inline-block";
        document.querySelector(".btn").style.display = "none";

        fetch("../includes/requests.php", {
          method: "POST",
          headers: { "Content-Type": "application/x-www-form-urlencoded" },
          body: `action=userRequest&userRequest=login&email=${encodeURIComponent(
            emailAddress
          )}&pass=${encodeURIComponent(pass)}`,
        })
          .then((response) => response.json())
          .then((res) => {
            if (res.message === "Please verify your identity. A 2FA code has been sent to your email") {
              showPopUp("Please verify your identity. A 2FA code has been sent to your email", "red");
            } else if (res.message === "Invalid credentials") {
                showPopUp("Invalid credentials, please try again", "red");
              } else if (res.message === "Login successful") {
                showPopUp("Login successful", "green");
                window.location.href = "../index.php";
              }
          })
          .catch((error) => console.error("Error:", error));
      } else {
        showPopUp("Please fill the form correctly", "red");
      }

    });
  }