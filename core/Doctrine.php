<?php

namespace SnapPHP\Core;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class Doctrine
{
    private static $entityManager;

    public static function getEntityManager()
    {
        if (self::$entityManager === null) {
            $config = include BASE_PATH . '/config/database.php';

            $doctrineConfig = Setup::createAnnotationMetadataConfiguration(
                [BASE_PATH . '/app/entities'], // Path to entities
                true, // Dev mode
                null,
                null,
                false
            );

            self::$entityManager = EntityManager::create($config, $doctrineConfig);
        }

        return self::$entityManager;
    }
}
