<?php
$file= 'data.json';
    file_put_contents($file, json_encode([
        ['name' => 'Kateryna',  'pass' => md5('123')],
        ['name' => 'Diana',  'pass' => md5('123')],
        ]
    ));
    //{
    //     die('yes');
    // } else{
    //     die('no');
    // }