<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Faker\Factory;

use Faker\Provider\en_US\Person;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

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
        $password = $this->faker->password();
        $user->setPassword($password);
        $user->setFileName('image.png');
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
