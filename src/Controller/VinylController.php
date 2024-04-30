<?php

namespace App\Controller;

use App\Repository\VinylMixRepository;
use Doctrine\ORM\EntityManagerInterface;
use function Symfony\Component\String\u;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class VinylController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    function homepage(): Response
    {
        $tracks = [
            ['song' => 'Gangsta\'s Paradise', 'artist' => 'Coolio'],
            ['song' => 'Waterfalls', 'artist' => 'TLC'],
            ['song' => 'Creep', 'artist' => 'Radiohead'],
            ['song' => 'Kiss from a Rose', 'artist' => 'Seal'],
            ['song' => 'On Bended Knee', 'artist' => 'Boyz II Men'],
            ['song' => 'Fantasy', 'artist' => 'Mariah Carey'],
        ];
        return $this->render('vinyl/homepage.html.twig', [
            'title' => 'PB & Jams',
            'tracks' => $tracks,
        ]);
    }
    #[Route('/browse/{slug}', name: 'app_browse')]
    public function browse(VinylMixRepository $mixRepository,string $slug = null): Response
    {
        $genre = $slug ? u(str_replace('-', ' ', $slug))->title(true) : null;
        $mixes = $mixRepository->findBy([],['votes'=>'DESC']);
        return $this->render('vinyl/browse.html.twig', [
            'genre' => $genre,
            'mixes' => $mixes,
        ]);
    }
}
