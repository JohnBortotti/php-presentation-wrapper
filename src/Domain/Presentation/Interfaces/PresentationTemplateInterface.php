<?php

namespace App\Domain\Presentation\Interfaces;

interface PresentationTemplateInterface
{
    public function __construct(string $title, string $author, string $bgColor, int $textOffsetX, string $textColor);
    public function getTitle(): string;
    public function getAuthor(): string;
    public function getBgColor(): string;
    public function getTextOffsetX(): int;
    public function getTextColor(): string;
}
