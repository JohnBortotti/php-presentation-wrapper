<?php

namespace App\Domain\Presentation\Interfaces;

interface SlideTopicInterface
{
    public function __construct(string $topicTitle, string $topicText);
    public function getTopicTitle(): string;
    public function getTopicText(): string;
}
