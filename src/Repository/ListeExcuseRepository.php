<?php

namespace App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\ListeExcuse;

class ListeExcuseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ListeExcuse::class);
    }

  
    public function getRandomExcuse(): ?ListeExcuse
    {
        $excuses = $this->findAll(); // Récupérer toutes les excuses depuis la base de données
        $randomIndex = array_rand($excuses); // Sélectionner un index aléatoire
        return $excuses[$randomIndex]; // Retourner l'excuse correspondant à l'index aléatoire
    }
}

