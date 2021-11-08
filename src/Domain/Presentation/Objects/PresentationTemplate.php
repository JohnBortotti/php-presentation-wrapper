<?php

namespace App\Domain\Presentation\Objects;

use App\Domain\Presentation\Exceptions\PresentationDomainException;
use App\Domain\Presentation\Interfaces\PresentationTemplateInterface;

class PresentationTemplate implements PresentationTemplateInterface
{
    private $title;
    private $author;
    private $bgColor;
    private $textOffsetX;
    private $textColor;

    public function __construct(string $title, string $author, string $bgColor, int $textOffsetX, string $textColor)
    {
        if (!$title) {
            throw new PresentationDomainException("title is required");
        }

        if (!$author) {
            throw new PresentationDomainException("author is required");
        }

        if (!$bgColor) {
            throw new PresentationDomainException("bgColor is required");
        }

        if (!$textOffsetX) {
            throw new PresentationDomainException("textOffsetX is required");
        }

        if (!$textColor) {
            throw new PresentationDomainException("textColor is required");
        }

        $this->title = $title;
        $this->author = $author;
        $this->bgColor = $bgColor;
        $this->textOffsetX = $textOffsetX;
        $this->textColor = $textColor;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function getBgImagePath(): string
    {
        return $this->bgImagePath;
    }

    public function getBgColor(): string
    {
        return $this->bgColor;
    }

    public function getTextOffsetX(): int
    {
        return $this->textOffsetX;
    }

    public function getTextColor(): string
    {
        return $this->textColor;
    }
}
