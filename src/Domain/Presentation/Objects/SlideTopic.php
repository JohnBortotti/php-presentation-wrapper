<?php

namespace App\Domain\Presentation\Objects;

use App\Domain\Presentation\Exceptions\PresentationDomainException;
use App\Domain\Presentation\Interfaces\SlideTopicInterface;

class SlideTopic implements SlideTopicInterface
{
    private $topicTitle;
    private $topicText;

    public function __construct(string $topicTitle, string $topicText)
    {
        if (!$topicTitle) {
            throw new PresentationDomainException("topicTitle is required");
        }

        if (!$topicText) {
            throw new PresentationDomainException("topicText is required");
        }

        $this->topicTitle = $topicTitle;
        $this->topicText = $topicText;
    }

    public function getTopicTitle(): string
    {
        return $this->topicTitle;
    }

    public function getTopicText(): string
    {
        return $this->topicText;
    }
}
