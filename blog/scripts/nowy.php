<?php

$blog_root='../blogs/';

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $data =
        [
            'blog_name'=>trim($_POST['blog_name']),
            'username'=>trim($_POST['username']),
            'password'=>md5(trim($_POST['password'])),
            'desc'=>trim($_POST['description'])
        ];

    if(!file_exists($blog_root.$data['blog_name']))
    {
        mkdir($blog_root.$data['blog_name']);
        $user_file = fopen($blog_root.$data['blog_name'].'/info','w');
        fwrite($user_file,$data['username']."\n");
        fwrite($user_file,$data['password']."\n");
        fwrite($user_file,$data['desc']);
        fclose($user_file);


    }
    else
    {
        require '../views/BlogExists.php';
    }

}
else
{
    require '../views/CreateBlog.php';
}