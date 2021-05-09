<?php
    class usersRepository {
        public function getUserDetails($userName) {
            $queryResult = db::getDBSingleton()->query("SELECT id, role_id, username, email, birth_year FROM users WHERE username = ?", [$userName]);

            if($queryResult->num_rows > 0) {
                $user = mysqli_fetch_assoc($queryResult);

                $roleResult = db::getDBSingleton()->query("SELECT role_name FROM roles WHERE id = ?", [$user['role_id']]);
                $userRole = mysqli_fetch_assoc($roleResult);
                $user['role'] = $userRole['role_name'];

                return $user;
            }
        }

        public function getUserAuth($userName) {
            $queryResult = db::getDBSingleton()->query("SELECT encrypted_password FROM users WHERE username = ?", [$userName]);

            if($queryResult->num_rows > 0) {
                $userAuth = mysqli_fetch_assoc($queryResult);
                return $userAuth['encrypted_password'];
            }
        }
    }
?>