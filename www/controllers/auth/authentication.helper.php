<?php
    include(dirname(__FILE__)."/../../models/users.repository.php");

    class authenticationHelper {

        public function getRegisteredUser() {
            $usersRepository = new usersRepository();

            if (!isset($_SESSION['user'])) {
                header("Location: landing");
                exit();
            } else {
                return $_SESSION['user'];
            }
        }

        public function authenticateUser($username, $password) {
            $usersRepository = new usersRepository();
            $userAuth = $usersRepository->getUserAuth($username);
            if ($userAuth && password_verify($password, $userAuth)) {
                $user = $usersRepository->getUserDetails($username);
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

        public function updateUser($username, $email, $birth_year, $password) {
            $usersRepository = new usersRepository();

            $user = $usersRepository->getUserDetails($username);

            if ($user && $username != $user['username']) {
                return "El nombre de usuario ya pertenece a un usuario registrado";
            } else {
                $user = $usersRepository->updateUser($_SESSION['user']['username'], $username, $email, $birth_year, $password);
                $_SESSION['user'] = $usersRepository->getUserDetails($username);
                return "edited";
            }
        }
    }
?>
