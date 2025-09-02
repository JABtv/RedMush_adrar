<?php
session_start();
// Déconnexion : destruction de la session et du cookie
session_unset();
session_destroy();
setcookie('user_login', '', time() - 3600, "/");
header('Location: ./');
exit;
