<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GetUserController extends AbstractController
{
    public function __invoke()
    {
        $user = $this->getUser();
        if ($user != null){
            //dd($user);
            return $user ;
        }
        else{
            throw $this->createNotFoundException("user doesn't exist");
        }       
    }
}
