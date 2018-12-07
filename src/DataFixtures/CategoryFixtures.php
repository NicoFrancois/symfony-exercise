<?php
/**
 * Created by PhpStorm.
 * User: wilder15
 * Date: 06/12/18
 * Time: 11:54
 */

namespace App\DataFixtures;


use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use phpDocumentor\Reflection\Types\Self_;

class CategoryFixtures extends Fixture
{
    private $categories;

    const CATEGORIES = [
        'PHP',
        'Java',
        'Javascript',
        'Ruby',
        'Devops'
    ];

    public function load(ObjectManager $manager)
    {
        foreach (Self::CATEGORIES as $key => $categoryName){
            $category = new Category();
            $category->setName($categoryName);
            $manager->persist($category);
            $this->addReference('categorie_' . $key, $category);
        }
    $manager->flush();
    }
}
