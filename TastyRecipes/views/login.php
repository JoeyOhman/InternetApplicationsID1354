<?php
//require("include/header.php");
//$_SESSION['pageBeforeLogin'] = filter_input(INPUT_SERVER, 'HTTP_REFERER');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Log in | Tasty Recipes</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php require_once("resources/include/cssfavicon.php"); ?>
    </head>
    <body>
        <nav>
            <?php
            $page = 'login.php';
            require_once('resources/include/topnavigation.php');
            ?>
        </nav>

        <header>
            <h1>Log in</h1>
        </header>

        <div class="row">
            <div class="column left">
                <h2>Log in!</h2>

                <form id="loginForm" action="Login" method="post">
                    <div>
                        <label>Username</label>
                        <input type="text" placeholder="username" name="username" required autofocus>
                    </div>
                    <div>
                        <label>Password</label>
                        <input type="password" placeholder="password" name="password" required>
                    </div>
                    <div>
                        <input type="submit" value="Log in">
                    </div>
                </form>
                <?php
                echo isset($error) ? $error : "";
                ?>
            </div>

            <div class="column right">
                <?php require_once("resources/include/promotionImages.html"); ?>
            </div>

        </div>

        <footer>
            Email us: contact@tastyrecipes.com
        </footer>
    </body>
</html>
