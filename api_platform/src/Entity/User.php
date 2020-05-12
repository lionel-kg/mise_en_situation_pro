<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 *@ApiResource(
 *formats={"json","image"={"image/png"}},
 *itemOperations={
 *  "get/users"={
 *             "method"="GET",
 *             "path"="/users",
 *             "controller"=GetUserController::class,
 *             "read"=false,
 *             "normalization_context"={"groups"={"user"}},
 *              "openapi_context"={
 *                  "summary"= "no parameters",
 *                  "parameters"= {},
 *              },
 *              "Responses"= {
 *                  "200"={"description"="response succes"},
 *                  "400"={"description"="response error"},
 *              }, 
 *},
 * "get/user/image"={
 *             "method"="GET",
 *             "path"="/user/image",
 *             "controller"=GetUserAvatarController::class,
 *             "read"=false,
 *             "normalization_context"={"groups"={"avatar"}},
 *              "openapi_context"={
 *                  "summary"= "no parameters",
 *                  "parameters"= {},
 *              },
 *              "Responses"= {
 *                  "200"={"description"="response succes",
 *                          "content" = {
 *                                          "image/png"={
 *                                                      "schema"={
 *                                                                 "type"="string",
 *                                                                  "format"="binary"}
 *                                                      }
 *                          }
 *                          },
 *                  "400"={"description"="response error"},
 *              },
 *              
 *  },
 *  "put"={"security"= "is_granted('ROLE_USER') and object.owner == user", "security_message"="Un utilisateur vient de se connecter."},
 *},
 *)
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="blob", nullable=true)
     */
    private $imagefile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $filename;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getImageFile()
    {
        return $this->imagefile;
    }

    public function setImageFile($imagefile): self
    {
        $this->imagefile = $imagefile;

        return $this;
    }

    public function getFileName(): ?string
    {
        return $this->filename;
    }

    public function setFileName(?string $filename): self
    {
        $this->filename = $filename;

        return $this;
    }
}
