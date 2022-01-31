<?php

namespace App\DataFixtures;

use App\Entity\UserStatus;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;

class UserStatusFixtures extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager)
    {
        $statusLive = (new UserStatus())->setName('Live')
            ->setSortOrder(0);
        $manager->persist($statusLive);
        $this->setReference('STATUS_LIVE', $statusLive);

        $status = (new UserStatus())->setName('Deleted')
            ->setSortOrder(1);
        $manager->persist($status);

        $status = (new UserStatus())->setName('Reported')
            ->setSortOrder(2);
        $manager->persist($status);

        $status = (new UserStatus())->setName('Under Review')
            ->setSortOrder(3);
        $manager->persist($status);

        $status = (new UserStatus())->setName('Suspended')
            ->setSortOrder(4);
        $manager->persist($status);

        $status = (new UserStatus())->setName('Banned')
            ->setSortOrder(5);
        $manager->persist($status);

        $manager->flush();
    }

    public static function getGroups(): array
    {
        return ['Default', 'Test'];
    }
}
