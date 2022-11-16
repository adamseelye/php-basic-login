<?php
    include_once "header.php";
    ?>

<section class="index-intro">
<?php

if (isset($_SESSION["useruid"])) {
    echo '<p>Hello and welcome ' . $_SESSION["useruid"] . "!</p>";
}
?>
</section>

<?php
    include_once "footer.php";
    ?>