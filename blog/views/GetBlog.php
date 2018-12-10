<?php require 'header.php' ?>

<h1> <?php echo $_GET['nazwa'];?></h1>
<?php

foreach (new DirectoryIterator('../blogs/'.$_GET['nazwa']) as $post) {
    if ($post->isDot() || substr($post,-2,2)=='.k' || basename($post)=='info' || strlen(basename($post))!=16) continue;
        else
            {
                echo "<h2> $post </h2>";
                $file = fopen('../blogs/'.$_GET['nazwa'].'/'.$post,'r');
                while (($data = fgets($file))!==false)
                {
                    echo $data;
                }
                foreach (new DirectoryIterator('../blogs/'.$_GET['nazwa']) as $uFile)
                {
                    if(substr(basename($uFile),0,16)==basename($post) && substr(basename($uFile),-2,2)!='.k' && basename($uFile)!=basename($post))
                {
                    ?>
                    <a href="<?php echo '../blogs/'.$_GET['nazwa'].'/'.$uFile?>"><?php echo $uFile?></a>
                    <?php
                }
                }
                fclose($file);

                ?>
                <a href="../views/AddComment.php?post=<?php echo $post;?>&blog=<?php echo $_GET['nazwa'];?>"> Dodaj komentarz</a>
                <h3> Komentarze </h3>
                <?php
                if(file_exists('../blogs/'.$_GET['nazwa'].'/'.$post.'.k')) {

                    foreach (new DirectoryIterator('../blogs/'.$_GET['nazwa'].'/'.$post.'.k') as $kom) {
                        if ($kom->isDot()) continue;
                        else {
                            $file = fopen($kom->getPath().'/'.$kom,'r');
                            while (($data = fgets($file))!==false)
                            {
                                echo $data;
                            }
                            echo '<br/>';
                            fclose($file);
                        }
                    }
                }
            }
}
?>


<?php require 'footer.php' ?>
