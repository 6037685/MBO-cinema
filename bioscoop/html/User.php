<?php
require_once 'database/Database.php';

class User extends Database {
    protected $username;
    protected $email;
    protected $role;


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
    public function login($username, $password) {
        $query = "SELECT * FROM Users WHERE username = :username";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':username', $username);
        $statement->execute();
        $result = $statement->fetch();

        if ($result) {
            $encryptedPassword = $result['password'];
            $role = $result['Rol'];

            if (password_verify($password, $encryptedPassword)) {
                $_SESSION['message'] = '<p class="success">Login successful.</p>';
                $_SESSION['user'] = $username;    
                if ($role == 1) {
                    $_SESSION['role'] = 'admin'; // Store the role as admin
                } else {
                    $_SESSION['role'] = 'user'; // Store the role as user
                }
                header('Location: home.php');
                exit(); 
            } else {
                $_SESSION['message'] = '<p class="error">Incorrect username/password.</p>';
            }
        } else {
            $_SESSION['message'] = '<p class="error">Incorrect username/password.</p>';
        }
    }

    public static function logout() {
        unset($_SESSION['user']);
        session_destroy();
        header('Location: login.php');
    }
}

?>