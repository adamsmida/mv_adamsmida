<?php

namespace App\DataFixtures;

use App\Entity\VinylMix;
use App\Factory\VinylMixFactory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        VinylMixFactory::createMany(25);
        // $product = new Product();
        // $manager->persist($product);
        // $mix = new VinylMix();
        // $mix->setTitle('Do you Remember... Phil Collins?!');
        // $mix->setDescription('A pure mix of drummers turned singers!');
        // $genres = ['pop', 'rock'];
        // $mix->setGenre($genres[array_rand($genres)]);
        // $mix->setTrackCount(rand(5, 20));
        // $mix->setVotes(rand(-50, 50));
        // $manager->persist($mix);
        // $manager->flush();
    }
}
