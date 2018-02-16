<?php

namespace TastyRecipes\View;

use Id1354fw\View\AbstractRequestHandler;


class Meatballs extends AbstractRequestHandler {
    
    protected function doExecute() {
        require("setupControllerUser.php");
        
        $this->addVariable('recipe', 'Meatballs');
        return 'meatballs';
    }

}
