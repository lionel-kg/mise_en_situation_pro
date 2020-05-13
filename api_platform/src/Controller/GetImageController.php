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
            $response = new Response(
                stream_get_contents($user->getImageFile()),
                Response::HTTP_OK,
                ['Content-Type' => 'image/png']
            );
            return $response;
                
        }
        else{
            throw $this->createNotFoundException("user doesn't exist");
        }
    }
}
