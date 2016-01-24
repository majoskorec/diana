<?php

namespace Spk\Bundle\HuntingGroundBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Spk\Bundle\CommonBundle\Entity\BaseEntity;

/**
 * @ORM\Table(name="spk_area")
 * @ORM\Entity
 */
class Area extends BaseEntity
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
     * @var AreaType
     *
     * @ORM\ManyToOne(targetEntity="AreaType")
     * @ORM\JoinColumn(name="area_type_code", referencedColumnName="code")
     */
    protected $areaType;

    /**
     * @var HuntingGround[]
     *
     * @ORM\OneToMany(targetEntity="HuntingGround", mappedBy="area")
     */
    protected $huntingGrounds;

// -- php app/console doctrine:generate:entities SpkHuntingGroundBundle:Area

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
     * @return Area
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
     * @return Area
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
     * @return Area
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
     * Set areaType
     *
     * @param \Spk\Bundle\HuntingGroundBundle\Entity\AreaType $areaType
     *
     * @return Area
     */
    public function setAreaType( \Spk\Bundle\HuntingGroundBundle\Entity\AreaType $areaType = null )
    {
        $this->areaType = $areaType;

        return $this;
    }

    /**
     * Get areaType
     *
     * @return \Spk\Bundle\HuntingGroundBundle\Entity\AreaType
     */
    public function getAreaType()
    {
        return $this->areaType;
    }

    /**
     * Add huntingGround
     *
     * @param \Spk\Bundle\HuntingGroundBundle\Entity\HuntingGround $huntingGround
     *
     * @return Area
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
