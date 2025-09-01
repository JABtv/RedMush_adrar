<?php
function sanitize($data){
	return htmlentities(strip_tags(stripslashes(trim($data))));
}

$errors = [];

try{
	$db = new PDO('mysql:host=localhost;dbname=redmush_adrar;charset=utf8','redmush_admin', 'devpass');
}catch(Exception $e){
	die('Erreur : '.$e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$login_user = sanitize($_POST['user_login'] ?? '');
	$password_user = sanitize($_POST['password'] ?? '');

	if (empty($login_user)) {
		$errors['login_user'] = "Identifiant obligatoire";
	} elseif (!filter_var($login_user, FILTER_VALIDATE_EMAIL)) {
		$errors['login_user_invalid'] = "Adresse email non valide";
	}
	if (empty($password_user)) {
		$errors['password_user'] = "Mot de passe obligatoire";
	}

	if (empty($errors)) {
		$query = $db->prepare("SELECT * FROM users WHERE login_user = ? LIMIT 1");
		$query->execute([$login_user]);
		$user = $query->fetch(PDO::FETCH_ASSOC);
		if ($user && password_verify($password_user, $user['password_user'])) {
			$_SESSION['user'] = [
				'id' => $user['id_user'],
				'name' => $user['name_user'],
				'first_name' => $user['first_name_user'],
				'login' => $user['login_user']
			];
			// Logique "Se souvenir de moi" : création d'un cookie si la case est cochée
			if (!empty($_POST['remberme'])) {
				setcookie('user_login', $login_user, time() + (86400 * 30), "/"); // 30 jours
			}
			$_POST['success'] = true;
			unset($_SESSION['errors']);
		} else {
			$errors['global'] = "Identifiants incorrects";
			$_SESSION['errors'] = $errors;
		}
	} else {
		$_SESSION['errors'] = $errors;
	}
}
