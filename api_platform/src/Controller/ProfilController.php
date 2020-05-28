<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProfilController extends AbstractController
{
    /**
     * @Route("/profil", name="profil")
     */
    public function index()
    {
        $user = $this->getUser();
        $filename = $user->getFileName();
        //$user->getImageFile()->getfilePath();
        return $this->render('profil/index.html.twig', [
            'controller_name' => 'ProfilController',
            'filename' => $filename,
        ]);
    }
}
