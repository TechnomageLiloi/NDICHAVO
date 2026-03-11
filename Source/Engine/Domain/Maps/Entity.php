<?php

namespace Liloi\TARDIS\Domain\Maps;

use Liloi\Stylo\Parser;
use Liloi\Tools\Entity as AbstractEntity;

/**
 * Maps entity.
 *
 * @method string getId()
 *
 * @method string getTitle()
 * @method void setTitle(string $value)
 *
 * @method string getLink()
 * @method void setLink(string $value)
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
            $full = $dir . '/' . $f;
            $ext = pathinfo($full, PATHINFO_EXTENSION);
            $cont = file_get_contents($full);

            if($ext==='md')
            {
                $lines[] = Parser::parseString($cont);
                continue;
            }

            $lines[] = $cont;
        }

        return implode("", $lines);
    }

    /**
     * Gets URL seeds.
     *
     * @return string
     */
    public function getSeeds(): string
    {
        $url = rtrim($_SERVER['REQUEST_URI'], '/');

        $seeds = [];

        while (strpos($url, '/') !== false)
        {
            $conc = sprintf('<a href="%s">%s</a>', $url, $url);

            array_unshift($seeds, $conc);
            $parts = explode('/', $url);
            array_pop($parts);

            $url = implode('/', $parts);
        }

        array_unshift($seeds, '<a href="/">Root</a>');

        return implode(' &#9658; ', $seeds);
    }

    public function getTech(): array
    {
        $tech = [
            'RID' => '.' . str_replace('/', '.', strtoupper(trim($_SERVER['REQUEST_URI'], '/'))),
            'ID' => $this->getId(),
            'Link' => sprintf('<a href="%s" target="_blank">%s</a>', $this->getLink(), $this->getLink()),
            'Title' => $this->getTitle(),
            'Body' => json_encode($this->getBody(), JSON_UNESCAPED_UNICODE)
        ];

        return $tech;
    }
}