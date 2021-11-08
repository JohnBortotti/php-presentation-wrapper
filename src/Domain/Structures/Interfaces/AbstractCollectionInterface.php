<?php

namespace App\Domain\Structures\Interfaces;

interface AbstractCollectionInterface
{
    public function add($element): bool;
    public function remove($element): bool;
    public function map(callable $callback): self;
    public function filter(callable $callback): self;
    public function first();
    public function last();
}
