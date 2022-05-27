<?php

use Koltsova\FileIterator\FileIterator;

require_once __DIR__ . '/vendor/autoload.php';

$file = __DIR__ . '/example.txt';

try {
    $text = new FileIterator($file);
} catch (Exception $e) {
    echo $e->getMessage();
}

foreach ($text as $line) {
//    if (mb_strlen($line) <= 1) {
//        continue;
//    } else {
    print_r($line);
//    }
}

