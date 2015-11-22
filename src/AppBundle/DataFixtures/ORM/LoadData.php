<?php

namespace AppBundle\DataFixtures\ORM;
/**
 * Created by PhpStorm.
 * User: emilychen
 * Date: 22/11/2015
 * Time: 5:54 PM
 */
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Area;
use AppBundle\Entity\Property;
use AppBundle\Entity\PropertyType;
use AppBundle\Entity\Suburb;


class LoadData implements FixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $propertyType1 = new PropertyType();
        $propertyType1->setName('house');

        $suburb1 = new Suburb();
        $suburb1->setName('Bentleigh');

        $property1 = new Property();
        $property1->setLandSize('230');
        $property1->setNumberOfBathRoom(2);
        $property1->setComment('near highway');
        $property1->setSoldPrice(750000);
        $property1->setAddress('4 Milton Street Bentleigh');
        $property1->setPropertyType($propertyType1);
        $property1->setSuburb($suburb1);

        $area1 = new Area();
        $area1->setName('kitchen');
        $area1->setLength(5.2);
        $area1->setWidth(4);
        $area1->setProperty($property1);

        $area2 = new Area();
        $area2->setName('living Room');
        $area2->setLength(3.45);
        $area2->setWidth(4.23);
        $area2->setProperty($property1);

        $area3 = new Area();
        $area3->setName('bed room');
        $area3->setProperty($property1);
        $area3->setWidth(3.45);
        $area3->setLength(4.12);

        $property1->addArea($area1);
        $property1->addArea($area2);
        $property1->addArea($area3);

        $manager->persist($propertyType1);
        $manager->persist($suburb1);
        $manager->persist($area1);
        $manager->persist($area2);
        $manager->persist($area3);
        $manager->persist($property1);
        $manager->flush();
    }

}