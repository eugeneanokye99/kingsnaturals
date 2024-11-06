<?php
class Encrypt {
    private $encryptionKey;
    private $iv;
    
    private $userIdEncryptionKey;
    private $userIdIV;

    public function __construct() {
        // Generate main encryption key and IV for general data encryption
        $this->encryptionKey = bin2hex('12345678901234567890123456789012'); // 32 chars (256 bits)
        $this->iv = bin2hex('1234567890123456'); // 16 chars (128 bits)

        // Generate a separate key and IV for user ID encryption
        $this->userIdEncryptionKey = bin2hex(random_bytes(16)); // 32 chars (256 bits)
        $this->userIdIV = bin2hex(random_bytes(8)); // 16 chars (128 bits)
    }

    // General data encryption
    public function encryptData($data) {
        return openssl_encrypt($data, 'aes-256-cbc', hex2bin($this->encryptionKey), 0, hex2bin($this->iv));
    }
    
    // General data decryption
    public function decryptData($encryptedData) {
        return openssl_decrypt($encryptedData, 'aes-256-cbc', hex2bin($this->encryptionKey), 0, hex2bin($this->iv));
    }

    // User ID encryption
    public function encryptUserId($userId) {
        $encryptedId = openssl_encrypt($userId, 'aes-256-cfb', hex2bin($this->userIdEncryptionKey), 0, hex2bin($this->userIdIV));
        return base64_encode($encryptedId); // Encode for easier storage or transport
    }

    // User ID decryption
    public function decryptUserId($encryptedId) {
        $decodedId = base64_decode($encryptedId); // Decode before decrypting
        return openssl_decrypt($decodedId, 'aes-256-cfb', hex2bin($this->userIdEncryptionKey), 0, hex2bin($this->userIdIV));
    }

    // Getters for encryption keys and IVs (for testing or secure logging purposes)
    public function getEncryptionKey() {
        return $this->encryptionKey;
    }

    public function getIV() {
        return $this->iv;
    }

    public function getUserIdEncryptionKey() {
        return $this->userIdEncryptionKey;
    }

    public function getUserIdIV() {
        return $this->userIdIV;
    }
}
?>
