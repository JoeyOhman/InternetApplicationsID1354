<?php

namespace TastyRecipes\Integration;

use TastyRecipes\Util\UserDTO;
use TastyRecipes\Util\CommentDTO;

class DatabaseManager {

    private static $databaseManager;
    private $serverName = "localhost", $dbUser = "root", $dbPassword = "", $dbName = "tasty_recipes";
    private $dbConnection;

    private function __construct() {
        $this->dbConnection = new \mysqli($this->serverName, $this->dbUser, $this->dbPassword, $this->dbName);

        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
    }

    private function __clone() {
        
    }

    private function getDB() {
        if (!$this->dbConnection->ping()) {
            $this->dbConnection = new \mysqli($this->serverName, $this->dbUser, $this->dbPassword, $this->dbName);
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            error_reporting(E_ALL);
            ini_set('display_errors', 1);
            return $this->dbConnection;
        } else {
            return $this->dbConnection;
        }
    }

    public static function getDatabaseManager() {
        if (!isset(static::$databaseManager)) {
            static::$databaseManager = new DatabaseManager();
        }
        return static::$databaseManager;
    }

    public function getUsername($username) {
        $dbConnection = $this->getDB();
        $usernameEscaped = $dbConnection->real_escape_string($username);

        $query = "SELECT username FROM user WHERE username = '$usernameEscaped'";
        $result = $dbConnection->query($query);

        $row = $result->fetch_assoc();
        return $row['username'];
        //$checkStatement = $dbConnection->prepare($query);
        //$checkStatement->bind_param('s', $usernameEscaped);
        //$checkStatement->execute();
        //$checkStatement->store_result();
    }

    public function insertUser($username, $password) {
        $dbConnection = $this->getDB();
        $usernameEscaped = $dbConnection->real_escape_string($username);
        $passwordEscaped = $dbConnection->real_escape_string($password);

        $query = "INSERT INTO user VALUES ('$usernameEscaped', '$passwordEscaped')";
        return $dbConnection->query($query);
    }

    public function getUser($username) {
        $dbConnection = $this->getDB();
        $usernameEscaped = $dbConnection->real_escape_string($username);
        //$passwordEscaped = $dbConnection->real_escape_string($password);

        //$query = "SELECT * FROM user WHERE username='$usernameEscaped' AND password='$passwordEscaped'";
        $query = "SELECT * FROM user WHERE username='$usernameEscaped'";

        $result = $dbConnection->query($query);
        $row = $result->fetch_assoc();
        return new UserDTO($row['username'], $row['password']);
    }

    public function insertComment($recipe, $username, $message) {
        $dbConnection = $this->getDB();
        $recipeEscaped = $dbConnection->real_escape_string($recipe);
        $usernameEscaped = $dbConnection->real_escape_string($username);
        $messageEscaped = $dbConnection->real_escape_string($message);

        $query = "INSERT INTO comment (recipe, username, message) VALUES ('$recipeEscaped', '$usernameEscaped', '$messageEscaped')";
        return $dbConnection->query($query);
    }

    public function getCommentsByRecipe($recipe) {
        $dbConnection = $this->getDB();
        $recipeEscaped = $dbConnection->real_escape_string($recipe);
        $comments = array();

        $query = "SELECT id, username, message FROM comment WHERE recipe='$recipeEscaped'";
        $result = $dbConnection->query($query);

        while ($row = $result->fetch_assoc()) {
            $comments[] = new CommentDTO($row['id'], $row['username'], $row['message']);
        }
        
        return $comments;
    }
    
    public function getUsernameByComment($commentId) {
        $dbConnection = $this->getDB();
        $commentIdEscaped = $dbConnection->real_escape_string($commentId);
        
        $query = "SELECT username FROM comment WHERE id='$commentIdEscaped'";
        $result = $dbConnection->query($query);
        $row = $result->fetch_assoc();
        
        return $row['username'];
    }
    
    public function deleteComment($commentId) {
        $dbConnection = $this->getDB();
        $commentIdEscaped = $dbConnection->real_escape_string($commentId);
        
        $query = "DELETE FROM comment WHERE id=$commentIdEscaped";
        return $dbConnection->query($query);
    }

}
