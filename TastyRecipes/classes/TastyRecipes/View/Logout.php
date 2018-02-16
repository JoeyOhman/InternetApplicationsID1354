<?php

namespace TastyRecipes\View;

use Id1354fw\View\AbstractRequestHandler;
use TastyRecipes\Controller\Controller;
use TastyRecipes\Util\Constants;

class Logout extends AbstractRequestHandler {
    
    protected function doExecute() {
        $this->session->invalidate();
        $this->session->restart();
        $this->session->set(Constants::CONTR_KEY_NAME, new Controller());
        
        return 'index';
    }

}
