<?php

namespace App\Domain\Presentation\Objects;

use App\Domain\Presentation\Exceptions\PresentationDomainException;
use App\Domain\Presentation\Interfaces\SlideInterface;

class Slide implements SlideInterface
{
    private $slideTitle;
    private $slideTopics;

    public function __construct(string $slideTitle, SlideTopicCollection $slideTopics)
    {
        if (!$slideTitle) {
            throw new PresentationDomainException("slideTitle is required");
        }

        if (!$slideTopics) {
            throw new PresentationDomainException("topics is required");
        }

        $this->slideTitle = $slideTitle;
        $this->slideTopics = $slideTopics;
    }

    public function getSlideTitle(): string
    {
        return $this->slideTitle;
    }

    public function getSlideTopics(): SlideTopicCollection
    {
        return $this->slideTopics;
    }
}
