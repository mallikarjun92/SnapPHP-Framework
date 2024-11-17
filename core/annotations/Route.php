<?php

namespace SnapPHP\Core\Annotations;

/**
 * @Annotation
 * @Target("METHOD")
 */
class Route
{
    private $methods;
    private $path;
    private $name;

    public function __construct(array $values)
    {
        $this->methods = $values['methods'];
        $this->path = $values['path'];
        $this->name = $values['name'] ?? null;
    }

    public function getMethods()
    {
        return $this->methods;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function getName()
    {
        return $this->name;
    }
}
