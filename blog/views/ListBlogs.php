<?php require 'header.php'; ?>

<h1>Wszystkie blogi:</h1>

<ul>
<?php
foreach (new DirectoryIterator('../blogs') as $blog)
{
    if($blog->isDot()) continue;
    else
    {
       ?> <li><a href="<?php echo '../scripts/blog.php?nazwa='.$blog; ?>"><?php echo $blog; ?></a></li>

    <?php
    }
}

?>
</ul>
<?php require 'footer.php'; ?>
