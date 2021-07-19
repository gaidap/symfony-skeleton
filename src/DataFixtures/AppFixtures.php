<?php
    
    namespace App\DataFixtures;
    
    use App\Entity\User;
    use App\Entity\Video;
    use Doctrine\Bundle\FixturesBundle\Fixture;
    use Doctrine\Persistence\ObjectManager;

    class AppFixtures extends Fixture {
        public function load(ObjectManager $manager) {
            $names = ['Peter', 'Bruce', 'Tony'];
            $videos = ['Iron Man', 'Batman', 'Spiderman'];
            
            foreach ($names as $name) {
                $user = new User();
                $user->setName($name);
                foreach ($videos as $video_title) {
                    $video = new Video();
                    $video->setTitle($name . '\'s ' . $video_title);
                    $user->addVideo($video);
                    $manager->persist($video);
                }
                $manager->persist($user);
            }
            $manager->flush();
        }
    }
