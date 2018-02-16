<?php

namespace TastyRecipes\View;

use Id1354fw\View\AbstractRequestHandler;
use TastyRecipes\Model\UserException;
use TastyRecipes\Util\Constants;

class DeleteComment extends AbstractRequestHandler {

    private $id;

    public function setId($id) {
        $this->id = $id;
    }

    protected function doExecute() {
        require("setupControllerUser.php");

        // Filter input
        if (!is_numeric($this->id)) {
            $this->addVariable('error', "Could not delete comment!");
            return 'index';
        } else {
            $this->id = (int) $this->id;
        }

        try {
            $controller->deleteComment($this->id);
        } catch (UserException $e) {
            $errorMessage = $this->handleException($e);
            $this->addVariable('error', $errorMessage);
        }

        $this->addVariable(Constants::USERNAME_KEY_NAME, $controller->getUsername());

        $this->session->set(Constants::CONTR_KEY_NAME, $controller);

        return "jsonHandler";
    }

    private function handleException($exception) {
        $errorCode = $exception->getCode();
        if ($errorCode == UserException::COMMENT_DELETION_UNAUTHORIZED) {
            $errorMessage = "You can only delete comments posted by you!";
        }

        return $errorMessage;
    }

}
