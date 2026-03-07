<?php

namespace Liloi\TARDIS\Domain\Maps;

use Liloi\TARDIS\Domain\Manager as DomainManager;

/**
 * Maps manager.
 *
 * @package Liloi\TARDIS\Domain\Maps
 */
class Manager extends DomainManager
{
    /**
     * Gets map entity by current URL.
     *
     * @return Entity
     */
    static public function getMaps(): Entity
    {
        $url = rtrim($_SERVER['REQUEST_URI'], '/');

        $root = self::getConfig()->get('root');
        $dir = $root . $url;
        $filMaps = $dir . '/Index.json';

        if(file_exists($filMaps))
        {
            $data = (array)json_decode(file_get_contents($filMaps));
        }
        else
        {
            $data = [
                'id' => '.',
                'title' => 'Enter title'
            ];
        }

        $data['directory'] = $dir;

        if(!isset($data['body']))
        {
            $data['body'] = [];
        }

        $entity = Entity::create($data);

        return $entity;
    }
}