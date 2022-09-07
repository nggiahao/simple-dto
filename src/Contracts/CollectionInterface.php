<?php

namespace Doklibs\DTO\Contracts;

interface CollectionInterface extends \Countable, \IteratorAggregate, \ArrayAccess, Arrayable
{
    public function add($element);

    public function clear();

    public function isEmpty();

    public function first();

    public function last();

    public function filter(\Closure $callback);

    public function map(\Closure $callback);
}