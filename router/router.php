<?php
//will get the value associated to the key "path" of the request uri
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

//will redirect to the page based on the key of the array routes
$routes = [
    '/' => 'controllers/index.php',
    '/about' => 'controllers/about.php',
    '/products' => 'controllers/products.php',
    '/services' => 'controllers/services.php',
    '/cart' => 'controllers/cart.php',
    '/login' => 'controllers/login.php',
    '/signup' => 'controllers/signup.php',
    '/logout' => 'controllers/logout.php'
];
//will redirect to the requested page
function routeToController($uri, $routes){
    //will check if the end point exists, else abort
    if(array_key_exists($uri, $routes)){
         require $routes[$uri];
    }
    else{
        abort();
    }
}
//set to 404 as default. 404 stands for page not found
function abort($code = 404){
    //get or set the response code
    http_response_code($code);
    
    require "views/{$code}.php";
    die();
}
//instantiate method to redirect to the page
routeToController($uri, $routes);