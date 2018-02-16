<?php

namespace TastyRecipes\View;

use Id1354fw\View\AbstractRequestHandler;

class GetUsername extends AbstractRequestHandler {
    
    protected function doExecute() {
        require("setupControllerUser.php");
        
        $value = $controller->getUsername();
        $this->addVariable('data', $value);
        return "jsonHandler";
    }

}
