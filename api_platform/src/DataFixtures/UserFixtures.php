<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Faker\Factory;

use Faker\Provider\en_US\Person;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

function getHttpCode($http_response_header)
{
        if(is_array($http_response_header))
        {
            $parts=explode(' ',$http_response_header[0]);
            if(count($parts)>1) //HTTP/1.0 code text
                return intval($parts[1]); //Get code
        }
        return 0;
}

class UserFixtures extends Fixture
{
    private $faker;
    private $passwordEncoder;
    private $id;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {    
        $this->passwordEncoder = $encoder;
        $this->faker = Factory::create('fr_FR');
        
    }
    private function createUser(){
        $user = new User();
        $user->setUsername($this->faker->userName());
        $user->setEmail($user->getUsername().'@gmail.com');

        $user->setPassword($this->passwordEncoder->encodePassword($user,'test'));
        $user->setFileName('https://i.pinimg.com/originals/f8/db/c6/f8dbc665e892a01b885ae515309dfa27.jpg');

        $image = null;
        while (true) {
            $image = @file_get_contents("https://robohash.org/{$user->getUsername()}?size=50x50");
            if (getHttpCode($http_response_header) === 200) {
                break;
            }
            echo "Erreur de chargement, {$this->id} : {$user->getUsername()} => re-recupération\n";
        }
        $user->setImageFile($image);
        return $user;
    }

    public function load(ObjectManager $manager)
    {
        $this->id = 5;
        for($i=0;$i<10;$i++){
            $product = $this->createUser();
            $manager->persist($product);
            $this->id++;
        }
        $manager->flush();

    }
}
