<?php
$nA = 2;
$title = "RedMush_adrar";

require __DIR__ . '/../vendor/autoload.php';

$router = new AltoRouter();
$router->setBasePath('/redmush');

// map homepage
$router->map( 'GET', '/', function() {
	require __DIR__ . '/../src/app/Controllers/controller_accueil.php';
});

$router->map( 'GET', '/connexion', function() {
	require __DIR__ . '/../src/app/Controllers/controller_connexion.php';
});

$router->map( 'GET', '/inscription', function() {
	require __DIR__ . '/../src/app/Controllers/controller_inscription.php';
});

$router->map( 'GET', '/homme', function() {
	require __DIR__ . '/../src/app/Controllers/controller_homme.php';
});

$router->map( 'GET', '/femme', function() {
	require __DIR__ . '/../src/app/Controllers/controller_femme.php';
});

$router->map( 'GET', '/enfant', function() {
	require __DIR__ . '/../src/app/Controllers/controller_enfant.php';
});

$router->map( 'GET', '/accessoires', function() {
	require __DIR__ . '/../src/app/Controllers/controller_accessoires.php';
});

$router->map( 'GET', '/nouveautes', function() {
	require __DIR__ . '/../src/app/Controllers/controller_nouveautes.php';
});

$router->map( 'GET', '/promotion', function() {
	require __DIR__ . '/../src/app/Controllers/controller_promotion.php';
});

$router->map( 'GET', '/capsule', function() {
	require __DIR__ . '/../src/app/Controllers/controller_capsule.php';
});

$router->map( 'GET', '/faq', function() {
	require __DIR__ . '/../src/app/Controllers/controller_faq.php';
});

$router->map( 'GET', '/contacte', function() {
	require __DIR__ . '/../src/app/Controllers/controller_contacte.php';
});

$router->map( 'GET', '/panier', function() {
	require __DIR__ . '/../src/app/Controllers/controller_panier.php';
});

$router->map( 'GET', '/panier/paiement', function() {
	require __DIR__ . '/../src/app/Controllers/controller_paiement.php';
});

// map user details page
$router->map( 'GET', '/user/[i:id]/', function( $id ) {
	require __DIR__ . '/../src/app/Controllers/controller_user-details.php';
});

// match current request url
$match = $router->match();

if ($match !== null){
	require_once __DIR__ . '/../src/app/Views/templates/header.php';

	// call closure or throw 404 status
	if( is_array($match) && is_callable( $match['target'] ) ) {
		call_user_func_array( $match['target'], $match['params'] );
	} else {
	// no route was matched
	header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found | Sad T_T');
	}
	require_once __DIR__ . '/../src/app/Views/templates/footer.php';
}