<?php

namespace Tests\Unit\Domain\Presentation\Objects;

use App\Domain\Presentation\Exceptions\PresentationDomainException;
use App\Domain\Presentation\Objects\SlideTopic;
use PHPUnit\Framework\TestCase;

class SlideTopicTest extends TestCase
{
    /**
     * @test
     */
    public function shouldThrowDomainExcepctionWhenTitleIsNull(): void
    {
        $this->expectException(PresentationDomainException::class);

        new SlideTopic('', 'text test');
    }

    /**
     * @test
     */
    public function shouldThrowDomainExcepctionWhenTextIsNull(): void
    {
        $this->expectException(PresentationDomainException::class);

        new SlideTopic('any title', '');
    }

    /**
     * @test
     */
    public function shouldReturnCorrectTitle(): void
    {
        $slideTopic = new SlideTopic('any title', 'test');

        $this->assertEquals($slideTopic->getTopicTitle(), 'any title');
    }

    /**
     * @test
     */
    public function shouldReturnCorrectText(): void
    {
        $slideTopic = new SlideTopic('any title', 'any text');

        $this->assertEquals($slideTopic->getTopicText(), 'any text');
    }
}
