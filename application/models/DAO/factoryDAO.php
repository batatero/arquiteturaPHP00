<?php
include ('application/models/DAO/genericDAO.php');


class FactoryDAO {
	
	private static $instance = null;
	
	public static function getInstance( $objName ) {
		
		self::getCI()->load->model('DAO/implementDAO/'.$objName);
		
		//carrega o  objeto que vai ser instanciado
		if ( (self::$instance == null) OR !($objName instanceof $objName) ) { 
			self::$instance = new $objName();
		}
		
		return self::$instance;
	}
	
	//instancia da model e do core do code CI
	protected static function getCI () {
		$CI = &get_instance();
		return $CI;
	}
}