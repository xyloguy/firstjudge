<?php
declare(strict_types=1);

class CountEachScoring extends Scoring
{
    public function __construct(CountQuestion $question, int $points)
    {
        parent::__construct($question, $this->buildPointValues($question, $points));
    }

    private function buildPointValues(CountQuestion $question, int $points)
    {
        return array_map(function (string $count) use ($points): int {
            return $points * (int)$count;
        }, $question->getAnswers());
    }
}
