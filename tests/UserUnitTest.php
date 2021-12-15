<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Entity\User;


class UserUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $user = new User();
        $user->setEmail('true@test.com')
            ->setFirstname('prenom')
            ->setLastname('nom')
            ->setPassword('password');
        
        $this->assertTrue($user->getEmail() === 'true@test.com');
        $this->assertTrue($user->getFirstname() === 'prenom');
        $this->assertTrue($user->getLastname() === 'nom');
        $this->assertTrue($user->getPassword() === 'password');
    }
    public function testIsFalse(): void
    {
        $user = new User();
        $user->setEmail('false@test.com')
            ->setFirstname('prenom')
            ->setLastname('nom')
            ->setPassword('password');
        
        $this->assertTrue($user->getEmail() === 'false@test.com');
        $this->assertTrue($user->getFirstname() === 'prenom');
        $this->assertTrue($user->getLastname() === 'nom');
        $this->assertTrue($user->getPassword() === 'password');
    }
    public function testIsEmpty(): void
    {
        $user = new User();
        
        $this->assertTrue($user->getEmail());
        $this->assertTrue($user->getFirstname());
        $this->assertTrue($user->getLastname());
        $this->assertTrue($user->getPassword());
    }
}
