<?php

use TastyRecipes\Util\Constants;
use TastyREcipes\Controller\Controller;

// Fixed recovery from manual delete of cookie
if (filter_input(INPUT_COOKIE, 'PHPSESSID') == null) {
    $this->session->restart();
}

// Create controller if there are not one already
if ($this->session->get(Constants::CONTR_KEY_NAME) == null) {
    $this->session->restart();
    $this->session->set(Constants::CONTR_KEY_NAME, new Controller());
}

// Set local variable for controller
$controller = $this->session->get(Constants::CONTR_KEY_NAME);

// Add username variable to view
if (!empty($controller->getUsername())) {
    $this->addVariable(Constants::USERNAME_KEY_NAME, $controller->getUsername());
}