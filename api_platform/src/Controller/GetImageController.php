<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GetImageController extends AbstractController
{
    public function __invoke()
    {
        $user = $this->getUser();
        if ($user != null){
            echo $user->getImageFile(); 
        }
        else{
            throw $this->createNotFoundException("user doesn't exist");
        }
    }
}
