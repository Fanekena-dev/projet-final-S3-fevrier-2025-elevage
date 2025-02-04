<?php
namespace app\models\w2;

use Flight;
use PDO;

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
    public function authenticateUser($username, $password) {
        // Checking if the user already exist at first place
        $query = "SELECT * FROM breeding_user WHERE username = ? LIMIT 1";
        $STH = $this->db->prepare($query);
        $STH->execute([$username]);

        $user = $STH->fetch(PDO::FETCH_ASSOC); // Fetch we only need: one row
        if(!$user) 
            return ['status' => 'error', 'message'=> 'User not found', 'user' => null];

        if ($user['password'] !== $password) 
            return ['status' => 'error', 'message' => 'Invalid password', 'user' => null];

        return ['status' => 'success', 'message' => 'User found successfully', 'user' => $user];
    }

    public function addUser($username, $password) {
        // Check if that user already exist
        $query = "SELECT * FROM breeding_user WHERE username = ? LIMIT 1";
        $STH = $this->db->prepare($query);
        $STH->execute([$username]);
        
        if ($STH->fetch(PDO::FETCH_ASSOC)) 
            return ['status' => 'error', 'message' => 'Username already exists'];

        // Insert 
        $query = "INSERT INTO breeding_user (username, password) VALUES (?, ?)"; // role is by default client
        $STH = $this->db->prepare($query);

        if ($STH->execute([$username, $password])) 
            return ['status' => 'success', 'message' => 'New user registered'];

        return ['status' => 'error', 'message' => 'Failed to register user'];
    }

    public function removeUser($username, $password) {
        $query = "SELECT * FROM breeding_user WHERE username = ? LIMIT 1";
        $STH = $this->db->prepare($query);
        $STH->execute([$username]);
        
        if (!$STH->fetch(PDO::FETCH_ASSOC)) 
            return ['status' => 'success', 'message' => 'Username removed'];
        
        return ['status' => 'error', 'message' => 'User doesn\'t exist'];
    }
}