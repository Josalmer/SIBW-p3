<?php
    include(dirname(__FILE__)."/../../models/users.repository.php");

    class authenticationHelper {

        public function authenticateUser($username, $password) {
            $usersRepository = new usersRepository();
            $userAuth = $usersRepository->getUserAuth($username);
            if ($userAuth && password_verify($password, $userAuth)) {
                $user = $usersRepository->getUserDetails($username);
                $_SESSION['userName'] = $username;
                $_SESSION['userRole'] = $user['role'];
                $_SESSION['user'] = $user;
                return true;
            } else {
                return false;
            }
        }

        public function logout() {
            session_destroy();
        }

        public function registerUser($username, $email, $birth_year, $password) {
            $usersRepository = new usersRepository();

            $user = $usersRepository->getUserDetails($username);

            if ($user) {
                return "El nombre de usuario ya pertenece a un usuario registrado";
            } else {
                $user = $usersRepository->createUser($username, $email, $birth_year, $password);
                return "created";
            }
        }
    }
?>
