<?php
    include(dirname(__FILE__)."/../../models/users.repository.php");

    class authenticationHelper {

        public function getRegisteredUser() {
            if (!isset($_SESSION['user']) || $_SESSION['user']['role'] == "anonimo") {
                header("Location: landing");
                exit();
            } else {
                return $_SESSION['user'];
            }
        }

        public function adminGuard() {
            if (!isset($_SESSION['user']) || $_SESSION['user']['super'] == 0) {
                header("Location: landing");
                exit();
            } else {
                return true;
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

            $newUser = $usersRepository->getUserDetails($username);

            if ($newUser) {
                return "El nombre de usuario ya pertenece a un usuario registrado";
            } else {
                $newUser = $usersRepository->createUser($username, $email, $birth_year, $password);
                return "created";
            }
        }

        public function updateUser($username, $email, $birth_year, $password) {
            $usersRepository = new usersRepository();

            $existingUser = $usersRepository->getUserDetails($username);

            if ($existingUser && $username != $user['username']) {
                return "El nombre de usuario ya pertenece a un usuario registrado";
            } else {
                $user = $usersRepository->updateUser($_SESSION['user']['username'], $username, $email, $birth_year, $password);
                $_SESSION['user'] = $usersRepository->getUserDetails($username);
                return "edited";
            }
        }
    }
?>
