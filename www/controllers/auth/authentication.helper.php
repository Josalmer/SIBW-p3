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

    }
?>
