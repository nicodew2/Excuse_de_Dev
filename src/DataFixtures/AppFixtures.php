<?php



namespace App\DataFixtures;

use App\Entity\ListeExcuse;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $data = require 'src/Data/data.php'; // chemin vers votre fichier data.php 
        //créer les fixture pour remplir la base de donnée
        foreach ($data as $item) {
            $phrase = new ListeExcuse();
            $phrase->setHttpCode($item['http_code']); 
            $phrase->setMessage($item['message']);
            $manager->persist($phrase);
        }

        $manager->flush();
    }
}


