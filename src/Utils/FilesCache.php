<?php

namespace App\Utils;

use App\Utils\Interfaces\CacheInterface;

use Symfony\Component\Cache\Adapter\PdoAdapter;
use Symfony\Component\Cache\Adapter\TagAwareAdapter;
use Doctrine\DBAL\DriverManager;


class FilesCache implements CacheInterface
{
    public $cache;

    public function __construct()
    {
        $connection = DriverManager::getConnection([
            'url' => 'sqlite:////%kernel.project_dir%/var/cache/data.db'
        ]);

        $this->cache =  new TagAwareAdapter(
            new PdoAdapter(
                $connection,
                $namespace = '',
                $defaultLifetime = 0
            )
        );
    }
}