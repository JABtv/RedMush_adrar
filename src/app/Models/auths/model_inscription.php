<?php
//fonction de nettoyage de données
function sanitize($data){
    return htmlentities(strip_tags(stripslashes(trim($data))));
}

try{
    $db = new PDO('mysql:host=localhost;dbname=redmush_adrar;charset=utf8','redmush_admin', 'devpass');
}
catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}

$errors = [];

// Vérification des champs uniquement si POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name_user = sanitize($_POST['name_user'] ?? '');
    $first_name_user = sanitize($_POST['first_name_user'] ?? '');
    $login_user = sanitize($_POST['login_user'] ?? '');
    $password_user = sanitize($_POST['password_user'] ?? '');
    $password_user2 = sanitize($_POST['password_user2'] ?? '');
    $adresse = sanitize($_POST['adresse'] ?? '');
    $ville = sanitize($_POST['ville'] ?? '');
    $code_postal = sanitize($_POST['code_postal'] ?? '');
    $pays = sanitize($_POST['pays'] ?? '');
    $telephone = sanitize($_POST['telephone'] ?? '');

    if (empty($name_user)) $errors['name_user'] = "Nom obligatoire";
    if (empty($first_name_user)) $errors['first_name_user'] = "Prénom obligatoire";
    if (empty($login_user)) $errors['login_user'] = "Email obligatoire";
    if (empty($password_user) || strlen($password_user) < 8) $errors['password_user'] = "Mot de passe trop court (min 8 caractères)";
    if ($password_user !== $password_user2) $errors['password_user2'] = "Les mots de passe ne sont pas identiques";
    if (empty($adresse)) $errors['adresse'] = "Adresse obligatoire";
    if (empty($ville)) $errors['ville'] = "Ville obligatoire";
    if (empty($code_postal)) $errors['code_postal'] = "Code postal obligatoire";
    if (empty($pays)) $errors['pays'] = "Pays obligatoire";
    if (empty($telephone)) $errors['telephone'] = "Téléphone obligatoire";

    // Vérification doublon login_user
    $check = $db->prepare("SELECT COUNT(*) FROM users WHERE login_user = ?");
    $check->execute([$login_user]);
    if ($check->fetchColumn() > 0) {
        $errors['login_user'] = "Cet email est déjà utilisé";
    }

    if (empty($errors)) {
        $sqlQuery = "INSERT INTO users (name_user, first_name_user, login_user, password_user, adresse, ville, code_postal) VALUES (:name_user, :first_name_user, :login_user, :password_user, :adresse, :ville, :code_postal)";
        $inscription = $db->prepare($sqlQuery);
        $success = $inscription->execute([
            'name_user' => $name_user,
            'first_name_user' => $first_name_user,
            'login_user' => $login_user,
            'password_user' => password_hash($password_user, PASSWORD_BCRYPT),
            'adresse' => $adresse,
            'ville' => $ville,
            'code_postal' => $code_postal
        ]);
        if ($success) {
            // Inscription réussie, on peut rediriger ou afficher un message dans la vue
            header('Location: ../../../../'); exit;
        } else {
            $errors['global'] = "Erreur lors de l'inscription";
            $_SESSION['errors'] = $errors;
        }
    } else {
        $_SESSION['errors'] = $errors;
    }
}