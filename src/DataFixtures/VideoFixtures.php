<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Video;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class VideoFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        foreach($this->VideoData() as [$title, $path, $category_id])
        {
            $duration = random_int(10,300);
            $category = $manager->getRepository(Category::class)->find($category_id);
            $video = new Video();
            $video->setTitle($title);
            $video->setPath('https://player.vimeo.com/video/'.$path);
            $video->setCategory($category);
            $video->setDuration($duration);
            $manager->persist($video);
        }

        $manager->flush();
    }

    private function VideoData()
    {
        return [

            ['Movies 1',289729765,4],
            ['Movies 2',238902809,4],
            ['Movies 3',150870038,4],
            ['Movies 4',219727723,4],
            ['Movies 5',289879647,4],
            ['Movies 6',261379936,4],
            ['Movies 7',289029793,4],
            ['Movies 8',60594348,4],
            ['Movies 9',290253648,4],

            ['Family 1',289729766,17],
            ['Family 2',289729767,17],
            ['Family 3',289729768,17],

            ['Romantic comedy 1',289729769,19],
            ['Romantic comedy 2',289729770,19],

            ['Romantic drama 1',289729771,20],

            ['Toys  1',289729772,2],
            ['Toys  2',289729773,2],
            ['Toys  3',289729774,2],
            ['Toys  4',289729775,2],
            ['Toys  5',289729776,2],
            ['Toys  6',289729777,2]

        ];
    }
}
