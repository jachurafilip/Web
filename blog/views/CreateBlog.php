<?php require 'header.php'?>
<h1 id="title">Załóż bloga</h1>
<div id = "menu">
</div>
<div id="content">
    <form action="../scripts/nowy.php" method="post">
        Blog name: <input type="text" name="blog_name"><br/>
        Username: <input type="text" name="username"><br/>
        Password: <input type="password" name="password"><br/>
        Description: <textarea name="description" cols="30" rows="10"> </textarea><br/>
        <input type="submit" value = "Wyślij">
        <input type="reset" value="Wyczyść">

    </form>

</div>
<?php require 'footer.php';
