<?php

namespace TastyRecipes\View;

use Id1354fw\View\AbstractRequestHandler;


class Pancakes extends AbstractRequestHandler {
    
    protected function doExecute() {
        require("setupControllerUser.php");
        
        $this->addVariable('recipe', 'Pancakes');
        return 'pancakes';
    }

}
