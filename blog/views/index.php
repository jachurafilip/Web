<?php require 'header.php'; ?>

<h1>Szukaj bloga</h1>

<form action="../scripts/blog.php" method="GET">
   Nazwa: <input type="text" name="nazwa"/>
    <input type="submit" value="Szukaj!"/>
    <input type="reset" value="Wyczyść">
</form>


<?php require 'footer.php'; ?>
