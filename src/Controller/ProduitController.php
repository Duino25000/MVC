<?php

namespace App\Controller;

use App\Application\Controller;

class ProduitController extends Controller
{
	public function default(){

		$objProduit = new Produit();
		$produits = $objProduit->getALL();
		return $this->twig->render(
			'produit/default.html.twig',
			[
				'produits' => $produits
			]
		);
	}

	public function delete( $params = []){
		$id= $params['idProduit'];
		$produit = new Produit();
		$produit->delete($id);
		header('Location: /produit');
	}

}