<?php

    $pharFile = 'OCD.phar';

    if(file_exists($pharFile))
    {
        unlink($pharFile);
    }

    $phar = new Phar($pharFile);
    $phar->startBuffering();
    $phar->buildFromDirectory(__DIR__ . '/../Source');
    $phar->setDefaultStub('Index.php');
    $phar->stopBuffering();
    
    chmod(__DIR__ . "/$pharFile", 0770);