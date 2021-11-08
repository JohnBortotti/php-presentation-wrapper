<?php

namespace App\Domain\Presentation\Interfaces;

use PhpOffice\PhpPresentation\PhpPresentation;

interface PresentationRepositoryInterface
{
    public function __construct(PhpPresentation $presentation);
    public function savePresentationAsXlsx($fileName) : void;
}
