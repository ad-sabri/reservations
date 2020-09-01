<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\DataFixtures\RoleFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class UserFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $users = [
            [
                'login'=>'bob',
                'password'=>'123',
                'role'=>'admin',
                'firstname'=>'Bob',
                'lastname'=>'Sull',
                'email'=>'bob@sull.com',
            ],
            [
                'login'=>'sabri',
                'password'=>'123',
                'role'=>'member',
                'firstname'=>'Sabri',
                'lastname'=>'Abbassi',
                'email'=>'sabri@epfc.be',
            ],
            [
                'login'=>'fred',
                'password'=>'123',
                'role'=>'member',
                'firstname'=>'Fred',
                'lastname'=>'Sull',
                'email'=>'fred@sull.com',
            ],
        ];

        foreach($users as $record){
            $user = new User();

            $user->setLogin($record['login']);

            //Hasher le mot de passe
            $user->setPassword(password_hash($record['password'], PASSWORD_BCRYPT));

            //Assigner la référence du rôle correspondant
            $user->setRole($this->getReference($record['role']));

            $user->setFirstname($record['firstname']);
            $user->setLastname($record['lastname']);
            $user->setEmail($record['email']);
            $manager->persist($user);
        }

        $manager->flush();
    }
    public function getDependencies(){
        return[
            RoleFixtures::class, 
        ];
    }
}
