<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ListeExcuseRepository;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ListeExcuseRepository $excuseRepository): Response
    {
        // Récupérer une excuse au hasard depuis le repository
        $excuse = $excuseRepository->getRandomExcuse();

        return $this->render('home/index.html.twig', [
            'excuse' => $excuse,
        ]);
    }

    #[Route('/export', name: 'app_export')]
    public function exportData(ListeExcuseRepository $excuseRepository): Response
    {
    // Récupérer toutes les excuses depuis le repository
    $excuses = $excuseRepository->findAll();

    // Créer un tableau avec les en-têtes des colonnes
    $csvData = [
        ['ID', 'HTTP Code', 'Tag', 'Message']
    ];

    // Remplir le tableau avec les données des excuses
    foreach ($excuses as $excuse) {
        $csvData[] = [
            $excuse->getId(),
            $excuse->getHttpCode(),
            $excuse->getTag(),
            $excuse->getMessage()
        ];
    }

    // Créer un fichier CSV temporaire
    $tempFilePath = tempnam(sys_get_temp_dir(), 'excuses_');
    $handle = fopen($tempFilePath, 'w');
    foreach ($csvData as $line) {
        fputcsv($handle, $line);
    }
    fclose($handle);

    // Envoyer le fichier CSV en tant que réponse
    return $this->file($tempFilePath, 'excuses.csv');
}

}
