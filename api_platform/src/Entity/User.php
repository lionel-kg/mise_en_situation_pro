<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 *@ApiResource(
 *formats={"json","image"={"image/png"}},
 *  normalizationContext={"groups"={"read:user"}},
 *  *itemOperations={
 * "get/user/image"={
 *             "method"="GET",
 *             "path"="/user/image",
 *             "controller"=GetUserAvatarController::class,
 *             "read"=false,
 *             "normalization_context"={"groups"={"image"}},
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

 *},

 *)
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:user"})
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
     * @Groups({"get_image"})
     */
    private $imagefile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"read:user"})
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
     /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }
    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }


}
