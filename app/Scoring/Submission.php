<?php
declare(strict_types=1);

class Submission
{
    /**
     * @var array
     */
    private $answers = [];

    public function __construct(array $providedAnswers)
    {
        array_walk($providedAnswers, [$this, 'addAnswer']);
    }

    public function getAnswer(Question $question): string
    {
        return $this->answers[$question->getId()] ?? '';
    }

    private function addAnswer(string $provided, string $identifier): void
    {
        assert(strlen($identifier) > 0);

        $this->answers[$identifier] = $provided;
    }
}
