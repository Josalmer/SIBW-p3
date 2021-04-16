<?php
    require_once (dirname(__FILE__)."/config/server_initializer.php");
    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);

    function startsWith($string, $query) {
        return substr($string, 0, strlen($query)) === $query;
    }

    $uri = $_SERVER['REQUEST_URI'];

    if(startsWith($uri, "/event")) {
        include(dirname(__FILE__)."/controllers/event.php");
    } else {
        include(dirname(__FILE__)."/controllers/landing.php");
    }
?>
