<?php

namespace App\Domain\Presentation\Objects;

use App\Domain\Structures\Objects\AbstractCollection;

class SlideCollection extends AbstractCollection
{
    public function getType(): string
    {
        return Slide::class;
    }
}
