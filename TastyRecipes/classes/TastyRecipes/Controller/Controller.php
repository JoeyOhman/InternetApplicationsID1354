<?php

namespace TastyRecipes\Controller;
use TastyRecipes\Integration\DatabaseManager;
use TastyRecipes\Model\DoRegister;
use TastyRecipes\Model\DoLogin;
use TastyRecipes\Model\DoDeleteComment;

class Controller {

    private $username, $databaseManager;
    
    private $doRegister, $doLogin, $doDeleteComment;
    
    public function __construct() {
        $this->doRegister = new DoRegister();
        $this->doLogin = new DoLogin();
        $this->doDeleteComment = new DoDeleteComment();
        $this->databaseManager = DatabaseManager::getDatabaseManager();
    }

    public function doRegister($username, $password, $passwordConfirm) {
        $this->username = $this->doRegister->registerUser($username, $password, $passwordConfirm);
    }

    public function doLogin($username, $password) {
        $this->username = $this->doLogin->loginUser($username, $password);
    }

    public function getComments($recipe) {
        return $this->databaseManager->getCommentsByRecipe($recipe);
    }

    public function postComment($recipe, $message) {
        $this->databaseManager->insertComment($recipe, $this->username, $message);
    }

    public function deleteComment($id) {
        $this->doDeleteComment->deleteComment($id, $this->username);
    }
    
    public function getUsername() {
        return htmlentities($this->username, ENT_QUOTES);
    }
    
    public function setUsername($username) {
        $this->username = $username;
    }

}
