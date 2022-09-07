<?php

namespace Doklibs\DTO;

use Doklibs\DTO\Contracts\Arrayable;
use Doklibs\DTO\Contracts\Jsonable;

abstract class Data implements Arrayable, Jsonable
{
    use HasAttributes;

    /**
     * @param array $attributes
     * @return Data
     */
    public static function from(array $attributes = [])
    {
        $instance = new static();
        return $instance->setAttributes($attributes);
    }

    public static function collection(array $items)
    {
        $items = array_map(function ($item) {
            if ($item instanceof static) {
                return $item;
            } else {
                return static::from($item);
            }
        }, $items);

        return new Collection($items);
    }

    public function toArray()
    {
        return $this->attributesToArray();
    }

    public function toJson($options = 0)
    {
        return json_encode($this->toArray(), $options);
    }
}
