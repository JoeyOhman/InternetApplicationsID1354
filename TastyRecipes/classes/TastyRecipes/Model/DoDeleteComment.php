<?php
namespace TastyRecipes\Model;

use TastyRecipes\Integration\DatabaseManager;

class DoDeleteComment {
    
    private $databaseManager;
    
    public function __construct() {
        $this->databaseManager = DatabaseManager::getDatabaseManager();
    }
    
    public function deleteComment($id, $usernameDeleting) {
        if(! $this->validateUsernameAsAuthor($id, $usernameDeleting)) {
            throw new UserException("Comment $id being deleted by other username than author.", UserException::COMMENT_DELETION_UNAUTHORIZED);
        }
        
        $this->databaseManager->deleteComment($id);
    }
    
    private function validateUsernameAsAuthor($id, $usernameDeleting) {
        $usernameAuthor = $this->databaseManager->getUsernameByComment($id);
        return $usernameAuthor == $usernameDeleting;
    }
}
