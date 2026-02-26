<?php

namespace Liloi\Paper\Domain\Thesis;

use Liloi\Paper\Domain\Manager as DomainManager;

class Manager extends DomainManager
{
    static public function getThesis(): Entity
    {
        $url = rtrim($_SERVER['REQUEST_URI'], '/');

        $root = self::getConfig()->get('root');
        $dir = $root . $url;
        $filThesis = $dir . '/Map.json';

        if(file_exists($filThesis))
        {
            $data = (array)json_decode(file_get_contents($filThesis));
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