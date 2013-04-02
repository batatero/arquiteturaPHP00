<?php
/**
 * 
 * @author Alessandro de souza taborda ribas
 *
 */
class UsuarioDAO extends GenericDAO
{
	public function __construct(){
		$this->reflection = 'usuario';
		parent::__construct();
		
	}	
}