<?php

namespace Doklibs\DTO\Supports;

class Helpers
{
    /**
     * Convert a value to studly caps case.
     *
     * @param string $value
     * @return string
     */
    public static function strStudly(string $value)
    {
        $value = ucwords(str_replace(['-', '_'], ' ', $value));

        return str_replace(' ', '', $value);
    }

    /**
     * Convert a string to snake case.
     *
     * @param string $value
     * @param string $delimiter
     * @return string
     */
    public static function strSnake(string $value, string $delimiter = '_')
    {
        if (! ctype_lower($value)) {
            $value = preg_replace('/\s+/u', '', ucwords($value));

            $value = static::strLower(preg_replace('/(.)(?=[A-Z])/u', '$1'.$delimiter, $value));
        }

        return $value;
    }

    /**
     * Convert the given string to lower-case.
     *
     * @param string $value
     * @return string
     */
    public static function strLower(string $value)
    {
        return mb_strtolower($value, 'UTF-8');
    }
}