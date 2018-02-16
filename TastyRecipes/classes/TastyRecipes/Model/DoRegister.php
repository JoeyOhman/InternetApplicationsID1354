<?php

namespace TastyRecipes\Model;

use TastyRecipes\Integration\DatabaseManager;

class DoRegister {
    
    private $databaseManager;
    
    public function __construct() {
        
        $this->databaseManager = DatabaseManager::getDatabaseManager();
        
    }
    
    public function registerUser($username, $password, $passwordConfirm) {
        
        if(! $this->validatePassword($password, $passwordConfirm)) {
            throw new UserException("Passwords not matching!", UserException::PASSWORD_MISMATCH);
        }
        
        if(! $this->checkUsernameAvailable($username)) {
            throw new UserException("Username already taken!", UserException::USERNAME_TAKEN);
        }
        
        //$xssSecureUsername = htmlentities($username, ENT_QUOTES);
        
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        
        $insertSuccess = $this->databaseManager->insertUser($username, $passwordHash);
        
        if(! $insertSuccess) {
            throw new UserException("Could not insert row into database.", UserException::DB_INSERTION_ERROR);
        }
        
        return $username;
    }
    
    private function validatePassword($pw1, $pw2) {
        if($pw1 === $pw2) {
            return true;
        } else {
            return false;
        }
    }
    
    // Returns true if no username was found
    private function checkUsernameAvailable($username) {
        if(empty($this->databaseManager->getUsername($username))) {
            return true;
        } else {
            return false;
        }
    }
    
}
