<?php
    require_once (dirname(__FILE__)."/config/server_initializer.php");

    function startsWith($string, $query) {
        return substr($string, 0, strlen($query)) === $query;
    }

    $uri = $_SERVER['REQUEST_URI'];

    if(startsWith($uri, "/event")) {
        include(dirname(__FILE__)."/controllers/event.php");
    } else if(startsWith($uri, "/print_event")) {
        include(dirname(__FILE__)."/controllers/print_event.php");
    } else if (startsWith($uri, "/login")) {
      include(dirname(__FILE__)."/controllers/auth/login.php");
    } else if (startsWith($uri, "/logout")) {
        include(dirname(__FILE__)."/controllers/auth/logout.php");
    } else if (startsWith($uri, "/signup")) {
        include(dirname(__FILE__)."/controllers/auth/signup.php");
    } else {
        include(dirname(__FILE__)."/controllers/landing.php");
    }
?>
