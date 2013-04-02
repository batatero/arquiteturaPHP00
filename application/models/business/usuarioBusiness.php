<?php
class usuarioBusiness {
	private $usuarioDAO;
	public function getUsuario( $id ) {
		return $usuario = FactoryDAO::getInstance('usuarioDAO')->findById($id);
	}
	
	public function persistirUsuario( Usuario $usuario ) {
		$usuarioDAO = FactoryDAO::getInstance('usuarioDAO');
		return $usuarioDAO->persist( $usuario );
	}
	
	public function somaSalarioFuncionarios() {
		$usuarioDAO = FactoryDAO::getInstance('usuarioDAO');
		$listUsuarios = $usuarioDAO->findAll();
	}
}