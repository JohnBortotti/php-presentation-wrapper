<?php

namespace App\Infra\Presentation\Repositories;

use App\Domain\Presentation\Interfaces\PresentationRepositoryInterface;
use PhpOffice\PhpPresentation\IOFactory;
use PhpOffice\PhpPresentation\PhpPresentation;

class PresentationRepository implements PresentationRepositoryInterface
{
    private $presentation;

    public function __construct(PhpPresentation $presentation)
    {
        $this->presentation = $presentation;
    }

    public function savePresentationAsXlsx($fileName): void
    {
        $oWriterPPTX = IOFactory::createWriter($this->presentation, 'PowerPoint2007');
        $oWriterPPTX->save($fileName . '.xlsx');
    }
}
