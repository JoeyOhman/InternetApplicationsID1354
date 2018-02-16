<?php

namespace TastyRecipes\View;

use Id1354fw\View\AbstractRequestHandler;
use TastyRecipes\Util\Constants;
use TastyRecipes\Model\UserException;

class Register extends AbstractRequestHandler {

    private $username, $password, $passwordConfirm;

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setPasswordConfirm($passwordConfirm) {
        $this->passwordConfirm = $passwordConfirm;
    }

    protected function doExecute() {
        $this->session->restart();
        require("setupControllerUser.php");
        
        // These being filled means we arrived here from the register form.
        if (!empty($this->username) && !empty($this->password) && !empty($this->passwordConfirm)) {

            try {
                $controller->doRegister($this->username, $this->password, $this->passwordConfirm);
                
                $nextView = 'index';
                $controller->setUsername($this->username);
                $this->addVariable(Constants::USERNAME_KEY_NAME, $controller->getUsername());
            } catch (UserException $e) {
                $errorMessage = $this->handleException($e);
                $this->addVariable('error', $errorMessage);
                $nextView = 'register';
            }
            
        } else {

            // These are needed since "0" or 0 are interpreted as empty in the if statement.
            if (
                    $this->username === 0 || $this->username === "0" || 
                    $this->password === 0 || $this->password === "0" ||
                    $this->passwordConfirm === 0 || $this->passwordConfirm === "0") {
                
                $this->addVariable('error', "You can not use \"0\" as username or password.");
            }
            
            $nextView = 'register';
        }

        $this->session->set(Constants::CONTR_KEY_NAME, $controller);
        return $nextView;
    }

    private function handleException($exception) {
        $errorCode = $exception->getCode();
        if ($errorCode == UserException::PASSWORD_MISMATCH) {
            $errorMessage = "Passwords not matching!";
        } else if ($errorCode == UserException::USERNAME_TAKEN) {
            $errorMessage = "Username $this->username already taken!";
        } else if($errorCode == UserException::DB_INSERTION_ERROR) {
            $errorMessage = "Could not register user, try again! If problem persists, contact web developer!";
        }
        
        return $errorMessage;
    }

}
