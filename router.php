<?php
    $uri = parse_url($_SERVER['REQUEST_URI'])['path'] ; //parse()[] is to handle if the uri is in the form contact?marvin or 
                                                        //contact?joshua it extracts the uri contact as the path for the conditional statements

    /*if( $uri === '/'){
        require 'controllers/index.php';
    } elseif ( $uri === '/about'){
        require 'controllers/about.php';
    } elseif ( $uri === '/contact'){
        require 'controllers/contact.php';
    }*/

    $routes = [
        '/' => 'controllers/index.php',
        '/about' => 'controllers/about.php',
        '/contact' => 'controllers/contact.php',
    ];

    function routeToController($uri, $routes) {
        if(array_key_exists($uri, $routes)) {
            require $routes[$uri];
        } else {
            abort();
        }
    }

    function abort($code = 404){ //passes a default error code 404 if no error status code is provided
        http_response_code($code);
        require "views/{$code}.php";
        die();
    }

    routeToController($uri, $routes);