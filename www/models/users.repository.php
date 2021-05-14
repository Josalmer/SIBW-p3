<?php
    class usersRepository {
        public function getUserDetails($userName) {
            $queryResult = db::getDBSingleton()->query("SELECT username, email, birth_year, super, moderator, manager FROM users WHERE username = ?", [$userName]);

            if($queryResult->num_rows > 0) {
                $user = mysqli_fetch_assoc($queryResult);
                if ($user['super']) {
                    $user['role'] = 'admin';
                } else if ($user['manager']) {
                    $user['role'] = 'manager';
                } else if ($user['moderator']) {
                    $user['role'] = 'moderator';
                } else {
                    $user['role'] = 'user';
                }
                return $user;
            }
        }

        public function getAllUsers() {
            $queryResult = db::getDBSingleton()->query("SELECT username, email, birth_year, super, moderator, manager FROM users", []);

            if($queryResult->num_rows > 0) {
                $users = $queryResult->fetch_all(MYSQLI_ASSOC);
                return $users;
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
            $queryResult = db::getDBSingleton()->query("INSERT INTO users(email, birth_year, username, encrypted_password, created_at, updated_at) VALUES(?, ?, ?, ?, ?, ?)", [$email, $birth_year, $username, $encryptedPassword, $now, $now]);

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

        public function toggleSuperUser($username, $super) {
            if ($_SESSION['user']['super']==1) {
                if ($super == 0) {
                    $queryResult = db::getDBSingleton()->query("SELECT username FROM users WHERE super = 1", []);
                    if($queryResult->num_rows <= 1) {
                        return "El sistema no se puede quedar sin administrador";
                    }
                }
                $queryResult = db::getDBSingleton()->query("UPDATE users set super = ? WHERE username = ?", [$super, $username]);
    
                return "correct";
            } else {
                header("Location: landing");
                exit();
            }
        }

        public function toggleModerator($username, $moderator) {
            if ($_SESSION['user']['super']==1) {
                $queryResult = db::getDBSingleton()->query("UPDATE users set moderator = ? WHERE username = ?", [$moderator, $username]);

                return "correct";
            } else {
                header("Location: landing");
                exit();
            }
        }

        public function toggleManager($username, $manager) {
            if ($_SESSION['user']['super']==1) {
                $queryResult = db::getDBSingleton()->query("UPDATE users set manager = ? WHERE username = ?", [$manager, $username]);

                return "correct";
            } else {
                header("Location: landing");
                exit();
            }
        }
    }
?>