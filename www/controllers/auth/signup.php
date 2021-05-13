<?php
    include(dirname(__FILE__)."/authentication.helper.php");

    $authenticationHelper = new authenticationHelper();

    $signUpError = "";

    $username = "";
    $email = "";
    $birth_year = "";
    $password = "";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $birth_year = $_POST['birth_year'];
        $password = $_POST['password'];

        if ($username == "" || $email == "" || $birth_year == "" || $password == "") {
            $signUpError = "Rellene correctamente todos los campos"; 
        } else {
            $result = $authenticationHelper->registerUser($username, $email, $birth_year, $password);
    
            if ($result != "created") {
                $signUpError = $result;
            } else {
                $authenticationHelper->authenticateUser($username, $password);
                header("Location: landing");
                exit();
            }
        }
    }

    echo $twig->render('pages/auth/signup.html', ['signUpError' => $signUpError, 'username' => $username, 'birth_year' => $birth_year, 'email' => $email, 'password' => $password]);
?>
