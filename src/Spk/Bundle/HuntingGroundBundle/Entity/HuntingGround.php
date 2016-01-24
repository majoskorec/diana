<?php

namespace Spk\Bundle\HuntingGroundBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Oro\Bundle\OrganizationBundle\Entity\Organization;
use Spk\Bundle\CommonBundle\Entity\BaseEntity;

/**
 * @ORM\Table(name="spk_hunting_ground")
 * @ORM\Entity
 */
class HuntingGround extends BaseEntity
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
     * @ORM\Column(name="name", type="string", length=255)
     * @Assert\NotBlank()
     */
    protected $name;

    /**
     * @var Organization
     *
     * @ORM\ManyToOne(targetEntity="Oro\Bundle\OrganizationBundle\Entity\Organization")
     * @ORM\JoinColumn(name="organization_id", referencedColumnName="id")
     */
    protected $organization;

    /**
     * @var Area
     *
     * @ORM\ManyToOne(targetEntity="Area", inversedBy="huntingGrounds")
     * @ORM\JoinColumn(name="area_id", referencedColumnName="id")
     */
    protected $area;

    /**
     * @var Locality[]
     *
     * @ORM\ManyToMany(targetEntity="Locality", inversedBy="huntingGrounds")
     * @ORM\JoinTable(name="spk_hunting_group_locality",
     *      joinColumns={@ORM\JoinColumn(name="hunting_ground_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="locality_id", referencedColumnName="id")}
     * )
     */
    protected $localities;

// -- php app/console doctrine:generate:entities SpkHuntingGroundBundle:HuntingGround

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->localities = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set id
     *
     * @param integer $id
     *
     * @return HuntingGround
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
     * @return HuntingGround
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
     * Set organization
     *
     * @param \Oro\Bundle\OrganizationBundle\Entity\Organization $organization
     *
     * @return HuntingGround
     */
    public function setOrganization( \Oro\Bundle\OrganizationBundle\Entity\Organization $organization = null )
    {
        $this->organization = $organization;

        return $this;
    }

    /**
     * Get organization
     *
     * @return \Oro\Bundle\OrganizationBundle\Entity\Organization
     */
    public function getOrganization()
    {
        return $this->organization;
    }

    /**
     * Set area
     *
     * @param \Spk\Bundle\HuntingGroundBundle\Entity\Area $area
     *
     * @return HuntingGround
     */
    public function setArea( \Spk\Bundle\HuntingGroundBundle\Entity\Area $area = null )
    {
        $this->area = $area;

        return $this;
    }

    /**
     * Get area
     *
     * @return \Spk\Bundle\HuntingGroundBundle\Entity\Area
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * Add locality
     *
     * @param \Spk\Bundle\HuntingGroundBundle\Entity\Locality $locality
     *
     * @return HuntingGround
     */
    public function addLocality( \Spk\Bundle\HuntingGroundBundle\Entity\Locality $locality )
    {
        $this->localities[] = $locality;

        return $this;
    }

    /**
     * Remove locality
     *
     * @param \Spk\Bundle\HuntingGroundBundle\Entity\Locality $locality
     */
    public function removeLocality( \Spk\Bundle\HuntingGroundBundle\Entity\Locality $locality )
    {
        $this->localities->removeElement( $locality );
    }

    /**
     * Get localities
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLocalities()
    {
        return $this->localities;
    }

}
