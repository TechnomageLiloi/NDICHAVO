<?php

namespace Liloi\OCD\API\Maps\Show;

use Liloi\OCD\API\Method as SuperMethod;
use Liloi\OCD\Domain\Maps\Manager as MapsManager;

/**
 * Maps.Show API method.
 */
class Method extends SuperMethod
{
    /**
     * @inheritDoc
     */
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