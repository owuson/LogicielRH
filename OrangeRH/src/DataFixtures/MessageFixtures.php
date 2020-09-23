<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Message;

class MessageFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i = 1; $i <= 100; $i++)
        {
            $message = new message();
            $message->setContenu("Apero !");
            $message->setStatut(true);
            $message->setDate(new \DateTime());
            $manager->persist($message);
        }
        $manager->flush();
    }
}
