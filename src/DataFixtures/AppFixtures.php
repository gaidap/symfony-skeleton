<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $names = ['Peter', 'Bruce', 'Tony'];
    
        foreach ($names as $name) {
            $user = new User();
            $user->setName($name);
            $manager->persist($user);
        }
        $manager->flush();
    }
}
