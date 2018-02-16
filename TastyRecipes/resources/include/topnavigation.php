
<a <?php echo ($page == 'index.php') ? "class='active'" : ""; ?> href="FirstPage">Home</a>
<a <?php echo ($page == 'calendar.php') ? "class='active'" : ""; ?> href="Calendar">Calendar</a>
<a <?php echo ($page == 'meatballs.php') ? "class='active'" : ""; ?> href="Meatballs">Meatballs</a>
<a <?php echo ($page == 'pancakes.php') ? "class='active'" : ""; ?> href="Pancakes">Pancakes</a>
<?php 
if(empty($username)) { ?>
<a class="rightsidemenu <?php echo ($page == 'login.php') ? "active" : ""; ?>" href="Login">Log in</a>
<a class="rightsidemenu <?php echo ($page == 'register.php') ? "active" : ""; ?>" href="Register">Register</a>
<?php } else { ?>
<a class="rightsidemenu" href="Logout">Log out</a>
<?php } ?>