<?php
declare(strict_types=1);

class CountQuestion extends Question
{
    public function __construct(string $identifier, string $questionQuestionText, int $maxInclusive, int $step = 1)
    {
        assert($maxInclusive > 0);
        assert($step > 0);

        $range = array_map('strval', range(0, $maxInclusive, $step));

        parent::__construct($identifier, $questionQuestionText, array_combine($range, $range));
    }
}
