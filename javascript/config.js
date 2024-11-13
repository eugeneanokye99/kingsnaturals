import AppRequests from "./requests.js";

export default class AppConfig {
  constructor(encryptionKey, iv) {
    this.encryptionKey = CryptoJS.enc.Utf8.parse(encryptionKey);
    this.iv = CryptoJS.enc.Utf8.parse(iv);
    this.user_id = this.getCookie("uid");
    let ipAddress = "172.20.10.4";
    let localhostUrl = `http://localhost/kingsnaturals/includes/requests.php`;
    let networkUrl = `http://${ipAddress}/kingsnaturals/includes/requests.php`;

    this.apiUrl =
      window.location.hostname === "localhost" ? localhostUrl : networkUrl;
  }

  static isSafari() {
    return /^((?!chrome|android).)*safari/i.test(navigator.userAgent);
  }

  static isChrome() {
    return /chrome|chromium|crios/i.test(navigator.userAgent) && !this.isEdge();
  }

  static isFirefox() {
    return /firefox|fxios/i.test(navigator.userAgent);
  }

  static isEdge() {
    return /edg/i.test(navigator.userAgent);
  }

  static isOpera() {
    return /opera|opr/i.test(navigator.userAgent);
  }

  // Device detection functions
  static isAndroid() {
    return /android/i.test(navigator.userAgent);
  }

  static isIOS() {
    return /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
  }

  static isMobile() {
    return /Mobi|Android/i.test(navigator.userAgent);
  }

  static isTablet() {
    return /iPad|tablet|kindle|silk|playbook/i.test(navigator.userAgent);
  }

  static isDesktop() {
    return !this.isMobile() && !this.isTablet();
  }

  // Screen size detection functions
  static isSmallScreen() {
    return window.innerWidth <= 640;
  }

  static isMediumScreen() {
    return window.innerWidth > 640 && window.innerWidth <= 1024;
  }

  static isLargeScreen() {
    return window.innerWidth > 1024;
  }

  getCookie(cname) {
    const name = cname + "=";
    const ca = document.cookie.split(";");
    for (let c of ca) {
      c = c.trim();
      if (c.indexOf(name) === 0) return c.substring(name.length, c.length);
    }
    return "";
  }

  getParameterByName(name, url = window.location.href) {
    const regex = new RegExp(`[?&]${name}(=([^&#]*)|&|#|$)`);
    const results = regex.exec(url);
    if (!results) return null;
    return decodeURIComponent(results[2].replace(/\+/g, " "));
  }

  encryptData(data) {
    return CryptoJS.AES.encrypt(data, this.encryptionKey, {
      iv: this.iv,
      mode: CryptoJS.mode.CBC,
    }).toString();
  }

  decryptData(encryptedData) {
    return CryptoJS.AES.decrypt(encryptedData, this.encryptionKey, {
      iv: this.iv,
      mode: CryptoJS.mode.CBC,
    }).toString(CryptoJS.enc.Utf8);
  }

  showPopUp(message, color) {
    Toastify({
      text: message,
      duration: 3000,
      close: true,
      gravity: "top",
      position: "center",
      style: { background: color },
    }).showToast();
  }

  validateInput(
    pattern,
    inputValue,
    errorElement,
    errorMessage,
    validStyle = "#34F458",
    invalidStyle = "#F90A0A"
  ) {
    if (pattern.test(inputValue.value) && inputValue.value !== "") {
      errorElement.style.display = "none";
      inputValue.style.borderBottom = `2px solid ${validStyle}`;
      return true;
    } else {
      errorElement.innerText = errorMessage;
      errorElement.style.display = "block";
      inputValue.style.borderBottom = `2px solid ${invalidStyle}`;
      return false;
    }
  }

  startTrackingLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.watchPosition(
        (position) => {
          const { latitude, longitude } = position.coords;
          console.log(`Latitude: ${latitude}, Longitude: ${longitude}`);

          // Send the location to the server or process it as needed
          const requests = new AppRequests(this);
          requests.sendLocationToServer(this.user_id, latitude, longitude);
        },
        (error) => {
          console.error("Error obtaining location: ", error);
        },
        {
          enableHighAccuracy: true,
          timeout: 10000,
          maximumAge: 0,
        }
      );
    } else {
      console.error("Geolocation is not supported by this browser.");
    }
  }
}
