<?php
    require_once "/usr/local/lib/php/vendor/autoload.php";
    $loader = new \Twig\Loader\FilesystemLoader(dirname(__FILE__).'/../templates');
    $twig = new \Twig\Environment($loader);
    include(dirname(__FILE__)."/../config/db.php");
    include(dirname(__FILE__)."/../controllers/sessions.php");
?>