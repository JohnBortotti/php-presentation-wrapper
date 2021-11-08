<?php

namespace Tests\Unit\Domain\Presentation\Exceptions;

use App\Domain\Presentation\Exceptions\PresentationDomainException;
use PHPUnit\Framework\TestCase;

class PresentationDomainExceptionTest extends TestCase
{
    /**
     * @test
     */
    public function shouldThrowCorrectExceptionWithCorrectMessage(): void
    {
        $this->expectException(PresentationDomainException::class);
        $this->expectExceptionMessage('any message');

        throw new PresentationDomainException('any message');
    }

    /**
     * @test
     */
    public function shouldReturnCorrectDomain(): void
    {
        $exception = new PresentationDomainException('message');

        $this->assertEquals($exception->getDomainName(), 'Presentation');
    }
}
