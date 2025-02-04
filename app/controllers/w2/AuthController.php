<?php
namespace app\controllers\w2;

use app\models\w2\UserModel;
use PDO;
use Flight;

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
        $email = $data->email;
        $password = $data->password;

        try {
            $result = $this->userModel->authenticateUser($email, $password);

            if ($result['status'] === 'success') {
                // Session is started at bootstrap.php
                $_SESSION['user'] = $result['user'];
                $_SESSION['loading'] = true;
                
                $data = [
                    'success' => true,
                ];

                echo json_encode($data);
            } else {
                $data = ['success' => false, 'message' => "Invalid email or password."]; // Message is not the one from the model, because it's more convenient to do this
                echo json_encode($data);
            }
        } catch (\Exception $e) {
            Flight::render('error', ['message' => "AuthController->userLogin(): " . $e->getMessage()]); // error is the first file in view/
        }
    }

    public function signUp() {
        $data = Flight::request()->data;
        $username = $data->username;
        $real_name = $data->real_name;
        $email = $data->email;
        $pwd = $data->pwd;
        $numero = $data->numero;

        try {
            // Add user
            $result = $this->userModel->addUser($username, $real_name, $email, $pwd, $numero);

            if ($result['status'] === 'success') {
                $data = ['success' => true, 'message' => 'User created'];
                echo json_encode($data);
            } else {
                $data = ['success' => false, 'message' => $result['message']];
                echo json_encode($data);
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