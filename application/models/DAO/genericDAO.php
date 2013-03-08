<?php
abstract class GenericDAO {
	//variavel que será usada para fazer o reflection da classe que está sendo trabalhada
	protected $reflection;
	
	public function __construct(){
		$this->getCI()->load->model('Entities/'.$this->reflection, $this->reflection );
	}

	public function persist( $obj ) {
		$this->getCI()->doctrine->em->persist( $obj );
		$this->getCI()->doctrine->em->flush();
	}
	
	public function findById( $id ) {
		$obj = $this->getCI()->doctrine->em->find('usuario',$id);

		$this->getCI()->doctrine->em->flush();
		return $obj;
	}
	
	public function remove( $obj ){
		$obj = $this->getCI()->doctrine->em->remove( $obj );
		$this->getCI()->doctrine->em->flush(); // Executes all deletions.
	}
	
	//instancia da model e do core do code CI
	protected function getCI () {
		$CI = &get_instance();
		return $CI;
	}
}