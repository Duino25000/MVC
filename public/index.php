<?php

require_once dirname(__DIR__).'/vendor/autoload.php';
$routeur = new AltoRouter();

//c=controlleur, a=la méthode
$routeur->map('GET', '/', array('c' =>'BlogController', 'a' => 'index'));
//regarde ce qu'il y a apres le / pour charger le bon controlleur et la méthode.
$routeur->map('GET', '/list', array('c' =>'BlogController', 'a' => 'posts'));
$routeur->map('GET', '/produit', array('c'=> 'ProduitController', 'a' => 'default'));
$routeur->addMatchTypes(array('iProduit' => '[0-9}{1,5]'));
$routeur->map('GET', '/produit/delete/[i:idProduit]',array('c'=> 'ProduitController', 'a' => 'delete'));

$match = $routeur->match();

//renvoi le résultat de match
//var_dump($match);

$controller = 'App\\Controller\\' . $match['target']['c'];


$action = $match['target']['a'];

//Instancier l'objet d'après l'url
$object = new $controller();
if ( count ($match['params']) === 0 )
	$sprint = $object->{$action}();
else 
	$print = $object->{$action}($match['params']);

echo $print;