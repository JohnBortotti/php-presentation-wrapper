<?php

namespace App\Domain\Presentation\Interfaces;

use App\Domain\Presentation\Objects\SlideTopicCollection;

interface SlideInterface
{
    public function __construct(string $slideTitle, SlideTopicCollection $slideTopics);

    public function getSlideTitle(): string;
    public function getSlideTopics(): SlideTopicCollection;
}
