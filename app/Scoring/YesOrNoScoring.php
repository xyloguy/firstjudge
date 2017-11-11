<?php
declare(strict_types=1);

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
