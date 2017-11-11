<?php
declare(strict_types=1);

namespace App\Scoring;

abstract class Condition
{
    /**
     * @var Question
     */
    private $question;

    /**
     * @var string
     */
    private $expected;

    abstract public function verify(Submission $submission): bool;

    public function __construct(Question $question, string $expected)
    {
        $answers = $question->getAnswers();
        assert(isset($answers[$expected]));

        $this->question = $question;
        $this->expected = $expected;
    }

    public function getQuestion(): Question
    {
        return $this->question;
    }

    public function getExpected(): string
    {
        return $this->expected;
    }
}
