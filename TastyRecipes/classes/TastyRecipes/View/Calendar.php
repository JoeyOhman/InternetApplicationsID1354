<?php

namespace TastyRecipes\View;

use Id1354fw\View\AbstractRequestHandler;

class Calendar extends AbstractRequestHandler {
    
    protected function doExecute() {
        
        require("setupControllerUser.php");
        return 'calendar';
    }

}
