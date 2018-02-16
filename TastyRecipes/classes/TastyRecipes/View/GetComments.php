<?php

namespace TastyRecipes\View;

use Id1354fw\View\AbstractRequestHandler;

class GetComments extends AbstractRequestHandler{
    
    private $recipe;
    
    public function setRecipe($recipe) {
        $this->recipe = $recipe;
    } 
    
    protected function doExecute() {
        require("setupControllerUser.php");
        
        $value = $controller->getComments($this->recipe);
        $this->addVariable('data', $value);
        return "jsonHandler";
    }

}
