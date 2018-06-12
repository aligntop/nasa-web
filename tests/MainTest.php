<?php

declare(strict_types=1);

namespace Test\App\Controller;

use App\Controller\Main;
use Nasa\Application\UseCase\CalculatePositions;
use Nasa\Domain\Model\Position;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;

class MainTest extends TestCase
{

    public function testController(): void
    {

        $calculatePositionsUseCase = $this->prophesize(CalculatePositions::class);
        $calculatePositionsUseCase->exec(
            Argument::any(),
            Argument::any(),
            Argument::any(),
            Argument::any()
        )
            ->willReturn(
            [
                new Position(2,2, 'N'),
                new Position(3,3, 'W'),
            ]
        )
            ->shouldBeCalledTimes(1)
        ;

        $controller = new Main($calculatePositionsUseCase->reveal());
        $response = $controller->index(1,1, '', '');

        $this->assertEquals(sprintf('2 2 N%s3 3 W', Main::SEPARATOR), $response->getContent());

    }

}