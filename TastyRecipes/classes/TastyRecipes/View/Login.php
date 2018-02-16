<?php

namespace TastyRecipes\View;

use Id1354fw\View\AbstractRequestHandler;
use TastyRecipes\Util\Constants;
use TastyRecipes\Model\UserException;

class Login extends AbstractRequestHandler {

    private $username, $password;

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    protected function doExecute() {
        $this->session->restart();
        require("setupControllerUser.php");

        // These being filled means we arrived here from the login form.
        if (!empty($this->username) && !empty($this->password)) {

            try {
                $controller->doLogin($this->username, $this->password);
                $this->addVariable(Constants::USERNAME_KEY_NAME, $controller->getUsername());
                $nextView = 'index';
            } catch (UserException $e) {
                $errorMessage = $this->handleException($e);
                $this->addVariable('error', $errorMessage);
                $nextView = 'login';
            }
        } else {
            // These are needed since "0" or 0 are interpreted as empty in the if statement.
            if (
                    $this->username === 0 || $this->username === "0" || 
                    $this->password === 0 || $this->password === "0") {
                
                $this->addVariable('error', "You can not use \"0\" as username or password.");
            }
            $nextView = 'login';
        }

        $this->session->set(Constants::CONTR_KEY_NAME, $controller);

        return $nextView;
    }

    private function handleException($exception) {
        $errorCode = $exception->getCode();
        if ($errorCode == UserException::INCORRECT_USERNAME_OR_PASSWORD) {
            $errorMessage = "Username or password incorrect!";
        }

        return $errorMessage;
    }

}
