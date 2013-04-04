<?php
include ('application/models/DAO/genericDAO.php');


class FactoryDAO {
	
	private static $instance = null;
	private static $CI = null;
	
	public static function getInstance( $objName ) {
		
		//recebe a instacia do CI
		if ( self::$CI == null ) {
			self::$CI = self::getCI();
		}
		
		//carrega o  objeto que vai ser instanciado
		self::$CI->load->model('DAO/implementDAO/'.$objName);
		
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