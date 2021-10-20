<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use Faker\Factory;
use App\Entity\Contact;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ProjetFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('FR-fr');

        $cat1 = new Categorie();
        $cat1->setDesignation("Amis");

        $cat2 = new Categorie();
        $cat2->setDesignation("Professionnels");

        $cat3 = new Categorie();
        $cat3->setDesignation("Connaissances");

        $manager->persist($cat1);
        $manager->persist($cat2);
        $manager->persist($cat3);

        $cats = [$cat1, $cat2, $cat3];

        for($i=1; $i<=30; $i++){
            $contact = new Contact();

            $adresse = $faker->lastname();
            $adrmail = $faker->email();
            $avatar = $faker->imageUrl(1000,350);
            $prenom = $faker->firstname();
            $nom = $faker->lastname();
            $numtelephone = $faker->phoneNumber();
            $ville = $faker->city();
           
        
            $contact->setAdresse($adresse)
                ->setAvatar($avatar)
                ->setPrenom($prenom)
                ->setNom($nom)
                ->setAdrmail($adrmail)
                ->setVille($ville)
                ->setCategorie($cats[mt_rand(0,2)])
                ->setNumtelephone($numtelephone)
                ->setCodepostal(mt_rand(10000,99990));

            $manager->persist($contact);

        }
        $manager->flush();
    }
}
