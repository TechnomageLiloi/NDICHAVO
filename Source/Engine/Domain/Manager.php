<?php

namespace Liloi\Paper\Domain;

use Liloi\Config\Pool;
use Liloi\Tools\Data\MySql\Adapter;
use Liloi\Tools\Data\MySql\Connection;
use Liloi\Tools\Manager as AbstractManager;

class Manager extends AbstractManager
{
    /**
     * Configuration data ppol.
     *
     * @var Pool
     */
    static private Pool $config;

    /**
     * Database adapter.
     *
     * @var Adapter|null
     */
    static private ?Adapter $adapter = null;

    /**
     * Gets configuration data object.
     *
     * @return Pool Configuration data object.
     */
    public static function getConfig(): Pool
    {
        return static::$config;
    }

    /**
     * Sets configuration data object.
     * @param Pool $config
     */
    public static function setConfig(Pool $config): void
    {
        static::$config = $config;
    }
}