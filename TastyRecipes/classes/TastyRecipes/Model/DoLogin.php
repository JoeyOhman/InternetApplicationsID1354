<?php

namespace TastyRecipes\Model;

use TastyRecipes\Integration\DatabaseManager;

class DoLogin {
    
    private $databaseManager;
    
    public function __construct() {
        $this->databaseManager = DatabaseManager::getDatabaseManager();
    }
    
    public function loginUser($username, $password) {
        $user = $this->databaseManager->getUser($username, $password);
        
        if(empty($user->getUsername()) || empty($user->getPassword()) || ! password_verify($password, $user->getPassword())) {
            /*echo "username: " . $user->getUsername();
            echo "<br>pw: " . $password;
            echo "<br>dbPw: " . $user->getPassword();
             */
            throw new UserException("Login failed!", UserException::INCORRECT_USERNAME_OR_PASSWORD);
        }
        
        return $user->getUsername();
    }
}
