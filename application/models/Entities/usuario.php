<?php




/**
 * Usuario
 *
 * @Table(name="usuario")
 * @Entity
 */
class Usuario
{
    /**
     * @var integer
     *
     * @Column(name="usuario_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $usuarioId;

    /**
     * @var string
     *
     * @Column(name="us_nome", type="string", length=45, nullable=false)
     */
    private $usNome;

    /**
     * @var string
     *
     * @Column(name="us_cod", type="string", length=45, nullable=false)
     */
    private $usCod;

    //method magico para  acessar as variaveis
    public function __set( $var, $val ) {
    	$this->$var = $val;
    }
    
    public function __get( $var ) {
    	return $this->$var;
    }
}
