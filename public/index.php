<?php

require '../vendor/autoload.php';

use GuzzleHttp\Psr7\ServerRequest;

    $app = new \Framework\App([
        BlogModule::class
    ]);
    
    $demo = [];


    $response=$app->run(ServerRequest::fromGlobals());
    \Http\Response\Send($response);