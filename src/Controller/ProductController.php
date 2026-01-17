<?php

namespace App\Controller;

use App\Entity\Prduct;
use App\Form\ProductType;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/product')]
class ProductController extends AbstractController
{
    #[Route('/', name: 'product_index')]
    public function index(ProductRepository $productRepository): Response
    {
        $products = $productRepository->findAll();
        
        return $this->render('product/index.html.twig', [
            'products' => $products,
        ]);
    }
  
    #[Route('/add', name: 'product_add')]
    public function add(Request $request, EntityManagerInterface $em): Response
    {
        $product = new Prduct();
        $form = $this->createForm(ProductType::class, $product);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($product);
            $em->flush();
            
            
            return $this->redirectToRoute('product_index');
        }
        
        return $this->render('product/add.html.twig', [
            'form' => $form,
        ]);
    }
}  