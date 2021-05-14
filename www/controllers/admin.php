<?php
    include(dirname(__FILE__)."/auth/authentication.helper.php");

    $authenticationHelper = new authenticationHelper();
    $authenticationHelper->adminGuard();

    $usersRepository = new usersRepository();
    $users = $usersRepository->getAllUsers();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $v = json_decode(stripslashes(file_get_contents("php://input")));
        $username = $v->username;
        $updated = "";
        if (isset($v->super)) {
            $super = $v->super;
            $updated = $usersRepository->toggleSuperUser($username, $super);
        } else if (isset($v->moderator)) {
            $moderator = $v->moderator;
            $updated = $usersRepository->toggleModerator($username, $moderator);
        } else if (isset($v->manager)) {
            $manager = $v->manager;
            $updated = $usersRepository->toggleManager($username, $manager);
        }
        if ($username == $_SESSION['user']['username']) {
            $_SESSION['user'] = $usersRepository->getUserDetails($username);
            if ($_SESSION['user']['role'] == 0) {
                $updated = "notAdminAnymore";
            }
        }
        echo $updated;
        return;
    }
    
    echo $twig->render('pages/admin.html', ['users' => $users]);
?>
