<?php

namespace App\Model;

use App\Application\Database;

class Produits extends Database
{
	/**
 	* @var int
 	*/
 	private $id;

 	/**
 	* @var string
 	*/
 	private $designation;

 	/**
 	* @var float
 	*/
 	private $price;
	

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * @param string $designation
     *
     * @return self
     */
    public function setDesignation($designation)
    {
        $this->designation = $designation;
        return $this;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param float $price
     *
     * @return self
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    public function add(string $designation, float $price){
    	$sql= 'insert into produits(designation, price) 
    		values(:designtion, :price)';
    	$this->prepare( $sql );
    	$this->bindParam(':designation', $designation, \PDO::PARAM_STR);
    	$this->bindParam(':price', $price, \PDO::PARAM_STR);
    	$this->execute();
    }

    public function delete( int $id )
    {
    	$sql = 'delete from produit where id=id';
    	$this->prepare($sql);
    	$this->bindParam(':id', $id, \PDO::PARAM_INT);
    	$this->execute();
    }

    public function edit( int $id, string $designation, float $price)
    {
    	$sql = 'update produits set designation=:designation, price=:price
    			where id=:id';
    	$this->prepare($sql);
    	$this->bindParam(':id', $id, \PDO::PARAM_INT);
    	$this->bindParam(':designation', $designation, \PDO::PARAM_STR);
    	$this->bindParam(':price', $price, \PDO::PARAM_STR);
    	$this->execute();
    }

    public function getAll()
    {
    	$sql = 'select id, designation, price
    			from produits';
    	$this->prepare($sql);
    	$this->execute();
    	return $this->fetchALL();
    }

    public function getONE(int $id)
    {
    	$sql = 'select id, designation, price
    			from produits where id=:id';
    	$this->prepare($sql);
    	$this->bindParam(':id', $id, \PDO::PARAM_INT);
    	$this->execute();
    	return $this->fetch();
    }

}