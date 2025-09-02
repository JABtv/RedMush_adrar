<?php
session_start();
if (isset($_SESSION['user'])) {
	header('Location: ./');
	exit;
}
require_once __DIR__ . '/../Models/auths/model_connexion.php';
if (isset($_POST['success'])) {
	header('Location: ./');
	exit;
}
require_once __DIR__ . '/../Views/templates/header.php';
require_once __DIR__ . '/../Views/auths/connexion.php';
require_once __DIR__ . '/../Views/templates/footer.php';