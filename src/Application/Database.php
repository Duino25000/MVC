<?php

namespace App\Application;

use App\Application\DatabaseConfig;

class fbsql_database
{
	/**
	*PDO_STATEMENT
	*/
	private $sth;

	public function_construct()
	{
		$this->connect();
	}

	protected function prepare(string $sql):void
	{
		$this->sth = $this->db->prepare($sql);
	}

	protected function bindParam(string $param, $var, $type):void
	{
		$this->sth->bindParam( $param, $var, $type);
	}

	protected function execute():void
	{
		$this->sth->execute();
	}

	protected function fetchALL():array
	{
		return $this->sth->fetchALL(\PDO::FETCH_ASSOC);
	}

	protected function fetch():array
	{
		return $this->sth->fetch(\PDO::FETCH_ASSOC);
	}
} 