<?php

namespace Liloi\TARDIS\API\Maps\Tech;

use Liloi\TARDIS\API\Method as SuperMethod;
use Liloi\TARDIS\Domain\Maps\Manager as MapsManager;

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