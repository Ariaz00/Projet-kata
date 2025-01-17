<?php

namespace App\Controller;

use App\Entity\Book;
use Twig\Environment;
use App\Repository\BookRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class BookController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(Environment $twig, BookRepository $bookRepository): Response
    {
        return $this->render('book/index.html.twig', [
            'books' => $bookRepository->findAll(),
        ]);
    }
    #[Route('/book/{id}', name: 'book_show')]
    public function show(Environment $twig, BookRepository $bookRepository, int $id): Response
    {
        return $this->render('book/show.html.twig', [
            'book' => $bookRepository->find($id),
        ]);
    }
}


