<?php

namespace Liloi\OCD\API\Maps\Show;

use Liloi\OCD\API\Method as SuperMethod;
use Liloi\OCD\Domain\Maps\Manager as MapsManager;

class Method extends SuperMethod
{
    public function execute(): array
    {
        $entity = MapsManager::getMaps();

        return [
            'render' => $this->render(__DIR__ . '/Template.tpl', [
                'entity' => $entity
            ])
        ];
    }
}