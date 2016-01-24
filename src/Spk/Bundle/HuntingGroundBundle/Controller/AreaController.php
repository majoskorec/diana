<?php

namespace Spk\Bundle\HuntingGroundBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Oro\Bundle\SecurityBundle\Annotation\Acl;
use Oro\Bundle\SecurityBundle\Annotation\AclAncestor;
use Oro\Bundle\SoapBundle\Entity\Manager\ApiEntityManager;
use Spk\Bundle\HuntingGroundBundle\Entity\Area;

/**
 * @Route("/area")
 */
class AreaController extends Controller
{

    /**
     * @Route("/view/{id}", name="spk_huntingground_area_view", requirements={"id"="\d+"})
     * @Method({"GET"})
     * @Acl(
     *      id="spk_huntingground_area_view",
     *      type="entity",
     *      permission="VIEW",
     *      class="SpkHuntingGroundBundle:Area"
     * )
     * @Template()
     */
    public function viewAction( Area $entity )
    {
        return array('entity' => $entity);
    }

    /**
     * @Route(
     *      "/{_format}",
     *      name="spk_huntingground_area_index",
     *      requirements={"_format"="html|json"},
     *      defaults={"_format" = "html"}
     * )
     * @Method({"GET"})
     * @AclAncestor("spk_huntingground_area_view")
     * @Template
     */
    public function indexAction()
    {
        return [
            'entity_class' => $this->container->getParameter( 'spk_hunting_ground.area.entity.class' )
        ];
    }

    /**
     * @return ApiEntityManager
     */
    protected function getManager()
    {
        return $this->get( 'spk_hunting_ground.area.manager.api' );
    }

}
