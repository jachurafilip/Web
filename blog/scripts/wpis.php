<?php
require_once '../helpers/redirect.php';
$blogname = null;
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $data =
        [
            'username'=>trim($_POST['username']),
            'password'=>md5(trim($_POST['password'])),
            'post'=>trim($_POST['content']),
            'date'=>trim($_POST['date']),
            'hour'=>trim($_POST['hour']).':'.date('s',time()),



        ];
    $files = scandir('../blogs');

    foreach(new DirectoryIterator('../blogs') as $file)
    {
        if($file->isDot()) continue;
        $plik = fopen('../blogs/'.$file.'/info','r');
        $user = trim(fgets($plik));
        if($user==$data['username'])
        {
            $blogname = $file;
            break;
        }
        fclose($plik);
    }
    if(!isset($blogname)) {
        redirect('../views/AddPost.php?err=1');
    }

    $plik = fopen('../blogs/'.$blogname.'/info','r');
    fgets($plik);
    $password = trim(fgets($plik));

    if($password!=$data['password'])
    {
        redirect('../views/AddPost.php?err=2');
    }
    fclose($plik);
    $number = 0;
    $nazwa = substr($data['date'],0,4).substr($data['date'],5,2).substr($data['date'],8,2)
        .substr($data['hour'],0,2).substr($data['hour'],3,2).date('s',time()).str_pad($number,2,'0',STR_PAD_LEFT);
    while(file_exists('../blogs/'.$blogname.'/'.$nazwa))
    {
        $number++;
        $nazwa = substr($nazwa,0,-1);
        $nazwa = $nazwa.str_pad($number,2,'0',STR_PAD_LEFT);
    }
    $plik = fopen('../blogs/'.$blogname.'/'.$nazwa,'w');
    if(flock($plik,LOCK_EX)) {
        fwrite($plik, $data['post']);
        fclose($plik);
        flock($plik,LOCK_UN);
    }
    else
    {
        redirect('../views/LockNotAcquired.php');
    }

    $files =
        [
          'tmp_name'=>$_FILES['files']['tmp_name'],
          'name'=>$_FILES['files']['name']
        ];
    for($i = 0; $i<3; $i++)
    {
        if(is_uploaded_file($files['tmp_name'][$i]))
        {
            move_uploaded_file($files['tmp_name'][$i],'../blogs/'.$blogname.'/'.$nazwa.($i+1).substr($files['name'][$i],-4,4));
        }
    }





    redirect('../views/PostAdded.php');

}
else {
    redirect('../views/AddPost.php');

}