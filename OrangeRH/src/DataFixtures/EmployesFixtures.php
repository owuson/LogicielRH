<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Employes;

class EmployesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i = 1; $i <= 100; $i++)
        {
            $employes = new Employes();
            $employes->setNom("Nom de l'employé $i");
            $employes->setPrenom("Prenom de l'employé $i");
            $employes->setAge($i);
            $employes->setAdresse("Adresse de l'employé $i");
            $employes->setDateArrive(new \DateTime());
            $employes->setEchelon($i);
            $employes->setService("Service de l'employe $i");
            $employes->setSalaire($i);
            $employes->setCongeRestant($i);
            $manager->persist($employes);
        }

        $manager->flush();
    }
}
