<?php
/**
 * Created by PhpStorm.
 * User: wilder15
 * Date: 06/12/18
 * Time: 16:43
 */

namespace App\DataFixtures;


use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use  Faker;

class ArticleFixtures extends Fixture implements DependentFixtureInterface
{
    public function getDependencies()
    {
        return [CategoryFixtures::class];
    }

    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('us_US');
        for ($i = 0; $i < 5; $i++) {
            for ($l = 0; $l < 10; $l++) {
                $article = new Article();
                $article->setTitle(mb_strtolower($faker->sentence()));
                $article->setContent($faker->text);
                $article->setCategory($this->getReference('categorie_' . $i));
                $manager->persist($article);
                $manager->flush();
            }
        }
    }
}

