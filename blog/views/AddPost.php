<?php require 'header.php'?>
<h1 id="title">Dodaj post</h1>
<div id="content">
    <?php
    if(isset($_GET['err']))
    {
    if($_GET['err']==1)
    $err='Zły login';
    elseif($_GET['err']==2)
    $err='Złe hasło!';


    }else $err = '';
    ?>
    <form action="../scripts/wpis.php" method="post" enctype="multipart/form-data">
        Username: <input type="text" name="username"/><br/>
        Password: <input type="password" name="password"/><br/>
        Post: <textarea name="content" cols="30" rows="10"> </textarea><br/>
        Data: <input type="text" name="date" value="<?php echo date('Y-m-d',time());?>"/><br/>
        Godzina: <input type="text" name="hour" value="<?php echo date('H:i',time());?>"/><br/>
        Załączniki: <input type="file" name="files[]"/>
        <input type="file" name="files[]"/>
        <input type="file" name="files[]"/>
        <input type="submit" value = "Wyślij"/>
        <input type="reset" value="Reset">

    </form>
    <h3><?php echo $err;?></h3>

</div>
<?php require 'footer.php';
