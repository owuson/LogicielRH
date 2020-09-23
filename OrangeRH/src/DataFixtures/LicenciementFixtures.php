<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Licenciement;

class LicenciementFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i = 1; $i <= 100; $i++)
        {
            $licenciement = new licenciement();
            $licenciement -> setDate(new \DateTime());
            $licenciement -> setRaison("Car c'est une merde");
            $manager->persist($licenciement);
        }
        $manager->flush();
    }
}
