<?php

namespace App\Domain\Presentation\Exceptions;

use App\Domain\Exceptions\Interfaces\GenericDomainExceptionInterface;
use Exception;
use Throwable;

class PresentationDomainException extends Exception implements GenericDomainExceptionInterface
{
    public function __construct($message = '', $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function getDomainName(): string
    {
        return 'Presentation';
    }
}
