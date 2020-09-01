<?php

namespace App\DataFixtures;

use App\Entity\Role;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class RoleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $roles = [
            ['role' => 'admin'],
            ['role' => 'member'],
            ['role' => 'affiliate'],
        ];

        foreach($roles as $record)
        {
            $role = new Role();
            $role->setRole($record['role']);
            
            $manager->persist($role);

            $this->addReference($record['role'], $role);
        }

        $manager->flush();
    }
}
