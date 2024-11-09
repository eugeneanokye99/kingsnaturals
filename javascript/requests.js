export default class AppRequests {
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
      const response = await fetch(`${this.config.apiUrl}`, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body,
      });
      const data = await response.json();
      return data;
    } catch (error) {
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
      const response = await fetch(`${this.config.apiUrl}`, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body,
      });
      const data = await response.json();
      return data;
    } catch (error) {
      throw error;
    }
  }

  // Method to send user varification data to the server
  async verifyUser(verificationData) {
    const body = JSON.stringify({
      action: 'userRequest',
      userRequest: 'verify',
      ...verificationData,
    });

    try {
      const response = await fetch(`${this.config.apiUrl}`, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body,
      });
      const data = await response.json();
      return data;
    } catch (error) {
      throw error;
    }
  }

  async sendCode(user_email) {
    const body = JSON.stringify({
      action: 'userRequest',
      userRequest: 'send2FA',
      ...user_email,
    });

    try {
      const response = await fetch(`${this.config.apiUrl}`, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body,
      });
      const data = await response.json();
      return data;
    } catch (error) {
      throw error;
    }
  }

  // method for sending location data
  async sendLocationToServer(latitude, longitude) {
    const body = JSON.stringify({
      action: 'userRequest',
      userRequest: 'update_location',
      userId: this.config.userId,
      longitude,
      latitude,
    });

    try {
      const response = await fetch(`${this.config.apiUrl}`, {
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
