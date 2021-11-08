<?php

namespace App\Domain\Exceptions\Interfaces;

use Throwable;

interface GenericDomainExceptionInterface
{
    public function __construct($message, $code, Throwable $previous);
    public function getDomainName(): string;
}
