<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class IndexController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $properties = $em->getRepository('AppBundle:Property')->findAll();
        $suburbs = $em->getRepository('AppBundle:Suburb')->findAll();
        $propertyTypes = $em->getRepository('AppBundle:PropertyType')->findAll();

        return $this->render('index.html.twig',
                                array(
                                        'properties'=>$properties,
                                        'suburbs' => $suburbs,
                                        'propertyTypes' => $propertyTypes
                                     )
        );
    }

}
