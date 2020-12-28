<?php
$file= 'data.json';
    file_put_contents($file, json_encode([
        ['name' => 'Kateryna',  'pass' => 123],
        ['name' => 'Diana',  'pass' => 12345],
        ]
    ));