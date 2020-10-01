<?php

namespace App\DataFixtures;

use App\Entity\Conges;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class CongesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');
        for($i = 1; $i <= 100; $i++)
        {
            $conges = new Conges();
            $conges-> setJourDemande($i);
            $conges->setJourRestant($i-1);
            $conges->setStatut(true);
            $conges->setDateDemande($faker->dateTime());
            $manager->persist($conges);
        }
        $manager->flush();
    }
}
