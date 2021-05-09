<?php
    include(dirname(__FILE__)."/authentication.helper.php");

    $authenticationHelper = new authenticationHelper();

    $wrongCredentials = false;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $loggedIn = $authenticationHelper->authenticateUser($username, $password);

        if ($loggedIn) {
            header("Location: landing.php");
            exit();
        } else {
            $wrongCredentials = true;
        }
    }

    echo $twig->render('pages/auth/login.html', ['wrongCredentials' => $wrongCredentials]);
?>
