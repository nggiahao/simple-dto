<?php

namespace Doklibs\DTO;

use Doklibs\DTO\Contracts\CollectionInterface;

class Collection implements CollectionInterface
{

    private array $elements;

    public function __construct(array $elements = [])
    {
        $this->elements = $elements;
    }

    protected function createFrom(array $elements)
    {
        return new static($elements);
    }

    public function toArray()
    {
        return $this->elements;
    }

    public function first()
    {
        return reset($this->elements);
    }

    public function last()
    {
        return end($this->elements);
    }

    public function offsetExists($offset)
    {}

    public function offsetGet($offset)
    {}

    public function offsetSet($offset, $value)
    {}

    public function offsetUnset($offset)
    {}

    public function getIterator()
    {}

    public function add($element)
    {
        $this->elements[] = $element;

        return true;
    }

    public function clear()
    {
        $this->elements = [];
    }

    public function isEmpty()
    {
        return empty($this->elements);
    }

    public function filter(\Closure $callback)
    {
        return $this->createFrom(array_filter($this->elements, $callback, ARRAY_FILTER_USE_BOTH));
    }

    public function map(\Closure $callback)
    {
        return $this->createFrom(array_map($callback, $this->elements));
    }

    public function slice($offset, $length = null)
    {
        return array_slice($this->elements, $offset, $length, true);
    }

    public function count()
    {
        return count($this->elements);
    }

    public function __toString()
    {
        return self::class . '@' . spl_object_hash($this);
    }
}