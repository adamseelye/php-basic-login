<?php
    include_once "header.php";
    ?>

    <section class="signup-form">
        <h2>Sign Up</h2>
        <form action="includes/signup.inc.php" method="post">
            <input type="text" name="name" placeholder="Full Name...">
            <input type="text" name="email" placeholder="Email...">
            <input type="text" name="uid" placeholder="Username...">
            <input type="password" name="pwd" placeholder="Password...">
            <input type="password" name="pwdrepeat" placeholder="Repeat password...">
            <button type="submit" name="submit">Sign Up</button>
        </form>

        <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo "<p>Please complete all fields</p>";
            } else if ($_GET["error"] == "invaliduid") {
                echo "<p>Please choose a valid username</p>";
            } else if ($_GET["error"] == "invalidemail") {
                echo "<p>Please enter a valid email</p>";
            } else if ($_GET["error"] == "pwderror") {
                echo "<p>Password error</p>";
            } else if ($_GET["error"] == "unameerror") {
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
