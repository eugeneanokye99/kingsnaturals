// App.js
import { AppConfig } from './config.js';
import { AppRequests } from './request.js';

// Initial setup
const encryptionKey = "12345678901234567890123456789012";
const iv = "1234567890123456";
const config = new AppConfig(encryptionKey, iv);
const requests = new AppRequests(config);

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

// Button actions
cartBtn.addEventListener("click", () => {
  window.location.href = "cart.php";
});

heartBtn.addEventListener("click", () => {
  window.location.href = "favorites.php";
});

// Swiper configurations
function initSwipers() {
  new Swiper(".home-swiper", {
    spaceBetween: 30,
    centeredSlides: true,
    autoplay: { delay: 4500, disableOnInteraction: false },
    navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },
  });

  new Swiper(".shop-swiper", {
    slidesPerView: 1,
    spaceBetween: 10,
    autoplay: { delay: 4500, disableOnInteraction: false },
    breakpoints: {
      640: { slidesPerView: 2, spaceBetween: 20 },
      924: { slidesPerView: 3, spaceBetween: 40 },
      1200: { slidesPerView: 4, spaceBetween: 40 },
    },
  });

  new Swiper(".testimonial-swiper", {
    spaceBetween: 30,
    centeredSlides: true,
    autoplay: { delay: 4500, disableOnInteraction: false },
    pagination: { el: ".swiper-pagination", clickable: true },
    navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },
  });
}

// Initialize app components
initSwipers();

// Check if login and registration form exist for display transitions
const loginForm = document.getElementById("login-form");
const regForm = document.getElementById("registration-form");
const indicator = document.getElementById("indicator");

if (regForm && loginForm) {
  const showRegister = () => {
    regForm.style.transform = "translateX(0px)";
    loginForm.style.transform = "translateX(0px)";
    indicator.style.transform = "translateX(100px)";
  };

  const showLogin = () => {
    regForm.style.transform = "translateX(300px)";
    loginForm.style.transform = "translateX(300px)";
    indicator.style.transform = "translateX(0px)";
  };

  document.querySelector("#registerBtn").addEventListener("click", showRegister);
  document.querySelector("#loginBtn").addEventListener("click", showLogin);
}

// Initiate location tracking
config.startTrackingLocation();
