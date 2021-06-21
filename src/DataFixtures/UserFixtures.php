<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture implements FixtureGroupInterface, DependentFixtureInterface
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    /**
     * UserFixtures constructor.
     * @param UserPasswordEncoderInterface $passwordEncoder
     */
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = (new User())
            ->setUsername('kash007')
            ->setFirstname('Kashif')
            ->setSurname('Bhatti')
            ->setEmail('kash@dreamsites.co.uk')
            ->setRole($this->getReference('ROLE_ADMIN'));

        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            'Password1'
        ));
        $manager->persist($user);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return array(
            RoleFixtures::class,
            StatusFixtures::class
        );
    }

    public static function getGroups(): array
    {
        return ['Default', 'Test'];
    }
}
