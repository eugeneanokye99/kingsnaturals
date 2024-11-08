class AppConfig {
  constructor(encryptionKey, iv) {
    this.encryptionKey = CryptoJS.enc.Utf8.parse(encryptionKey); // 32 chars
    this.iv = CryptoJS.enc.Utf8.parse(iv); // 16 chars
    this.user_id = this.getCookie('uid');
  }

  // Helper method to get the cookie value for the given key.
  getCookie(cname) {
    let name = cname + "=";
    let ca = document.cookie.split(';');
    for (let i = 0; i < ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) === ' ') c = c.substring(1);
      if (c.indexOf(name) === 0) return c.substring(name.length, c.length);
    }
    return "";
  }

  // Method to get query parameter by name
  getParameterByName(name, url = window.location.href) {
    name = name.replace(/[\[\]]/g, '\\$&');
    let regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
  }

  // Encrypt function in JavaScript
  encryptData(data) {
    const encrypted = CryptoJS.AES.encrypt(data, this.encryptionKey, { iv: this.iv, mode: CryptoJS.mode.CBC });
    return encrypted.toString();  // Encrypted string
  }

  // Decrypt function in JavaScript
  decryptData(encryptedData) {
    const decrypted = CryptoJS.AES.decrypt(encryptedData, this.encryptionKey, { iv: this.iv, mode: CryptoJS.mode.CBC });
    return decrypted.toString(CryptoJS.enc.Utf8); // Decrypted data as UTF-8 string
  }

  // Start tracking location
  startTrackingLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.watchPosition(
        (position) => {
          const { latitude, longitude } = position.coords;
          console.log(`Latitude: ${latitude}, Longitude: ${longitude}`);
          
          // Send the location to the server
          this.sendLocationToServer(latitude, longitude);
        },
        (error) => {
          console.error("Error obtaining location: ", error);
        },
        {
          enableHighAccuracy: true,
          timeout: 10000,
          maximumAge: 0
        }
      );
    } else {
      console.error("Geolocation is not supported by this browser.");
    }
  }

  // Send location to the server
  sendLocationToServer(latitude, longitude) {
    fetch('../includes/request.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: `action=userRequest&userRequest=update_location&userId=${encodeURIComponent(this.user_id)}&longitude=${encodeURIComponent(longitude)}&latitude=${encodeURIComponent(latitude)}`
    })
    .then(response => response.json())
    .then(data => {
      console.log('Location data sent successfully:', data);
    })
    .catch((error) => {
      console.error('Error sending location data:', error);
    });
  }

  // Display a toast message
  showPopUp(message, color) {
    Toastify({
      text: message,
      duration: 3000,
      destination: "https://github.com/apvarun/toastify-js",
      newWindow: true,
      close: true,
      gravity: "top", // `top` or `bottom`
      position: "center", // `left`, `center` or `right`
      stopOnFocus: true, // Prevents dismissing of toast on hover
      style: {
        background: `linear-gradient(to right, ${color}, ${color})`,
      },
      onClick: function(){} // Callback after click
    }).showToast();
  }
}

