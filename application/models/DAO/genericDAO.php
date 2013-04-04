<?php
/**
 *
 * @author Alessandro de souza taborda ribas
 *
 */
abstract class GenericDAO {
	//variavel que será usada para fazer o reflection da classe que está sendo trabalhada
	protected $reflection;
	private $CI;
	
	public function __construct() {
		$this->CI = &get_instance();
		$this->CI->load->model('Entities/'.$this->reflection, $this->reflection );
	}

	public function persist( $obj ) {
		
		$this->CI->doctrine->em->persist( $obj );
		$this->CI->doctrine->em->flush();
		
		return true;
	}
	
	public function findAll(){
		$listUsuarios = $this->CI->doctrine->em->getRepository($this->reflection)->findAll();
		$this->CI->doctrine->em->flush();
		
		return $listUsuarios;
	}
	
	public function findById( $id ) {
		$obj = $this->CI->doctrine->em->find('usuario',$id);
		$this->CI->doctrine->em->flush();
		return $obj;
	}
	
	public function remove( $obj ){
		$obj = $this->CI->doctrine->em->remove( $obj );
		$this->CI->doctrine->em->flush(); // Executes all deletions.
		return $obj;
	}
}