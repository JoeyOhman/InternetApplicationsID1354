<?php

namespace TastyRecipes\Model;

class UserException extends \Exception {

    const PASSWORD_MISMATCH = 1;
    const USERNAME_TAKEN = 2;
    const DB_INSERTION_ERROR = 3;
    const INCORRECT_USERNAME_OR_PASSWORD = 4;
    const COMMENT_DELETION_UNAUTHORIZED = 5;

}
