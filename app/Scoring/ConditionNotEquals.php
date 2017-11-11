<?php
declare(strict_types=1);

class ConditionNotEquals extends Condition
{
    public function verify(Submission $submission): bool
    {
        return $submission->getAnswer($this->getQuestion()) !== $this->getExpected();
    }
}
