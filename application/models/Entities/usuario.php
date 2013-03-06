<?php
/**
*
* @Entity
* @Table(name="usuario")
*/
class usuario
{
	/**
	* @Id @Column(type="integer")
	* @GeneratedValue(strategy="IDENTITY")
	*/
	public $id = 0;
	/**
	* @Column(type="string", columnDefinition="VARCHAR(50) NOT NULL")
	*/
	public $nome = 0;
	/**
	* @Column(type="string", columnDefinition="VARCHAR(50) NOT NULL")
	*/
	public $email = 0;
	/**
	* @Column(type="string", length=32, nullable=true)
	* @var type
	*/
	public $telefone = '';
	/**
	* @Column(type="string", length=32, nullable=true)
	* @var type
	*/
	public $celular = '';
	
	public function __construct(){
		$this->reflection = 'usuario';
	}

}