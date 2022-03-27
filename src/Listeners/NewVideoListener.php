<?php
namespace App\Listeners;

use App\Entity\Video;
use App\Entity\User;
use Doctrine\Persistence\Event\LifecycleEventArgs;


class NewVideoListener
{

    public function postPersist(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();

        // only act on some "Product" entity
        if (!$entity instanceof Video) {
            return;
        }


        $entityManager = $args->getObjectManager();
        // ... do something with the Product

        $users = $entityManager->getRepository(User::class)->findAll();

        foreach($users as $user)
        {
            // exit( $user->getName().' '.$entity->getTitle());
        }

    }
}
