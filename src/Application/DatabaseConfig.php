<?php

namespace App\Application;

use \Dotenv\Dotenv;

class DatabaseConfig
{

	/**
	*@var PDO
	*/
	public $db;


	private function config()
	{
		$dotenv = \Dotenv\Dotenv::create('../');
		$dotenv->load();
		try
		{
			$this->db=new \PDO('mysql:host='.getenv('HOSTNAME').';
				dbname='.getenv('DBNAME'), getenv('USER'), getenv('PASSWORD'));
		}

		catch(Exeption $e)
		{
			die('Erreur : '.$e->get>getMessage());
		}
	}

	public function connect()
	{
		$this->config();
	}
}