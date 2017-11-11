<?php
declare(strict_types=1);

namespace App\Scoring;


class YesOrNoScoring extends Scoring
{
    public function __construct(YesOrNoQuestion $question, int $points, bool $whenYes)
    {
        $answer = $whenYes ? 'yes' : 'no';
        parent::__construct($question, [
            $answer => $points
        ]);
    }
}
