<?php

namespace App\Application\Service;

use App\Domain\Presentation\Interfaces\PresentationTemplateInterface;
use App\Domain\Structures\Interfaces\AbstractCollectionInterface;
use PhpOffice\PhpPresentation\PhpPresentation;
use PhpOffice\PhpPresentation\Style\Alignment;
use PhpOffice\PhpPresentation\Slide\Background\Color;
use PhpOffice\PhpPresentation\Style\Color as StyleColor;

class CreatePresentationService
{
    private $presentation;
    private $presentationTemplate;
    private $slideCollection;

    public function __construct(PhpPresentation $presentation, PresentationTemplateInterface $presentationTemplate, AbstractCollectionInterface $slideCollection)
    {
        $this->presentation = $presentation;
        $this->presentationTemplate = $presentationTemplate;
        $this->slideCollection = $slideCollection;
    }

    public function createPresentation() : PhpPresentation
    {
        $properties = $this->presentation->getProperties();
        $properties->setCreator($this->presentationTemplate->getAuthor());
        $properties->setTitle($this->presentationTemplate->getTitle());

        $this->slideCollection->map(function ($slide) {
            $newSlide = $this->presentation->getActiveSlide();

            if ($this->slideCollection->first() == $slide) {
                $newSlide = $this->presentation->createSlide();
            }

            $newSlide->setName($slide->getSlideTitle());

            $backgroundColor = $this->newBgColor($this->presentationTemplate->getBgColor());
            $newSlide->setBackground($backgroundColor);

            $lastOffsetY = 50;

            $slide->getSlideTopics()->map(function ($topic) use ($newSlide, &$lastOffsetY) {

                $titleShape = $newSlide->createRichTextShape()
                    ->setHeight(600)
                    ->setWidth(600)
                    ->setOffsetX($this->presentationTemplate->getTextOffsetX())
                    ->setOffsetY($lastOffsetY);
                $titleShape->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
                $textRun = $titleShape->createTextRun($topic->getTopicTitle());
                $textRun->getFont()->setBold(true)
                    ->setSize(18)
                    ->setColor(new StyleColor($this->presentationTemplate->getTextColor()));

                $titleShape = $newSlide->createRichTextShape()
                    ->setHeight(600)
                    ->setWidth(600)
                    ->setOffsetX($this->presentationTemplate->getTextOffsetX())
                    ->setOffsetY($lastOffsetY + 30);
                $titleShape->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
                $textRun = $titleShape->createTextRun($topic->getTopicText());
                $textRun->getFont()->setBold(false)
                    ->setSize(12)
                    ->setColor(new StyleColor($this->presentationTemplate->getTextColor()));

                $lastOffsetY = $lastOffsetY + 75;
            });
        });

        return $this->presentation;
    }

    public function newBgColor($colorHex) : Color
    {
        $bgColor = new Color();
        $bgColor->setColor(new StyleColor($colorHex));

        return $bgColor;
    }
}
