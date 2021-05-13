<?php
  session_start();

  if (!isset($_SESSION['user'])) {
    $_SESSION['user']['role'] = "anonimo";
  }
  echo $twig->addGlobal('user', $_SESSION['user']);
?>