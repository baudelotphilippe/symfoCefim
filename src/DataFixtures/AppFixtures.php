<?php

namespace App\DataFixtures;

use App\Entity\Soiree;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $formation = new Soiree();
        $formation->setNom('la soirée');
        $formation->setDateSoiree(new \DateTime());
        $formation->setCreatedAt(new \DateTimeImmutable());
        $formation->setDescription("le contenu de la soirée");
        
        $manager->persist($formation);

        $manager->flush();
    }
}
