<?php
const KLUCZ = 123456;
include '../helpers/redirect.php';
$data =
    [
        'type'=>$_POST['type']."\n",
        'kom'=>$_POST['kom'],
        'name'=>$_POST['name']."\n",
        'post'=>$_POST['post'],
        'blog'=>$_POST['blog']

    ];

$path = '../blogs/'.$data['blog'].'/'.$data['post'].'.k';


    if (!file_exists($path)) {
        $sem = sem_get(KLUCZ);
        if($sem==false)
        {
            sem_remove($sem);
            redirect('../views/LockNotAcquired.php');
        }
        else {
            mkdir($path);
            sem_release($sem);
        }
    }

$i = 0;
while(file_exists($path.'/'.$i))
{
    $i++;
}

$plik = fopen($path.'/'.$i,'w');
if(flock($plik,LOCK_EX)) {
    fwrite($plik, $data['type']);
    fwrite($plik, date('Y-m-d, h:i:s') . "\n");
    fwrite($plik, $data['name']);
    fwrite($plik, $data['kom']);
    flock($plik,LOCK_UN);
    fclose($plik);

    redirect('../scripts/blog.php?nazwa=' . $data['blog']);

} else
{
    redirect('../views/LockNotAcquired.php');
}
