<?php
class AuthController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = new User();
            $email = $_POST['email'];
            $password = $_POST['password'];
            $foundUser = $user->findByEmail($email);
            if ($foundUser && password_verify($password, $foundUser['password'])) {
                $_SESSION['user_id'] = $foundUser['id'];
                header('Location: /posts');
                exit;
            } else {
                $error = 'Invalid credentials';
            }
        }
        include 'app/views/login.php';
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = new User();
            $data = [
                'username' => $_POST['username'],
                'email' => $_POST['email'],
                'password' => $_POST['password']
            ];
            $user->create($data);
            header('Location: /login');
            exit;
        }
        include 'app/views/register.php';
    }

    public function logout() {
        session_destroy();
        header('Location: /');
    }
}