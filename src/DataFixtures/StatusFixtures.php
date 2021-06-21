<?php

namespace App\DataFixtures;

use App\Entity\Status;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;

class StatusFixtures extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager)
    {
        $status = (new Status())->setName('Live');
        $manager->persist($status);

        $status = (new Status())->setName('Deleted');
        $manager->persist($status);

        $status = (new Status())->setName('Reported');
        $manager->persist($status);

        $status = (new Status())->setName('Under Review');
        $manager->persist($status);

        $status = (new Status())->setName('Suspended');
        $manager->persist($status);

        $status = (new Status())->setName('Banned');
        $manager->persist($status);

        $manager->flush();
    }

    public static function getGroups(): array
    {
        return ['Default', 'Test'];
    }
}
