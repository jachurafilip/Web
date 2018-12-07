<?php require 'header.php'; ?>

<h1>Wszystkie blogi:</h1>

<?php
foreach (new DirectoryIterator('../blogs') as $blog)
{
    if($blog->isDot()) continue;
    else
    {
       ?> <h2><a href="<?php echo '../scripts/blog.php?nazwa='.$blog; ?>"><?php echo $blog; ?></a></h2>

    <?php
    }
}

?>

<?php require 'footer.php'; ?>
