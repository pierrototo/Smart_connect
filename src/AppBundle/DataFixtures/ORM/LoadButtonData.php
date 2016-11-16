<?php
 
namespace AppBundle\DataFixtures\ORM;
 
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Button;
 
class LoadButtonData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $button1 = new Button("Button 1", "",0,0,"12341");
        $button2 = new Button("Button 2", "",0,0,"12342");
        $button3 = new Button("Button 3", "",0,0,"12343");
        $button4 = new Button("Button 4", "",0,0,"12344");
        $button5 = new Button("Button 5", "",0,0,"12345");
        $button6 = new Button("Button 6", "",0,0,"12346");
        // Quelques modifications sur l'entité pour qu'elle serve à quelque chose
 
        $manager->persist($button1);
        $manager->persist($button2);
        $manager->persist($button3);
        $manager->persist($button4);
        $manager->persist($button5);
        $manager->persist($button6);
        $manager->flush();
    }
}