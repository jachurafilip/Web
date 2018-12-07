<?php
require '../helpers/redirect.php';
if(empty($_GET['nazwa']))
{
    require '../views/ListBlogs.php';
}
elseif (file_exists('../blogs/'.$_GET['nazwa']))
{
    require '../views/GetBlog.php';
}
else
{
    require '../views/BlogDoesNotExist.php';
}
