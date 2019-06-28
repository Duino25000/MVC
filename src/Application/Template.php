<?php

namespace App\Application;
use \Twig_Loader_FileSystem;
use \Twig_Environment;
class Template
{
	//private rend l'objet accessible que par la class elle meme.
	//On peux aussi utiliser public ou protected.
	 private const PATH = '../templates';

	 /**
	 *@var Twig_Loader_Filesystem
	 */
	 private $loader;

	 /**
	 *@var Twig_Environnement
	 */
	 private $template;
	

	public function __construct()
	{
		//var_dump('lol');
		$this->loader = new Twig_Loader_FileSystem(self::PATH);
		$this->template = new Twig_Environment(
			$this->loader,
			array(
				'cache' => false
			)
		);
	}

	public function render( string $path, array $params = [] ):string
	{
		return $this->template->render(
			$path,
			$params
		);
	}

}