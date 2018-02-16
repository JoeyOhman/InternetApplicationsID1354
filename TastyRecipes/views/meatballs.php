<?php
require("resources/xml/simpleXML.php");
$cookbook = $xmlstr;
$recipeNo = 0;
//echo $cookbook . "lol";
?>
<!DOCTYPE html>

<html>
    <head>
        <title>Meatballs | Tasty Recipes</title>
        <meta charset="UTF-8">
        <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
        <?php require_once("resources/include/cssfavicon.php"); ?>
        <script src="../../resources/javascript/jquery-3.2.1.min.js"></script>
        <script src="../../resources/javascript/knockout-3.4.2.js"></script>
        <script src="../../resources/javascript/comments.js"></script>
    </head>
    <body>
        <nav>
            <?php
            $page = 'meatballs.php';
            require_once('resources/include/topnavigation.php');
            ?>
        </nav>

        <header>
            <h1><?php echo $cookbook->recipe[$recipeNo]->title; ?></h1>
        </header>

        <div class="row">
            <div class="column left">
                <img class="recipeFoodImage" src="<?php echo $cookbook->recipe[$recipeNo]->imagepath; ?>" alt="Delicious <?php echo $cookbook->recipe[$recipeNo]->title ?>!">
                <h2>Recipe</h2>
                <p class="recipeDescription"><?php echo $cookbook->recipe[$recipeNo]->description ?></p>
                <h3 class="leftHeader">Ingredients</h3>
                <ul class="ingredients">
                    <?php
                    foreach ($cookbook->recipe[$recipeNo]->ingredient->li as $li) {
                        echo "<li>" . $li . "</li>";
                    }
                    ?>
                </ul>
                <h3 class="leftHeader">Instructions</h3>
                <ul class="instructions">
                    <?php
                    foreach ($cookbook->recipe[$recipeNo]->recipetext->li as $li) {
                        echo "<li>" . $li . "</li>";
                    }
                    ?>
                </ul>
            </div>

            <div class="column right">
                <h2>Comments</h2>
                <div id="commentContainer">
                    <?php
                    require_once("resources/include/readComments.php");
                    if (!empty($error)) {
                        echo $error;
                    }
                    require_once("resources/include/commentForm.php");
                    ?>
                </div>
            </div>

        </div>

        <footer>
            Email us: contact@tastyrecipes.com
        </footer>
    </body>
</html>
