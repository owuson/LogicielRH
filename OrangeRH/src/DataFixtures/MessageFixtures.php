<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Message;

class MessageFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');

        for($i = 1; $i <= 50; $i++)
        {
            $contenu = '<p>'.join($faker->paragraphs(3), '</p><p>').'</p>';
            $message = new message();
            $message->setTitre($faker->sentence());
            $message->setDate($faker->dateTime());
            $message->setContenu($contenu);
            $message->setStatut(true);
            $manager->persist($message);

        }
        $manager->flush();
    }
}
