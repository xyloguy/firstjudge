<?php
declare(strict_types=1);

class ConditionEquals extends Condition
{
    public function verify(Submission $submission): bool
    {
        return $submission->getAnswer($this->getQuestion()) === $this->getExpected();
    }
}
