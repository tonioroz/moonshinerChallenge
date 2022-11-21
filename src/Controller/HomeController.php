<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function index(ProductRepository $productRepository): Response
    {
        $colors = [];
        $productsAll = $productRepository->findAll();

        foreach ($productsAll as $product)
        {
            $desc = $product->getDescription();
            $color = 'hoodie_';

            if(str_contains($desc, 'blue')) { $color .= 'blue'; }
            elseif(str_contains($desc, 'red')) { $color .= 'red'; }
            elseif(str_contains($desc, 'yellow')) { $color .= 'yellow'; }
            elseif(str_contains($desc, 'black')) { $color .= 'black'; }
            elseif(str_contains($desc, 'green')) { $color .= 'green'; }
            elseif(str_contains($desc, 'pink')) { $color .= 'pink'; }
            elseif(str_contains($desc, 'violet')) { $color .= 'violet'; }
            elseif(str_contains($desc, 'dark')) { $color .= 'dark'; }
            elseif(str_contains($desc, 'emerald')) { $color .= 'emerald'; }
            elseif(str_contains($desc, 'gray')) { $color .= 'gray'; }
            elseif(str_contains($desc, 'jay')) { $color .= 'jay'; }
            elseif(str_contains($desc, 'plum')) { $color .= 'plum'; }
            elseif(str_contains($desc, 'white')) { $color .= 'white'; }
            else { $color = 'no_image'; }

            $colors[] = $color;
        }

        return $this->render('home/home.html.twig', [
            //'products' => $productRepository->findAll(),
            'products' => $productsAll,
            'colors' => $colors
        ]);
    }
}
