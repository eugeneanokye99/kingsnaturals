//Variable initialization
const homepage      = document.getElementById("homepage");
const menuBtn       = document.querySelector(".lnr-menu");
const navList       = document.querySelector(".navlist");
const cartBtn       = document.querySelector(".lnr-cart");
const heartBtn      = document.querySelector(".lnr-heart");
const loginForm     = document.getElementById("login-form");
const regForm       = document.getElementById("registration-form");
const indicator     = document.getElementById("indicator");
const regname       = document.getElementById("name");
const regusername   = document.getElementById("username");
const regemail      = document.getElementById("email");
const regphone      = document.getElementById("phone");
const regpass       = document.getElementById("password");
const logemail      = document.getElementById("logemail");
const logpass       = document.getElementById("logpassword");
const name_error    = document.getElementById("name_error_message");
const uname_error   = document.getElementById("username_error_message");
const email_error   = document.getElementById("email_error_message");
const phone_error   = document.getElementById("phone_error_message");
const pass_error    = document.getElementById("password_error_message");
const lemail_error  = document.getElementById("logemail_error_message");
const lpass_error   = document.getElementById("logpassword_error_message");
const verification  = document.getElementById("verifyForm");




// NAVLIST
menuBtn.addEventListener("click", () => {
  menuBtn.classList.toggle("lnr-chevron-up");
  navList.classList.toggle("active");
});

cartBtn.addEventListener("click", function(){
  window.location.href = "cart.php"
});

heartBtn.addEventListener("click", function(){
  window.location.href = "favorites.php"
});


if (homepage != null){


 //HOME 
  var swiper = new Swiper(".home-swiper", {
    spaceBetween: 30,
    centeredSlides: true,
    autoplay: {
      delay: 4500,
      disableOnInteraction: false,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });



  //SHOP 
  var swiper = new Swiper(".shop-swiper", {
    slidesPerView: 1,
    spaceBetween: 10,
    autoplay: {
      delay: 4500,
      disableOnInteraction: false,
    },
    breakpoints: {
      640: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      924: {
        slidesPerView: 3,
        spaceBetween: 40,
      },
      1200: {
        slidesPerView: 4,
        spaceBetween: 40,
      },
    },
  });




  //TESTIMONIALS 
  var swiper = new Swiper(".testimonial-swiper", {
  spaceBetween: 30,
  centeredSlides: true,
  autoplay: {
    delay: 4500,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  });









  //SCROLL REVEAL 
  const sr = ScrollReveal({
  distance: '60px',
  duration: 2500,
  delay: 400,
  reset: false,
  });

  sr.reveal('.about-container .left', { delay: 200, origin: 'left'});
  sr.reveal('.services-container', { delay: 200, origin: 'top'});
  sr.reveal('.experts-container', { delay: 200, origin: 'top'});
  sr.reveal('.blog-container', { delay: 200, origin: 'left'});
  sr.reveal('.contact-container .left', { delay: 200, origin: 'bottom'});
  sr.reveal('.contact-container .right', { delay: 200, origin: 'top'});
  sr.reveal('.footer-container .right', { delay: 200, origin: 'top'});

}



/// Registration and Login screen

if(regForm || loginForm){
  function register() {
    regForm.style.transform = "translateX(0px)";
    loginForm.style.transform = "translateX(0px)";
    indicator.style.transform = "translateX(100px)";
  }

  function login() {
    regForm.style.transform = "translateX(300px)";
    loginForm.style.transform = "translateX(300px)";
    indicator.style.transform = "translateX(0px)";
  }

  if(window.innerWidth < 768){
    function register() {
      regForm.style.transform   = "translateX(0px)";
      loginForm.style.transform = "translateX(0px)";
      indicator.style.transform = "translateX(180px)";
    }
  
    function login() {
      regForm.style.transform   = "translateX(380px)";
      loginForm.style.transform = "translateX(380px)";
      indicator.style.transform = "translateX(30px)";
    }
  }


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
              window.location.href = "verify.php";
            } else if (res.message === "2FA code could not be sent") {
              showPopUp("2FA code could not be sent, check your internet connection", "red");
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
}








if(verification){
  // Function to move to the next input box
  function moveToNext(current, nextId) {
    if (current.value.length === 1 && nextId) {
        document.getElementById(nextId).focus();
    }
  }

  function submitCode() {
      let code = '';
      for (let i = 1; i <= 6; i++) {
          code += document.getElementById('box' + i).value;
      }
      if (code.length === 6) {
        var verification_code = encryptData(code);
          
        fetch("../includes/requests.php", {
          method: "POST",
          headers: { "Content-Type": "application/x-www-form-urlencoded" },
          body: `action=userRequest&userRequest=verify&code=${encodeURIComponent(verification_code)}`,
        })
          .then((response) => response.json())
          .then((res) => {
            if (res.message === "Please verify your identity. A 2FA code has been sent to your email") {
              showPopUp("Please verify your identity. A 2FA code has been sent to your email", "red");
              window.location.href = "verify.php";
            } else if (res.message === "2FA code could not be sent") {
              showPopUp("2FA code could not be sent, check your internet connection", "red");
            } else if (res.message === "Invalid credentials") {
                showPopUp("Invalid credentials, please try again", "red");
              } else if (res.message === "Login successful") {
                showPopUp("Login successful", "green");
                window.location.href = "../index.php";
              }
          })
          .catch((error) => console.error("Error:", error));
      } else {
          showPopUp("Please complete the verification code.", "red");
      }
  }
}