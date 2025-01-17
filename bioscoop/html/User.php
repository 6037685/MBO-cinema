<?php
abstract class User {
    protected $username;
    protected $email;
    protected $role;

    public function __construct($username, $email, $role) {
        $this->username = $username;
        $this->email = $email;
        $this->role = $role;
    }

    // Getters and setters
    public function getUsername() {
        return $this->username;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getRole() {
        return $this->role;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public static function isLoggedIn() {
        return isset($_SESSION['user']);
    }

    public static function logout() {
        unset($_SESSION['user']);
        session_destroy();
    }
}

class RegularUser extends User {
    public function __construct($username, $email) {
        parent::__construct($username, $email, 'user');
    }
}

class AdminUser extends User {
    public function __construct($username, $email) {
        parent::__construct($username, $email, 'admin');
    }
}
?>