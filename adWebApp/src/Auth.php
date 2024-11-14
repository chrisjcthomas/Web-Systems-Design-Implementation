<?php
// src/Auth.php

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class Auth {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function login($username, $password) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch();

        if ($user && hash_equals($user['password'], hash('sha256', $password))) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['otp_verified'] = false;
            $_SESSION['otp'] = rand(100000, 999999); // OTP for 2FA

            return true;
        }
        return false;
    }

    public function verifyOTP($otp) {
        if (isset($_SESSION['otp']) && $_SESSION['otp'] == $otp) {
            $_SESSION['otp_verified'] = true;
            unset($_SESSION['otp']); // Clear OTP after verification
            return true;
        }
        return false;
    }

    public function getRedirectUrl() {
        switch ($_SESSION['role']) {
            case 'DBA':
                return 'dba_dashboard.php';
            case 'SecurityManager':
                return 'security_manager_dashboard.php';
            case 'ContractManager':
                return 'contract_manager_dashboard.php';
            default:
                return 'dashboard.php';
        }
    }

    public function logout() {
        session_unset();
        session_destroy();
    }
}
?>
