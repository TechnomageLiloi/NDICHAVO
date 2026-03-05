<?php

namespace Liloi\NDICHAVO\Domain\Maps;

use Liloi\NDICHAVO\Domain\Manager as DomainManager;

/**
 * Maps manager.
 *
 * @package Liloi\NDICHAVO\Domain\Maps
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
        $filMaps = $dir . '/Map.json';

        if(file_exists($filMaps))
        {
            $data = (array)json_decode(file_get_contents($filMaps));
        }
        else
        {
            $data = [
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