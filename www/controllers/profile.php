<?php
    include(dirname(__FILE__)."/auth/authentication.helper.php");

    $authenticationHelper = new authenticationHelper();

    $nameTaken = "";
    $edited = "";
    $user = $authenticationHelper->getRegisteredUser();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $birth_year = $_POST['birth_year'];
        $password = $_POST['password'];

        $result = $authenticationHelper->updateUser($username, $email, $birth_year, $password);

        if ($result != "edited") {
            $nameTaken = $result;
            $user = $authenticationHelper->getRegisteredUser();
        } else {
            $edited = "Usuario editado con exito";
            $user = $authenticationHelper->getRegisteredUser();
        }
    }

    echo $twig->render('pages/profile.html', ['user' => $user, 'nameTaken' => $nameTaken, 'edited' => $edited]);
?>
