<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ImageController extends AbstractController
{
    /**
     * @Route("/image", name="image")
     */
    public function index()
    {
        $user = $this->getDoctrine()
                ->getRepository(User::class)
                ->find(7);
        $img = stream_get_contents($user->getimage());
        $response = new Response(
            $img,
            Response::HTTP_OK,
            ['content-type' => 'image']
        );
       

        return $this->render("user/image.html.twig",[
            'img'=> $response->send(),
        ]);
    }
}
