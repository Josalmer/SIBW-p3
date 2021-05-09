<?php
  session_start();

  if (!isset($_SESSION['userName'])) {
    $_SESSION['userRole'] = "anonimo";
  }
  echo $twig->addGlobal('role', $_SESSION['userRole']);
  echo $twig->addGlobal('userName', $_SESSION['userName']);
?>