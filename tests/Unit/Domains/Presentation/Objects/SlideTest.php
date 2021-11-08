<?php

namespace Tests\Unit\Domain\Presentation\Objects;

use App\Domain\Presentation\Exceptions\PresentationDomainException;
use App\Domain\Presentation\Objects\Slide;
use App\Domain\Presentation\Objects\SlideTopicCollection;
use PHPUnit\Framework\TestCase;

class SlideTest extends TestCase
{
    /**
     * @test
     */
    public function shouldThrowDomainExcepctionWhenSlideTitleIsNull(): void
    {
        $this->expectException(PresentationDomainException::class);

        $topics = new SlideTopicCollection();

        new Slide('', $topics);
    }

    /**
     * @test
     */
    public function shouldReturnCorrectSlideTitle(): void
    {
        $topics = new SlideTopicCollection();

        $slide = new Slide('titleRandom', $topics);

        $this->assertEquals($slide->getSlideTitle(), 'titleRandom');
    }

    /**
     * @test
     */
    public function shouldReturnInstanceOfSlideTopicCollection(): void
    {
        $topics = new SlideTopicCollection();

        $slide = new Slide('test', $topics);

        $this->assertInstanceOf(SlideTopicCollection::class, $slide->getSlideTopics());
    }
}
