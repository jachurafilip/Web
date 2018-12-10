<?php require 'header.php' ?>


<h1 id="title">Add a comment</h1>
<div id = "menu">
</div>
<div id="content">
    <form action="../scripts/koment.php" method="post" enctype="multipart/form-data">
        Typ: <select name="type">
            <option>Pozytywny</option>
            <option>Negatywny</option>
            <option>Neutralny</option>
        </select><br/>
        Komentarz: <textarea name="kom" cols="30" rows="10"></textarea>
        Imię/Nazwisko/Pseudonim: <input type="text" name="name"/>
        <input type="hidden" name="post" value="<?php echo $_GET['post']; ?>">
        <input type="hidden" name="blog" value="<?php echo $_GET['blog']; ?>">
        <input type="submit" value = "Wyślij">
        <input type="reset" value="Reset">

    </form>

</div>

<?php require 'footer.php' ?>

