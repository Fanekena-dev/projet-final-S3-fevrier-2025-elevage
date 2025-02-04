<?php
namespace app\models\w2;

use Flight;
use PDO;
use app\models\w3;

class userModel {
    protected $db;
    protected $table_name;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    /**
     * ---------------------------
     * Authentication 
     * ---------------------------
     */
    public function authenticateUser($email, $pwd) {
        // Checking if the user already exist at first place
        $query = "SELECT * FROM breeding_user WHERE email = ? LIMIT 1";
        $STH = $this->db->prepare($query);
        $STH->execute([$email]);

        $user = $STH->fetch(PDO::FETCH_ASSOC); // Fetch we only need: one row
        if(!$user) 
            return ['status' => 'error', 'message'=> 'User not found', 'user' => null];

        if ($user['pwd'] !== $pwd) 
            return ['status' => 'error', 'message' => 'Invalid pwd', 'user' => null];

        return ['status' => 'success', 'message' => 'User found successfully', 'user' => $user];
    }

    public function addUser($username, $real_name, $email, $pwd, $numero) {
        // Check if that user already exist
        $query = "SELECT * FROM breeding_user WHERE email = ? LIMIT 1";
        $STH = $this->db->prepare($query);
        $STH->execute([$email]);
        
        if ($STH->fetch(PDO::FETCH_ASSOC)) 
            return ['status' => 'error', 'message' => 'email already exists'];
        
        $userDAO = new w3\GenericDAOModel(Flight::mysql(), "user_", "breeding_user", "user_id");

        $data = [
            'username' => "$username",
            'real_name' => "$real_name",
            'pwd' => "$email",
            'email' => "$pwd",
            'numero' => "$numero"
        ];

        // Insert the new user
        try {
            $userDAO->insert($data);
            return ['status' => 'success', 'message' => 'New user registered'];
        } catch (\Exception $e) {
            return ['status' => 'error', 'message' => 'Failed to register user: ' . $e];
        }
    }

    public function removeUser($email, $pwd) {
        $query = "SELECT * FROM breeding_user WHERE email = ? LIMIT 1";
        $STH = $this->db->prepare($query);
        $STH->execute([$email]);
        
        if (!$STH->fetch(PDO::FETCH_ASSOC)) 
            return ['status' => 'success', 'message' => 'email removed'];
        
        return ['status' => 'error', 'message' => 'User doesn\'t exist'];
    }
}