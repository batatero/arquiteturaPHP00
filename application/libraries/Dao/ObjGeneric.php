<?php
	class ObjGeneric
	{
		protected $model;
		
		function __construct( $id = null,$tipoConstrutor = null ) {
		
			try {
				//verifica se o programador passou um tipo do parametro errado
				if( isset($id) AND !is_numeric($id) ) {
					throw new Exception('Você deve passar o parametro $id do tipo numeric!');
				}
					
				if($tipoConstrutor != null) {
					if( !is_string($tipoConstrutor) ){
						throw new Exception('Você deve passar o parametro $tipoConstrutor como uma string!');
					} elseif ( !preg_match("(^setDados)", $tipoConstrutor) ) {
						throw new Exception('a variavel $tipoConstrutor deve conter um tipo valido contendo no inicio do nome a palavra setDados');
					}
				}
			} catch (Exception $e ){
				trigger_error(utf8_decode($e->getMessage()), E_USER_ERROR);
				throw new Exception(utf8_decode($e->getMessage()));
			}
		}
		
		public function getDados() {

			$dados = array();

			foreach ( get_class_vars(get_called_class()) as $C => $V ) {
				//verifica se o atributo é um objeto
				if ( is_object($this->$C) ) {
					$dados[$C] = $this->$C->getDados();
				} elseif ( is_array($this->$C) ) {
					foreach ($this->$C as $chaveList => $valorList ) {
						$dados[$C][$chaveList] = $valorList->getDados();
					}
				} else {
					$dados[$C] = $this->$C;
				}
			}

			return $dados;
		}
//------------------------------------------------------------//

		public function getDadosJson() {
		
			$dados = array();
		
			foreach ( get_class_vars(get_called_class()) as $C => $V ) {
// 				//verifica se o atributo é um objeto
				if ( is_object($this->$C) ) {
					$dados[$C] = $this->$C->getDadosJson();
				} else {
					$dados[$C] = $this->$C;
				}
			}
			return json_encode($dados);
		}
//------------- metodos para buscar o obj --------------------//
		/**
		 * Seta os dados do Objeto buscando pelo id passao 
		 * por parametro
		 * 
		 * @param unknown_type $id
		 */
		public function setDados( $id = null ) {
			//busca os dados do usuario
			$dados = $this->getCI()->{$this->model}->find($id)->result();

			if( count($dados) > 0 ) {
				//seta os atributos da classe
				foreach($dados[0] as $C => $V) {
					$this->__set($C, $V);
				}		
			} else {
				return false;
			}
		
		}

// ------------- metodos para manter o obj --------------------//

		protected function insert( $required = array(), $set = array() ) {
			$this->_required($required);
			foreach ( get_class_vars(get_called_class()) as $C => $V ) {
				if ( in_array($C, $set) ) {
					$options[$C] = $this->$C;
				}
			}
			return $this->getCI()->{$this->model}->insert( $options );
		}


		protected function update( $required = array(), $set = array(), $id ) {

			$this->_required($required);
			$this->_required( array($id) );
			foreach ( get_class_vars(get_called_class()) as $C => $V ) {
				if ( in_array($C, $set) ) {
					$options[$C] = $this->$C;
				}
			}

			return $respUpdate = $this->getCI()->{$this->model}->update($options, $this->$id);


		}

		public function delete($id = null){
			$this->_required( array($id) );
			return $this->getCI()->{$this->model}->delete($this->$id);
		}

//------------- metodos para o funcionamento da estrutura --------------------//

		//instancia da model e do core do code CI
		protected function getCI () {
			$CI = &get_instance();
			return $CI;
		}

		protected function _required( $data = array() ) {
			if( count($data) > 0 ) {
				foreach ( $data as $field ) {
					if ( $this->$field == NULL ) {
						trigger_error('Atributo \''.$field.'\' vazio', E_USER_ERROR);
						throw new Exception('Atributo \''.$field.'\' vazio');
						return false;
						break;
					}
				}
			}
			return true;
		}

		/*
		 * verifica se o campo atributo do objeto foi setado e retorna falso 
		 */
		protected function _requiredEstruct( $data = array() ) {
			//verifica se foi passado algum campo para ser verificado
			if( count($data) > 0 ) {
				//percorrer os atributos do objeto 
				foreach ( $data as $field ) {
					//verifica se algum dos atributos nulo caso seja retorna falso
					if ( $this->$field == NULL ) {
						return false;
						break;
					}
				}
			}
			return true;
		}

		//method magico para  acessar as variaveis
		public function __set( $var, $val ) {
			$this->$var = $val;
		}

		public function __get( $var ) {
			return $this->$var;
		}
	}
?>