<?php

namespace Liloi\Paper\API\Thesis\Show;

use Liloi\Paper\API\Method as SuperMethod;
use Liloi\Paper\Domain\Thesis\Manager as ThesisManager;

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