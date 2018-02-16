<?php

namespace TastyRecipes\View;

use Id1354fw\View\AbstractRequestHandler;

class DefaultRequestHandler extends AbstractRequestHandler {

    protected function doExecute() {
        header("Cache-Control: max-age=10, must-revalidate");
        header('Expires: '.gmdate('D, d M Y H:i:s \G\M\T', time() + 10));

        require("setupControllerUser.php");

        \header('Location: /TastyRecipes/TastyRecipes/View/FirstPage');
    }

}
