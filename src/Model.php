<?php

namespace Doklibs\DTO;

use Doklibs\DTO\DB\QueryBuilder;

abstract class Model extends Data
{
    protected QueryBuilder $query;

    protected string $table = '';

    public static function __callStatic(string $name, array $arguments)
    {
        return (new static)->{$name}(...$arguments);
    }

    /**
     * @return QueryBuilder
     */
    public function getQuery(): QueryBuilder
    {
        return $this->query;
    }

    /**
     * @param QueryBuilder $query
     * @return Model
     */
    public function setQuery(QueryBuilder $query)
    {
        $this->query = $query;
        return $this;
    }

    public static function query(QueryBuilder $query) {
        return (new static())->setQuery($query);
    }

    public function select(string|array $fields = '*') {
        $this->query->select($this->table, $fields);
        return $this;
    }

    public function where() {
        //..
    }

    public function create() {
        //..
    }

    public function update() {
        //..
    }

    public function delete() {
        //..
    }

    public function all() {
        $data = $this->query->all();
        return static::collection($data);
    }

    public function limit() {
        //..
    }

    public function get() {
        //..
    }

}