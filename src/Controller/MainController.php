<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    private $articulos = [
        [
            'id' => 1,
            'title' => 'Articulo 1',
            'created' => '2021-10-01',
        ],
        [
            'id' => 2,
            'title' => 'Articulo 2',
            'created' => '2021-10-02',
        ],
        [
            'id' => 3,
            'title' => 'Articulo 3',
            'created' => '2021-10-03',
        ],
        [
            'id' => 4,
            'title' => 'Articulo 4',
            'created' => '2021-10-04',
        ],
        [
            'id' => 5,
            'title' => 'Articulo 5',
            'created' => '2021-10-05',
        ]
    ];

    #[Route('/articulos', name: 'app_main')]
    public function show_articulos(): Response
    {
        return $this->render('articulos.html.twig', [
            'articulos' => $this->articulos
        ]);
    }


    #[Route('/articulo/{id}', name: 'app_main_id')]
    public function find_articulo($id = 2): Response
    {
        $articulo = array_filter($this->articulos, function ($a) use ($id) {
            return $a['id'] == $id;
        });

        return $this->render('articulo.html.twig', [
            'articulo' => array_pop($articulo)
        ]);
    }
}
