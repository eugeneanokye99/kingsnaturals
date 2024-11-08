// request.js
import { AppConfig } from './config.js';

export class AppRequests {
  constructor(config) {
    this.config = config;
  }

  // Method to send user registration data to the server
  async registerUser(userData) {
    const body = JSON.stringify({
      action: 'userRequest',
      userRequest: 'register',
      ...userData,
    });

    try {
      const response = await fetch(`${this.config.apiUrl}/register`, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body,
      });
      const data = await response.json();
      console.log('User registration response:', data);
      return data;
    } catch (error) {
      console.error('Error registering user:', error);
      throw error;
    }
  }

  // Method to send user login data to the server
  async loginUser(loginData) {
    const body = JSON.stringify({
      action: 'userRequest',
      userRequest: 'login',
      ...loginData,
    });

    try {
      const response = await fetch(`${this.config.apiUrl}/login`, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body,
      });
      const data = await response.json();
      console.log('User login response:', data);
      return data;
    } catch (error) {
      console.error('Error logging in user:', error);
      throw error;
    }
  }

  // Example method for sending location data
  async sendLocationToServer(latitude, longitude) {
    const body = JSON.stringify({
      action: 'userRequest',
      userRequest: 'update_location',
      userId: this.config.userId,
      longitude,
      latitude,
    });

    try {
      const response = await fetch(`${this.config.apiUrl}/request.php`, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body,
      });
      const data = await response.json();
      console.log('Location data sent successfully:', data);
      return data;
    } catch (error) {
      console.error('Error sending location data:', error);
      throw error;
    }
  }
}
