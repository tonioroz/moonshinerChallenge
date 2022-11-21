<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $colors = ['blue', 'red', 'yellow', 'black', 'green', 'pink', 'emerald', 'dark', 'white', 'plum', 'jay', 'gray'];

        for($i = 1 ; $i <= 12 ; $i++)
        {
            $product = new Product();
            $product
                ->setName('Moonshiner hoodie ' . $i)
                ->setDescription("This is the nice " . $colors[$i - 1] . " hoodie")
                ->setPrice(rand(7, 15));

            $manager->persist($product);
        }

        $manager->flush();
    }
}
