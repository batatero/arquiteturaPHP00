<?php
class FactoryBusiness {
	private static $instance = null;
	
	public static function getInstance( $objName ) {
		
		//carrega o  objeto que vai ser instanciado
		self::getCI()->load->model('business/'.$objName);
		
		//verifica se ja existe uma stancia de um DAO
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