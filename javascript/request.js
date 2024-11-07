//Variable initialization
const homepage       = document.getElementById("homepage");
const menuBtn        = document.querySelector(".lnr-menu");
const navList        = document.querySelector(".navlist");
const cartBtn        = document.querySelector(".lnr-cart");
const heartBtn       = document.querySelector(".lnr-heart");
const loginForm      = document.getElementById("login-form");
const regForm        = document.getElementById("registration-form");
const indicator      = document.getElementById("indicator");
const regname        = document.getElementById("name");
const regusername    = document.getElementById("username");
const regemail       = document.getElementById("email");
const regphone       = document.getElementById("phone");
const regpass        = document.getElementById("password");
const logemail       = document.getElementById("logemail");
const logpass        = document.getElementById("logpassword");
const name_error     = document.getElementById("name_error_message");
const uname_error    = document.getElementById("username_error_message");
const email_error    = document.getElementById("email_error_message");
const phone_error    = document.getElementById("phone_error_message");
const pass_error     = document.getElementById("password_error_message");
const lemail_error   = document.getElementById("logemail_error_message");
const lpass_error    = document.getElementById("logpassword_error_message");
const encryptionKey  = "12345678901234567890123456789012"; // 32 chars
const iv             = "1234567890123456"; // 16 chars















//Object Declaration
const config = new AppConfig(encryptionKey, iv);
















//Web page functionalities
if (homepage != null){
    // NAVLIST
    menuBtn.addEventListener("click", () => {
    menuBtn.classList.toggle("lnr-chevron-up");
    navList.classList.toggle("active");
    });

    cartBtn.addEventListener("click", function () {
    window.location.href = "cart.php";
    });

    heartBtn.addEventListener("click", function () {
    window.location.href = "favorites.php";
    });


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
}
