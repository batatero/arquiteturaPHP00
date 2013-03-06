<?php
class MariaDAO extends GenericDAO
{
	public static $name = 'MariaDAO';
	public function __construct(){
		$this->reflection = 'maria'; 
	}	
}