<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Variety;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr-FR');
      

        for ($i = 1; $i <= 26; $i++) { 
            $variety = new Variety();

            $name = $faker->sentence(1);
            $coverImage = $faker->imageUrl(100,100);
            $description = $faker->paragraph(2);
            


            $variety->setName($name)
                    ->setDescription($description)
                    ->setSlug('hh-hh-yy')
                    ->setcoverImage($coverImage)
                    ->setIndicativeLot(mt_rand(40, 200));
                   
           
        
            $manager->persist($variety);

        }
        $manager->flush();
    }
}
