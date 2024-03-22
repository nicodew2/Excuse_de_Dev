<?php



namespace App\DataFixtures;

use App\Entity\ListeExcuse;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $data = require 'src/Data/data.php'; // Assurez-vous que le chemin vers votre fichier data.php est correct

        foreach ($data as $item) {
            $phrase = new ListeExcuse();
            $phrase->setHttpCode($item['http_code']); // Assurez-vous que les noms des clés sont corrects
            $phrase->setTag($item['tag']);
            $phrase->setMessage($item['message']);
            $manager->persist($phrase);
        }

        $manager->flush();
    }
}


