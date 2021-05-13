<?php
    class usersRepository {
        public function getUserDetails($userName) {
            $queryResult = db::getDBSingleton()->query("SELECT role_id, username, email, birth_year FROM users WHERE username = ?", [$userName]);

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

        public function createUser($username, $email, $birth_year, $password) {
            $encryptedPassword =  password_hash($password, PASSWORD_DEFAULT);
            $date = new DateTime();
            $now = $date->format('Y-m-d H:i:s');
            $queryResult = db::getDBSingleton()->query("INSERT INTO users(role_id, email, birth_year, username, encrypted_password, created_at, updated_at) VALUES(?, ?, ?, ?, ?, ?, ?)", [1, $email, $birth_year, $username, $encryptedPassword, $now, $now]);

            return $queryResult;
        }

        public function updateUser($oldUsername, $username, $email, $birth_year, $password) {
            $date = new DateTime();
            $now = $date->format('Y-m-d H:i:s');
            if ($password != '*******') {
                $encryptedPassword =  password_hash($password, PASSWORD_DEFAULT);
                $queryResult = db::getDBSingleton()->query("UPDATE users set email = ?, birth_year = ?, username = ?, encrypted_password = ?, updated_at = ? WHERE username = ?", [$email, $birth_year, $username, $encryptedPassword, $now, $oldUsername]);
            } else {
                $queryResult = db::getDBSingleton()->query("UPDATE users set email = ?, birth_year = ?, username = ?, updated_at = ? WHERE username = ?", [$email, $birth_year, $username, $now, $oldUsername]);
            }

            return $queryResult;
        }
    }
?>