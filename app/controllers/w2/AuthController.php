<?php
namespace app\controllers\w2;

use Flight;
use app\models\w2\UserModel;
use PDO;

class AuthController {
    protected $userModel;
    public function __construct() { 
        $this->userModel = new UserModel(Flight::mysql());
    }

    //////////////////////////////
    /// Page rendering methods
    //////////////////////////////
    public function renderUserSignIn() {
        $data = [
            'title' => 'User sign in',
            'page' => 'userSignin'
        ];
        Flight::render('auth/template', $data);
    }
    
    public function renderUserSignUp() {
        $data = [
            'title' => 'User sign up',
            'page' => 'userSignup'
        ];
        Flight::render('auth/template', $data);
    }

    //////////////////////////////
    /// Real authentication methods
    //////////////////////////////

    // User goes to dashboard page
    public function signIn() {
        $data = Flight::request()->data;
        $username = $data->username;
        $password = $data->password;

        try {
            $result = $this->userModel->authenticateUser($username, $password);

            if ($result['status'] === 'success') {
                // Session is started at bootstrap.php
                $_SESSION['user'] = $result['user'];
                $_SESSION['loading'] = true;
                Flight::redirect('/main');
            } else {
                $data = ['page' => 'user', 'message' => "Invalid username or password."]; // Message is not the one from the model, because it's more convenient to do this
                Flight::render('auth/userSignin', $data);
            }
        } catch (\Exception $e) {
            Flight::render('error', ['message' => "AuthController->userLogin(): " . $e->getMessage()]); // error is the first file in view/
        }
    }

    public function signUp() {
        $data = Flight::request()->data;

        $username = $data->username;
        $password = $data->password;
        $confirm_password = $data->confirm_password;

        try {
            // Password validation 
            if ($password !== $confirm_password) {
                $data = ['page' => 'register', 'message' => 'Passwords do not match.'];
                Flight::render('auth/userSignup', $data);
                return;
            }

            // Add user
            $result = $this->userModel->addUser($username, $password);

            if ($result['status'] === 'success') {
                $data = ['page' => 'user', 'message' => 'User created.'];
                Flight::render('auth/template', $data);
            } else {
                $data = ['page' => 'register', 'message' => $result['message']];
                Flight::render('auth/template', $data);
            }
        } catch (\Exception $e) {
            Flight::render('error', ['message' => "AuthController->register(): " . $e-> getMessage()]);
        }
    }

    public function logout() {
        session_destroy();
        Flight::redirect('/');
    }
}