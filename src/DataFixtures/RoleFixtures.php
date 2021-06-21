<?php

namespace App\DataFixtures;

use App\Entity\Role;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RoleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $role = (new Role())->setName('Admin');
        $manager->persist($role);

        $role = (new Role())->setName('Standard');
        $manager->persist($role);

        $role = (new Role())->setName('Founding Member');
        $manager->persist($role);

        $role = (new Role())->setName('Developer');
        $manager->persist($role);

        $role = (new Role())->setName('Police');
        $manager->persist($role);

        $role = (new Role())->setName('Copywriter');
        $manager->persist($role);

        $role = (new Role())->setName('Can Read Everything');
        $manager->persist($role);

        $role = (new Role())->setName('Advertiser');
        $manager->persist($role);

        $role = (new Role())->setName('Charity');
        $manager->persist($role);

        $manager->flush();
    }
}
