<?php

namespace Tests\Unit\Domain\Presentation\Objects;

use App\Domain\Presentation\Exceptions\PresentationDomainException;
use App\Domain\Presentation\Objects\PresentationTemplate;
use PHPUnit\Framework\TestCase;

class PresentationTemplateTest extends TestCase
{
    /**
     * @test
     */
    public function shouldThrowDomainExcepctionWhenTitleIsNull(): void
    {
        $this->expectException(PresentationDomainException::class);

        new PresentationTemplate('', 'author', 'FF000000', 180, 'FFFFFF');
    }
    /**
     * @test
     */
    public function shouldReturnCorrectTitle(): void
    {
        $presentationTemplate = new PresentationTemplate('anyTitle', 'author', 'FF000000', 200, 'FFFFFF');

        $this->assertInstanceOf(PresentationTemplate::class, $presentationTemplate);
        $this->assertEquals($presentationTemplate->getTitle(), 'anyTitle');
    }

    /**
     * @test
     */
    public function shouldReturnCorrectAuthor(): void
    {
        $presentationTemplate = new PresentationTemplate('anyTitle', 'authorTest', 'FF000000', 100, 'FFFFFF');

        $this->assertEquals($presentationTemplate->getAuthor(), 'authorTest');
    }

    /**
     * @test
     */
    public function shouldReturnCorrectBgImagePath(): void
    {
        $presentationTemplate = new PresentationTemplate('anyTitle', 'authorTest', 'FF000000', 100, 'FFFFFF');

        $this->assertEquals($presentationTemplate->getBgColor(), 'FF000000');
    }

    /**
     * @test
     */
    public function shouldReturnCorrectTextSide(): void
    {
        $presentationTemplate = new PresentationTemplate('anyTitle', 'authorTest', 'FF000000', 100, 'FFFFFF');

        $this->assertEquals($presentationTemplate->getTextOffsetX(), 100);
    }
}
