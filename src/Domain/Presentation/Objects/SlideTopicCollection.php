<?php

namespace App\Domain\Presentation\Objects;

use App\Domain\Structures\Objects\AbstractCollection;

class SlideTopicCollection extends AbstractCollection
{
    public function getType(): string
    {
        return SlideTopic::class;
    }
}
