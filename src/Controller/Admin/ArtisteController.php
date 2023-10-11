<?php

namespace App\Controller\Admin;

use App\Repository\ArtisteRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArtisteController extends AbstractController
{
    /**
     * @Route("/admin/artistes", name="admin_artistes", methods={"GET"})
     */
    public function listeArtistes(ArtisteRepository $repo, PaginatorInterface $paginator, Request $request): Response
    {
        $artiste = $paginator->paginate(
            $repo->listeArtisteComplete(),
            $request->query->getInt('page', 1),
            9
        );
        return $this->render('admin/artiste/listeArtistes.html.twig', [ 
            'lesArtistes' => $artiste
        ]);
    }
}
