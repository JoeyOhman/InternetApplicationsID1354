<!DOCTYPE html>
<html>
    <head>
        <title>Register | Tasty Recipes</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php require_once("resources/include/cssfavicon.php"); ?>
    </head>
    <body>
        <nav>
            <?php
            $page = 'register.php';
            require_once('resources/include/topnavigation.php');
            ?>
        </nav>

        <header>
            <h1>Register</h1>
        </header>

        <div class="row">
            <div class="column left">
                <h2>Register</h2>

                <form id="registerForm" action="Register" method="post">
                    <div>
                        <label>Username</label>
                        <input type="text" placeholder="username" name="username" required autofocus>
                    </div>
                    <div>
                        <label>Password</label>
                        <input type="password" placeholder="password" name="password" required>
                    </div>
                    <div>
                        <label>Confirm Password</label>
                        <input type="password" placeholder="password" name="passwordConfirm" required>
                    </div>
                    <div>
                        <input type="submit" value="Register">
                    </div>
                </form>

                <?php 
                echo isset($error) ?$error : "";?>

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
