
// UI elements and event listeners
const menuBtn = document.querySelector(".lnr-menu");
const navList = document.querySelector(".navlist");
const cartBtn = document.querySelector(".lnr-cart");
const heartBtn = document.querySelector(".lnr-heart");

// Navigation menu toggle
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





// Swiper configurations
function initSwipers() {
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

// Initialize app components
initSwipers();

// Check if login and registration form exist for display transitions
const loginForm = document.getElementById("login-form");
const regForm = document.getElementById("registration-form");
const indicator = document.getElementById("indicator");

if (regForm && loginForm) {
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



// Function to move to the next input box
function moveToNext(current, nextId) {
  if (current.value.length === 1 && nextId) {
      document.getElementById(nextId).focus();
  }
}