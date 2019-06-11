<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User as AppUser;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {


        for ($i = 0; $i < 5; $i++) {
            $user = new AppUser();
            $user->setUsername('user' . $i)
                ->setPassword($this->passwordEncoder->encodePassword(
                    $user,
                    'the_new_password'
                ))
                ->setRoles(['user']);
            $manager->persist($user);
        }
        $manager->flush();
    }
}
