<?php

namespace Liloi\OCD\Domain\Maps;

use Liloi\Stylo\Parser;
use Liloi\Tools\Entity as AbstractEntity;

/**
 * Maps entity.
 *
 * @method string getTitle()
 * @method void setTitle(string $value)
 *
 * @method string getDirectory()
 * @method void setDirectory(string $value)
 *
 * @method string getBody()
 * @method void setBody(string $value)
 */
class Entity extends AbstractEntity
{
    /**
     * Parse body files.
     *
     * @return string
     */
    public function parseBody(): string
    {
        $dir = $this->getDirectory();
        $body = $this->getBody();

        $lines = [];

        foreach ($body as $f)
        {
            $lines[] = Parser::parseString(file_get_contents($dir . '/' . $f));
        }

        return implode("", $lines);
    }
}