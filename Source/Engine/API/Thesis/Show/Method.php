<?php

namespace Liloi\OCD\API\Thesis\Show;

use Liloi\OCD\API\Method as SuperMethod;
use Liloi\OCD\Domain\Thesis\Manager as ThesisManager;

class Method extends SuperMethod
{
    public function execute(): array
    {
        $entity = ThesisManager::getThesis();

        return [
            'render' => $this->render(__DIR__ . '/Template.tpl', [
                'entity' => $entity
            ])
        ];
    }
}