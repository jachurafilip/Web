<?php
require '../helpers/redirect.php';
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

	$sem_blog = sem_get(2222);
	sem_acquire($sem_blog);

    if(!file_exists($blog_root.$data['blog_name']))
    {
        mkdir($blog_root.$data['blog_name']);
        $user_file = fopen($blog_root.$data['blog_name'].'/info','w');
            fwrite($user_file, $data['username'] . "\n");
            fwrite($user_file, $data['password'] . "\n");
            fwrite($user_file, $data['desc']);
            fclose($user_file);
            redirect('../views/BlogCreated.php');
       


    }
    else
    {
        require '../views/BlogExists.php';
    }
	sem_release($sem_blog);

}
else
{
    require '../views/CreateBlog.php';
}
