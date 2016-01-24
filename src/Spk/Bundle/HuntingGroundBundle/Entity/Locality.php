<?php

namespace Spk\Bundle\HuntingGroundBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Spk\Bundle\CommonBundle\Entity\BaseEntity;

/**
 * @ORM\Table(name="spk_locality")
 * @ORM\Entity
 */
class Locality extends BaseEntity
{

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=64, unique=true)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="shortname", type="string", length=64, unique=true)
     */
    protected $shortname;

    /**
     * @var LocalityType
     *
     * @ORM\ManyToOne(targetEntity="LocalityType")
     * @ORM\JoinColumn(name="locality_type_code", referencedColumnName="code")
     */
    protected $localityType;

    /**
     * @var HuntingGround[]
     * 
     * @ORM\ManyToMany(targetEntity="HuntingGround", mappedBy="localities")
     */
    protected $huntingGrounds;

// -- php app/console doctrine:generate:entities SpkHuntingGroundBundle:Locality

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->huntingGrounds = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Locality
     */
    public function setId( $id )
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Locality
     */
    public function setName( $name )
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set shortname
     *
     * @param string $shortname
     *
     * @return Locality
     */
    public function setShortname( $shortname )
    {
        $this->shortname = $shortname;

        return $this;
    }

    /**
     * Get shortname
     *
     * @return string
     */
    public function getShortname()
    {
        return $this->shortname;
    }

    /**
     * Set localityType
     *
     * @param \Spk\Bundle\HuntingGroundBundle\Entity\LocalityType $localityType
     *
     * @return Locality
     */
    public function setLocalityType( \Spk\Bundle\HuntingGroundBundle\Entity\LocalityType $localityType = null )
    {
        $this->localityType = $localityType;

        return $this;
    }

    /**
     * Get localityType
     *
     * @return \Spk\Bundle\HuntingGroundBundle\Entity\LocalityType
     */
    public function getLocalityType()
    {
        return $this->localityType;
    }

    /**
     * Add huntingGround
     *
     * @param \Spk\Bundle\HuntingGroundBundle\Entity\HuntingGround $huntingGround
     *
     * @return Locality
     */
    public function addHuntingGround( \Spk\Bundle\HuntingGroundBundle\Entity\HuntingGround $huntingGround )
    {
        $this->huntingGrounds[] = $huntingGround;

        return $this;
    }

    /**
     * Remove huntingGround
     *
     * @param \Spk\Bundle\HuntingGroundBundle\Entity\HuntingGround $huntingGround
     */
    public function removeHuntingGround( \Spk\Bundle\HuntingGroundBundle\Entity\HuntingGround $huntingGround )
    {
        $this->huntingGrounds->removeElement( $huntingGround );
    }

    /**
     * Get huntingGrounds
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getHuntingGrounds()
    {
        return $this->huntingGrounds;
    }

}
