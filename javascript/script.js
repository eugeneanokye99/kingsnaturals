// script.js

import { registerUser, loginUser } from './request.js';
import { initializeUI } from './App.js';

document.addEventListener("DOMContentLoaded", () => {
    initializeUI();

    const registrationForm = document.getElementById("registration-form");
    const loginForm = document.getElementById("login-form");

    // Handle registration form submission
    if (registrationForm) {
        registrationForm.addEventListener("submit", async (event) => {
            event.preventDefault();

            // Get input values
            const username = document.getElementById("register-username").value;
            const email = document.getElementById("register-email").value;
            const password = document.getElementById("register-password").value;

            // Create user data object
            const userData = { username, email, password };

            try {
                // Send data to server
                const response = await registerUser(userData);
                if (response.success) {
                    console.log("Registration successful:", response);
                } else {
                    console.log("Registration failed:", response.message);
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

            // Get input values
            const email = document.getElementById("login-email").value;
            const password = document.getElementById("login-password").value;

            // Create login data object
            const loginData = { email, password };

            try {
                // Send data to server
                const response = await loginUser(loginData);
                if (response.success) {
                    console.log("Login successful:", response);
                } else {
                    console.log("Login failed:", response.message);
                }
            } catch (error) {
                console.error("Login error:", error);
            }
        });
    }
});
