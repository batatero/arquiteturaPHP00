<?php



use Doctrine\Mapping as ORM;

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
     * @var float
     *
     * @Column(name="us_salario", type="decimal", nullable=false)
     */
    private $usSalario;


}
