<?php
/**
 *
 * @author Alessandro de souza taborda ribas
 *
 */
abstract class GenericDAO {
	//variavel que será usada para fazer o reflection da classe que está sendo trabalhada
	protected $reflection;
	
	public function __construct(){
		$this->getCI()->load->model('Entities/'.$this->reflection, $this->reflection );
	}

	public function persist( $obj ) {
		
		$this->getCI()->doctrine->em->persist( $obj );
		$this->getCI()->doctrine->em->flush();
		
		return true;
	}
	
	public function findAll(){
		$listUsuarios = $this->getCI()->doctrine->em->getRepository($this->reflection)->findAll();
		$this->getCI()->doctrine->em->flush();
		
		return $listUsuarios;
	}
	
	public function findById( $id ) {
		$obj = $this->getCI()->doctrine->em->find('usuario',$id);
		$this->getCI()->doctrine->em->flush();
		return $obj;
	}
	
	public function remove( $obj ){
		$obj = $this->getCI()->doctrine->em->remove( $obj );
		$this->getCI()->doctrine->em->flush(); // Executes all deletions.
		return $obj;
	}
	
	//instancia da model e do core do code CI
	protected function getCI () {
		$CI = &get_instance();
		return $CI;
	}
}