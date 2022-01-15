<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager)
    {
         $user = new User();
         $user->setEmail('test@email.com');
         $user->setRoles(['ROLE_ADMIN']);
         $user->setPassword($this->passwordHasher->hashPassword($user, 'my_secret_password'));
         $manager->persist($user);

        $manager->flush();
    }
}
