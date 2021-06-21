<?php

/**
 ** 20/06/2021
 ** @author Kashif
 **/


namespace App\Services;


use App\Entity\Role;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class RoleService
 * @package App\Services
 **/
class RoleService
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * SiteMessageService constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function fetchOne(string $name)
    {
        return $this->em->getRepository(Role::class)->findOneBy(['name' => $name]);
    }
}