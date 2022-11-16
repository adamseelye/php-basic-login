<?php
    include_once "header.php";
    ?>

    <section class="login-form">
        <h2>Log In</h2>
        <form action="includes/login.inc.php" method="post">
            <!-- name may need to be "name" instead of "uid". check first if errors occur  -->
            <input type="text" name="uid" placeholder="Username/Email...">
            <input type="password" name="pwd" placeholder="Password...">
            <button type="submit" name="submit">Log In</button>
        </form>

        <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo "<p>Please complete all fields</p>";
            } else if ($_GET["error"] == "loginerror") {
                echo "<p>Login error</p>";
            } else if ($_GET["error"] == "pwderror") {
                echo "<p>Password error</p>";
            } else if ($_GET["error"] == "wronglogin") {
                echo "<p>Username unavailable</p>";
            } else if ($_GET["error"] == "stmtfailed") {
                echo "<p>Database error</p>";
            } else if ($_GET["error"] == "none") {
                echo "<p>You have successfully signed up! Noice!</p>";
            }
        }
        ?>


    </section>


<?php
    include_once "footer.php";
    ?>
