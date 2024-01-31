<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    #[Route('/user', name: 'app_public')]
    public function publicPage(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    #[Route('/admin', name: 'app_private')]
    public function privatePage(EntityManagerInterface $em): Response
    {
        $listUser = $em->getRepository(User::class)->findAll();
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'HomeController',
            'listOfUsers'=>$listUser
        ]);
    }
}
