<?php //require("include/header.php"); ?>
<!DOCTYPE html>

<html>
    <head>
        <title>Calendar | Tasty Recipes</title>
        <meta charset="UTF-8">
        <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
        <?php require_once("resources/include/cssfavicon.php"); ?>
    </head>
    <body>
        <nav>
            <?php $page = 'calendar.php'; require_once('resources/include/topnavigation.php'); ?>
        </nav>

        <header>
            <h1>Calendar</h1>
        </header>

        <div class="row">
            <div class="column centered">
                <ul class="weekdays">
                    <li>Mo</li>
                    <li>Tu</li>
                    <li>We</li>
                    <li>Th</li>
                    <li>Fr</li>
                    <li>Sa</li>
                    <li>Su</li>
                </ul>

                <ul class="days">
                    <li>1</li>
                    <li>2</li>
                    <li>3</li>
                    <li>
                        4
                        <a class="calendarLink" href="Pancakes">
                            <img class="calendarImage" src="../../resources/images/pancakes.jpg" alt="Pancakes recipe">
                        </a>
                    </li>
                    <li>5</li>
                    <li>6</li>
                    <li>7</li>
                    <li>8</li>
                    <li>9</li>
                    <li>10</li>
                    <li>12</li>
                    <li>13</li>
                    <li>14</li>
                    <li>15</li>
                    <li>16</li>
                    <li>
                        17
                        <a class="calendarLink" href="Meatballs">
                            <img class="calendarImage" src="../../resources/images/meatballs.jpg" alt="Meatballs recipe">
                        </a>
                    </li>
                    <li>18</li>
                    <li>19</li>
                    <li>20</li>
                    <li>21</li>
                    <li>22</li>
                    <li>23</li>
                    <li>24</li>
                    <li>25</li>
                    <li>26</li>
                    <li>27</li>
                    <li>28</li>
                    <li>29</li>
                    <li>30</li>
                </ul>

            </div>
        </div>

        <footer>
            Email us: contact@tastyrecipes.com
        </footer>
    </body>
</html>
