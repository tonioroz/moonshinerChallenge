<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\AddProductFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class AddProductController extends AbstractController
{
    /**
     * @Route("/add", name="app_add_product")
     */
    public function addProduct(Environment $twig, Request $request, EntityManagerInterface $entityManager): Response
    {
        $product = new Product();
        $form = $this->createForm(AddProductFormType::class, $product);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $entityManager->persist($product);
            $entityManager->flush();

            //return new Response("Product id: " . $product->getId() . " is created!");

            $product = new Product();
            $form = $this->createForm(AddProductFormType::class, $product);

            return new Response($twig->render('add_product/add.html.twig', [
                'add_product_form' => $form->createView(),
                'answer' => '* Product successfully added into DATABASE!'
            ]));
        }

        return new Response($twig->render('add_product/add.html.twig', [
            'add_product_form' => $form->createView(),
            'answer' => ''
        ]));
    }
}
