<?php
require_once 'Database.php';

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
    
    public function fetchUserDetails($username) {
        $query = "SELECT * FROM Users WHERE username = :username";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':username', $username);
        $statement->execute();
        return $statement->fetch();
    }
    
    public function login($username, $password) {
        $query = "SELECT * FROM Users WHERE username = :username";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':username', $username);
        $statement->execute();
        $result = $statement->fetch();

        if ($result) {
            $encryptedPassword = $result['password'];

            if (password_verify($password, $encryptedPassword)) {
                $_SESSION['message'] = '<p class="success">Login successful.</p>';
                $_SESSION['user'] = $username;
                $_SESSION['user_id'] = $result['id'];  
                if ($result['Rol'] == 1) {
                    $_SESSION['role'] = 'admin'; // Store the role as admin
                    $role = 'admin';
                } else {
                    $_SESSION['role'] = 'user'; // Store the role as user
                    $role = 'user';
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
    
    public function register($username, $email, $password, $telefoonnmr) {
        try {
            // Check if the username already exists in users table
            $usernameQueryUsers = "SELECT COUNT(*) FROM Users WHERE username = :username";
            $usernameStatementUsers = $this->pdo->prepare($usernameQueryUsers);
            $usernameStatementUsers->bindParam(':username', $username);
            $usernameStatementUsers->execute();
            $usernameCountUsers = $usernameStatementUsers->fetchColumn();

            // Check if the email already exists in users table
            $emailQueryUsers = "SELECT COUNT(*) FROM Users WHERE email = :email";
            $emailStatementUsers = $this->pdo->prepare($emailQueryUsers);
            $emailStatementUsers->bindParam(':email', $email);
            $emailStatementUsers->execute();
            $emailCountUsers = $emailStatementUsers->fetchColumn();

            if ($usernameCountUsers > 0) {
                $_SESSION['message'] = '<p class="error">Gebruikersnaam bestaat al. Gebruik een andere gebruikersnaam.</p>';
            } elseif ($emailCountUsers > 0) {
                $_SESSION['message'] = '<p class="error">Email-adres bestaat al. Gebruik een ander email-adres.</p>';
            } else {
                // Encrypt the password
                $opties = [
                    'cost' => 13,
                ];
                $EncryptedPassword = password_hash($password, PASSWORD_BCRYPT, $opties);

                $query = "INSERT INTO Users (username, email, password, telnmr, Rol) 
                          VALUES (:username, :email, :password, :telefoonnmr, 0)";
                $statement = $this->pdo->prepare($query);
                $statement->bindParam(':username', $username);
                $statement->bindParam(':email', $email);
                $statement->bindParam(':password', $EncryptedPassword);
                $statement->bindParam(':telefoonnmr', $telefoonnmr);

                if ($statement->execute()) {
                    $_SESSION['message'] = '<p class="success">Registratie succesvol. U kunt nu inloggen.</p>';
                    header('Location: login.php');
                    exit();
                } else {
                    $_SESSION['message'] = '<p class="error">Er is een fout opgetreden. Probeer het opnieuw.</p>';
                }
            }
        } catch (PDOException $e) {
            $_SESSION['message'] = '<p class="error">Er is een fout opgetreden: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . '</p>';
        }
    }

    public static function logout() {
        session_unset();
        session_destroy();
        header('Location: login.php');
    }

}