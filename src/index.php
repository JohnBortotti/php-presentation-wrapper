<?php

require_once 'vendor/autoload.php';

use App\Application\Service\CreatePresentationService;
use App\Domain\Presentation\Objects\PresentationTemplate;
use App\Domain\Presentation\Objects\Slide;
use App\Domain\Presentation\Objects\SlideCollection;
use App\Domain\Presentation\Objects\SlideTopic;
use App\Domain\Presentation\Objects\SlideTopicCollection;
use App\Infra\Presentation\Repositories\PresentationRepository;
use PhpOffice\PhpPresentation\PhpPresentation;

$template = new PresentationTemplate('ddd wrapper', 'joao', 'FF000000', 100, 'FFFFFF');

$topic1 = new SlideTopic('About', 'testing');
$topic2 = new SlideTopic('Why', 'just fun :)');
$topic3 = new SlideTopic('test', 'more testing');

$topic4 = new SlideTopic('Why', '42');
$topic5 = new SlideTopic('test', 'more testing');

$slideTopicCollection = new SlideTopicCollection([$topic1, $topic2, $topic3]);
$slideTopicCollection2 = new SlideTopicCollection([$topic4, $topic5]);

$slide1 = new Slide('test', $slideTopicCollection);
$slide2 = new Slide('test', $slideTopicCollection2);

$slideCollection = new SlideCollection([$slide1, $slide2]);

$service = new CreatePresentationService(new PhpPresentation(), $template, $slideCollection);

$presentation = $service->createPresentation();

$repository = new PresentationRepository($presentation);
$repository->savePresentationAsXlsx('presentation_testing');
