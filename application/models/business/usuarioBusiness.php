<?php
/**
 * 
 * @author Alessandro de souza taborda ribas
 *
 */
class usuarioBusiness {
	public function getUsuario( $id ) {
		return $usuario = FactoryDAO::getInstance('usuarioDAO')->findById($id);
	}
	
	public function persistirUsuario( Usuario $usuario ) {
		//chama a DAO de usuarios pela factory
		$usuarioDAO = FactoryDAO::getInstance('usuarioDAO');
		//salva o usuario no banco
		return $usuarioDAO->persist( $usuario );
	}
	
	public function somaSalarioFuncionarios() {
		//inicia variaveis
		$salarioTotal = 0;
		
		//chama a DAO de usuarios pela factory
		$usuarioDAO = FactoryDAO::getInstance('usuarioDAO');
		
		//lista todos os usuario
		$listUsuarios = $usuarioDAO->findAll();
		
		//percorre os usuario e soma os sarios 
		foreach ($listUsuarios as $usuarioChave => $usuarioValor ) {
			$salarioTotal += $usuarioValor->__get('usSalario');
		}
		
		return $salarioTotal;
	}
}