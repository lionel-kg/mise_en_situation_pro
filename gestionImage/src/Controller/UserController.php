<?php

namespace App\Controller;

use App\Form\UploadType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function index()
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $user = $this-> getUser();
        
        return $this->render('user/profil.html.twig', [
            'controller_name' => 'UserController',
            'user' => $user,
        ]);
    }
    /**
     * @Route("/upload",name="upload_image")
     */
    public function upload(Request $request, EntityManagerInterface $manager)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $user = $this-> getUser();
        $form = $this->createForm(UploadType::class);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $fichier = $form->get('imagefile')->getData();
            
            $extension = pathinfo($fichier->getClientOriginalName(),PATHINFO_EXTENSION);
            $newFileName = $user->getUsername().'.'.$extension;
            $user->setFilename($newFileName);
            $user->setImageFile(file_get_contents($fichier));
            $manager->persist($user);
            $manager->flush();
            $fichier->move(
                $this->getParameter('image_directory'),
                $newFileName);
            
           return $this->redirectToRoute('user');
        }
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UtilisateurController',
            'form' => $form->createView(),
            ]);
        }
        /**
         * @Route("/user/image",name="show_image")
         */
        public function showImage(){
            $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
            $user = $this-> getUser();
            $img = stream_get_contents($user->getImageFile());
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
