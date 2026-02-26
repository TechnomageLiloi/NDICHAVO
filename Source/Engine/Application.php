<?php

namespace Liloi\Paper;

use Liloi\Config\Pool;
use Liloi\Config\Sparkle;
use Liloi\Paper\API\Method;
use Liloi\Paper\Domain\Manager as DomainManager;
use Rune\Application\General as GeneralApplication;

/**
 * Interstate 60 (I60) application.
 *
 * @package Liloi\I60
 */
class Application extends GeneralApplication
{
    /**
     * @inheritDoc
     */
    public function __construct(array $config)
    {
        parent::__construct($config);

        Pool::getSingleton()->set(new Sparkle('root', function() use ($config) { return $config['root'];}));
        DomainManager::setConfig(Pool::getSingleton());
        Method::setConfig($config);
    }

    /**
     * @inheritDoc
     */
    public function compile(): string
    {
        if(isset($_POST['method']))
        {
            return json_encode(['response' => $this->api($_POST['method'], $_POST['parameters'])]);
        }

        return $this->render(__DIR__ . '/Layout.tpl', [
            'config' => $this->getConfig()
        ]);
    }

    /**
     * @inheritDoc
     */
    public function api(string $name, array $parameters): array
    {
        if(empty($parameters)) {
            $parameters = [];
        }

        if(method_exists($this, $name)) {
            return $this->$name($parameters);
        }

        $classMethod = 'Liloi\\Paper\\API\\' . ucfirst(str_replace('.', '\\', $name)) . '\\Method';

        if(class_exists($classMethod))
        {
            $apiMethod = new $classMethod();
            return $apiMethod->execute();
        }

        throw new \Exception('No API method.'.$classMethod);
    }
}