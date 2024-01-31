<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {
        $listUsers = ['user' => ['test_user', 'ROLE_USER']
            , 'admin' => ['test_admin', 'ROLE_ADMIN']
        ];
        foreach ($listUsers as $profile) {
            $user = new User();
            $user->setEmail($profile[0] . '@gmail.com');
            $password = $this->hasher->hashPassword($user, $profile[0]);
            $user->setPassword($password);
            $user->setRoles([$profile[1]]);$manager->persist($user);
        }

        $manager->flush();
    }
}
