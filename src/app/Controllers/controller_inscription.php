<?php
session_start();
if (isset($_SESSION['user'])) {
	header('Location: ./');
	exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	require_once __DIR__ . '/../Models/auths/model_inscription.php';
	if (isset($_POST['success'])) {
		header('Location: ./connexion');
		exit;
	}
}
require_once __DIR__ . '/../Views/templates/header.php';
require_once __DIR__ . '/../Views/auths/inscription.php';
require_once __DIR__ . '/../Views/templates/footer.php';