<?php

namespace App\Domain\Structures\Objects;

use App\Domain\Structures\Interfaces\AbstractCollectionInterface;
use Exception;

abstract class AbstractCollection implements AbstractCollectionInterface
{
    protected $data = [];

    public function __construct(array $data = [])
    {
        foreach ($data as $key => $value) {
            $this->offsetSet($key, $value);
        }
    }

    public function offsetSet($offset, $value): void
    {
        if ($offset === null) {
            $this->data[] = $value;
        } else {
            $this->data[$offset] = $value;
        }
    }

    public function add($element): bool
    {
        $this[] = $element;

        return true;
    }

    public function remove($element): bool
    {
        if (($position = array_search($element, $this->data, true)) !== false) {
            unset($this->data[$position]);

            return true;
        }

        return false;
    }

    public function map(callable $callback): AbstractCollectionInterface
    {
        return new Collection('mixed', array_map($callback, $this->data));
    }

    public function filter(callable $callback): AbstractCollectionInterface
    {
        $collection = clone $this;
        $collection->data = array_merge([], array_filter($collection->data, $callback));

        return $collection;
    }

    public function first()
    {
        if ($this->isEmpty()) {
            throw new Exception('Can\'t determine first item. Collection is empty');
        }

        reset($this->data);
        $first = current($this->data);

        return $first;
    }

    public function last()
    {
        if ($this->isEmpty()) {
            throw new Exception('Can\'t determine last item. Collection is empty');
        }

        $item = end($this->data);
        reset($this->data);

        return $item;
    }

    public function isEmpty(): bool
    {
        return count($this->data) === 0;
    }
}
