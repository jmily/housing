<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PropertyController extends Controller
{

    /**
     * @Route("/property/{id}", name="property")
     */
    public function indexAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $property = $em->getRepository('AppBundle:Property')->find($id);

        if ($property == null) {
            throw $this->createNotFoundException(
                'No Property found'
            );
        }
        else
        {
            return $this->render('property.html.twig', array('property'=>$property));
        }
    }
}
