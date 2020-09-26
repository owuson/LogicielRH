<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Employes;
use App\Entity\Conges;
use App\Entity\FicheDePaie;
use App\Entity\Message;

class EmployesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');

        for($i = 1; $i <= 100; $i++)
        {
            $employes = new Employes();
            $employes->setNom($faker->lastName());
            $employes->setPrenom($faker->firstName());
            $employes->setAge($i);
            $employes->setAdresse($faker->address());
            $employes->setDateArrive($faker->dateTime());
            $employes->setEchelon($i);
            $employes->setService($faker->jobTitle());
            $employes->setSalaire($i);
            $employes->setCongeRestant($i);
            $employes->setEmail($faker->freeEmail());
            $manager->persist($employes);
        }

        $manager->flush();
    }
}
