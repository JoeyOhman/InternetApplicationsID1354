<?php// require("include/header.php"); ?>
<!DOCTYPE html>

<html>
    <head>
        <title>Home | Tasty Recipes</title>
        <meta charset="UTF-8">
        <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
        <?php require_once("resources/include/cssfavicon.php"); ?>
    </head>
    <body>
        <nav>
            <?php $page = 'index.php'; require_once('resources/include/topnavigation.php'); ?>
        </nav>

        <header>
            <h1>Tasty Recipes</h1>
        </header>

        <div class="row">
            <div class="column left">
                <h2>Welcome to Tasty Recipes<?php echo isset($username) ? " " . $username : ""; ?>!</h2>
                <p>Here you can find recipes to the most delicious dishes ever!</p>
                <a href="Calendar">Check out the calendar for information about the dishes of the month.</a>
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
