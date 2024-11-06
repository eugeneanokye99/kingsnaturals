const encryptionKey = CryptoJS.enc.Utf8.parse('12345678901234567890123456789012'); // 32 chars
const iv = CryptoJS.enc.Utf8.parse('1234567890123456'); // 16 chars


/**
 * Helper method to get the cookie value for the given key.
 *
 * @param cname
 */
function getCookie(cname) {
  var name = cname + "=";
  var ca = document.cookie.split(';');
  for (var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') c = c.substring(1);
    if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
  }
  return "";
}


let user_id = getCookie('uid');

  
  
  
function getParameterByName(name, url = window.location.href) {
  name = name.replace(/[\[\]]/g, '\\$&');
  var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
    results = regex.exec(url);
  if (!results) return null;
  if (!results[2]) return '';
  return decodeURIComponent(results[2].replace(/\+/g, ' '));
}



// Encrypt function in JavaScript
function encryptData(data) {
  const encrypted = CryptoJS.AES.encrypt(data, encryptionKey, { iv: iv, mode: CryptoJS.mode.CBC });
  return encrypted.toString();  // Encrypted string
}

// Decrypt function in JavaScript
function decryptData(encryptedData) {
  const decrypted = CryptoJS.AES.decrypt(encryptedData, encryptionKey, { iv: iv, mode: CryptoJS.mode.CBC });
  return decrypted.toString(CryptoJS.enc.Utf8); // Decrypted data as UTF-8 string
}



function startTrackingLocation(user_id) {
  if (navigator.geolocation) {
      navigator.geolocation.watchPosition(
          (position) => {
              const { latitude, longitude } = position.coords;
              console.log(`Latitude: ${latitude}, Longitude: ${longitude}`);
              
              // Send the location to the server or process it as needed
              sendLocationToServer(user_id, latitude, longitude);
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

function sendLocationToServer(user_id, latitude, longitude) {


  fetch('../includes/request.php', {
      method: 'POST',
      headers: {
          'Content-Type': 'application/json',
      },
      body: `action=userRequest&userRequest=update_location&userId=${encodeURIComponent(user_id)}&longitude=${encodeURIComponent(longitude)}&latitude=${encodeURIComponent(latitude)}`
  })
  .then(response => response.json())
  .then(data => {
      console.log('Location data sent successfully:', data);
  })
  .catch((error) => {
      console.error('Error sending location data:', error);
  });
}

// Start tracking when the page loads
// window.onload = startTrackingLocation;



function showPopUp(message, color){
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