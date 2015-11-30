<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Property;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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


    /**
     * @Route("/new/property", name="new_property")
     */
    public function newAction(Request $request)
    {
        $suburbId = $request->request->get('suburb');
        $suburb = $this->getDoctrine()->getRepository('AppBundle:Suburb')->find($suburbId);

        $propertyTypeId = $request->request->get('propertyType');
        $propertyType = $this->getDoctrine()->getRepository('AppBundle:PropertyType')->find($propertyTypeId);


        $property = new Property();

        $property->setSuburb($suburb);
        $property->setPropertyType($propertyType);

        $landSize = $request->request->get('landSize');
        $numberOfBathroom = $request->request->get('numberOfBathroom');
        $comment = $request->request->get('comment');
        $soldPrice = $request->request->get('soldPrice');

        $property->setLandSize($landSize);
        $property->setNumberOfBathRoom($numberOfBathroom);
        $property->setComment($comment);
        $property->setSoldPrice($soldPrice);


        $em = $this->getDoctrine()->getManager();

        $em->persist($property);
        $em->flush();

        return $this->render('property.html.twig', array('property'=>$property));
    }
}
