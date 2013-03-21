<?php
class UsuarioFacade {

	public function getUsuario( $id ) {
		return FactoryBusiness::getInstance('usuarioBusiness')->getUsuario( $id );
	}
	
	public function persistirUsuario( Usuario $usuario ) {
		return FactoryBusiness::getInstance('usuarioBusiness')->persistirUsuario( $usuario );
	}
	
}