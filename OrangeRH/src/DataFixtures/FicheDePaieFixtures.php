<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\FicheDePaie;

class FicheDePaieFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i = 1; $i <= 1000; $i++)
        {
            $ficheDePaie = new ficheDePaie();
            $ficheDePaie->setSalaireHoraire($i);
            $ficheDePaie->setSalaire(2800);
            $ficheDePaie->setHeureTravaille(150);
            $ficheDePaie->setCongesRestant($i);
            $ficheDePaie->setSalaireBrut(3100);
            $ficheDePaie->setDateArrive(new \DateTime());
            $ficheDePaie->setSalaireHoraire(18.7);           
            $manager->persist($ficheDePaie);
        }

        $manager->flush();
    }
}
