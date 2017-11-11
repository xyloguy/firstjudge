<?php
declare(strict_types=1);

namespace App\Scoring;


class ConditionNotEquals extends Condition
{
    public function verify(Submission $submission): bool
    {
        return $submission->getAnswer($this->getQuestion()) !== $this->getExpected();
    }
}
