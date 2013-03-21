<?php
class usuarioBusiness {
	
	public function getUsuario( $id ) {
		
		return $usuario = FactoryDAO::getInstance('usuarioDAO')->findById($id);
	}
	
	public function persistirUsuario( Usuario $usuario ) {
		return FactoryDAO::getInstance('usuarioDAO')->persist( $usuario );
	}
}