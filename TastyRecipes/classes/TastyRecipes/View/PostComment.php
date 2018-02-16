<?php

namespace TastyRecipes\View;

use Id1354fw\View\AbstractRequestHandler;
use TastyRecipes\Util\Constants;

class PostComment extends AbstractRequestHandler{
    
    private $recipe, $message;
    
    public function setRecipe($recipe) {
        $this->recipe = $recipe;
    }
    
    public function setMessage($message) {
        $this->message = $message;
    }
    
    protected function doExecute() {
        require("setupControllerUser.php");
        
        if(empty($this->recipe) || empty($this->message) || empty($controller->getUsername())) {
            $this->addVariable('error', "Could not post comment!");
            return 'index';
        }
        
        $controller->postComment($this->recipe, $this->message);
        
        $this->session->set(Constants::CONTR_KEY_NAME, $controller);
        
        return "jsonHandler";
    }

}
