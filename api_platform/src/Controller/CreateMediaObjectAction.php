<?php

// api/src/Controller/CreateMediaObjectAction.php

namespace App\Controller;

use App\Entity\User;
use App\Entity\MediaObject;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;


final class CreateMediaObjectAction extends AbstractController
{
    public function __invoke(Request $request,EntityManagerInterface $em ): MediaObject
    {
        $user = $this->getUser();
        $uploadedFile = $request->files->get('file');
        if (!$uploadedFile) {
            throw new BadRequestHttpException('"file" is required');
        }

        $mediaObject = new MediaObject();
        $mediaObject->file = $uploadedFile;
        $em->persist($mediaObject);
        //$user->setFile($uploadedFile);
        $user->setFilename('/uploads/user_images/'.$uploadedFile->getClientOriginalName());
        $em->persist($user);
        $em->flush();


        return $mediaObject;
    }
}
