// config.js
export default class AppConfig {
  constructor(encryptionKey, iv) {
      this.encryptionKey = CryptoJS.enc.Utf8.parse(encryptionKey);
      this.iv = CryptoJS.enc.Utf8.parse(iv);
      this.user_id = this.getCookie('uid');
  }

  getCookie(cname) {
      const name = cname + "=";
      const ca = document.cookie.split(';');
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
      return decodeURIComponent(results[2].replace(/\+/g, ' '));
  }

  encryptData(data) {
      return CryptoJS.AES.encrypt(data, this.encryptionKey, { iv: this.iv, mode: CryptoJS.mode.CBC }).toString();
  }

  decryptData(encryptedData) {
      return CryptoJS.AES.decrypt(encryptedData, this.encryptionKey, { iv: this.iv, mode: CryptoJS.mode.CBC }).toString(CryptoJS.enc.Utf8);
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

  validateInput(pattern, inputValue, errorElement, errorMessage, validStyle = "#34F458", invalidStyle = "#F90A0A") {
      if (pattern.test(inputValue) && inputValue !== "") {
          errorElement.style.display = "none";
          inputValue.style.borderBottom = `2px solid ${validStyle}`;
      } else {
          errorElement.innerText = errorMessage;
          errorElement.style.display = "block";
          inputValue.style.borderBottom = `2px solid ${invalidStyle}`;
      }
  }
}
