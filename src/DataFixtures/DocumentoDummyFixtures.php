<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\DocumentoDummy;

class DocumentoDummyFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 7; $i++) {
            $documento = new DocumentoDummy();
            $documento->setTitulo("Documento " . $i);
            $manager->persist($documento);
        }
        $manager->flush();
    }
}
