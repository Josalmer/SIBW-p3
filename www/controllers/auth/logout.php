<?php
    include(dirname(__FILE__)."/authentication.helper.php");

    $authenticationHelper = new authenticationHelper();

    $authenticationHelper->logout();
    header("Location: landing.php");
    exit();
?>
