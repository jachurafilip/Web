<?php
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

$sem_koment = sem_get(1111);
sem_acquire($sem_koment);
    if (!file_exists($path)) {    
            mkdir($path);   
        }
    }

$i = 0;
while(file_exists($path.'/'.$i))
{
    $i++;
}


$plik = fopen($path.'/'.$i,'w');
    fwrite($plik, $data['type']);
    fwrite($plik, date('Y-m-d, h:i:s') . "\n");
    fwrite($plik, $data['name']);
    fwrite($plik, $data['kom']);
    fclose($plik);


sem_release($sem);

redirect('../scripts/blog.php?nazwa=' . $data['blog']);
