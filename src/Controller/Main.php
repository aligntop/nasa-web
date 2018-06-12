<?php

namespace App\Controller;

use Nasa\Application\UseCase\CalculatePositions;
use Nasa\Domain\Model\Position;
use Nasa\Infrastructure\Transformers\PositionTransformer;
use Symfony\Component\HttpFoundation\Response;

class Main
{

    /** @var CalculatePositions */
    private $calculatePositions;

    const SEPARATOR = '<br />';

    public function __construct(
        CalculatePositions $calculatePositions
    ) {
        $this->calculatePositions = $calculatePositions;
    }

    public function index(
        int $x,
        int $y,
        string $positionsStr,
        string $movementsStr
    )
    {

        $positions = explode(',',$positionsStr);
        $movements = explode(',',$movementsStr);

        $resultPosition = $this->calculatePositions->exec(
            $x,
            $y,
            $positions,
            $movements
        );

        $positionStr = array_map(function (Position $position) {
            return PositionTransformer::positionToString($position);
        }, $resultPosition);

        return new Response(sprintf('%s', implode(self::SEPARATOR, $positionStr)), 200);
    }

}
