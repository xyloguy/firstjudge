<?php
declare(strict_types=1);

abstract class Scoring
{
    /**
     * @var Condition[]
     */
    private $conditions = [];

    /**
     * @var Question
     */
    private $question;

    /**
     * @var array
     */
    private $pointValues = [];

    public function __construct(Question $question, array $pointValues)
    {
        $this->question = $question;
        array_walk($pointValues, [$this, 'addValue']);
    }

    public function score(Submission $submission): int
    {
        if (!$this->conditionsMet($submission)) {
            return 0;
        }
        return $this->scoreAnswer($submission->getAnswer($this->question));
    }

    public function getQuestion(): Question
    {
        return $this->question;
    }

    public function givenYes(YesOrNoQuestion $sourceQuestion): self
    {
        $this->conditions[] = new ConditionEquals($sourceQuestion, 'yes');
    }

    public function givenNo(YesOrNoQuestion $sourceQuestion): self
    {
        $this->conditions[] = new ConditionEquals($sourceQuestion, 'no');
    }

    public function givenCount(CountQuestion $sourceQuestion, int $expected): self
    {
        $this->conditions[] = new ConditionEquals($sourceQuestion, (string)$expected);
    }

    public function givenNotCount(CountQuestion $sourceQuestion, int $notExpected): self
    {
        $this->conditions[] = new ConditionNotEquals($sourceQuestion, $notExpected);
    }

    private function addValue(int $points, string $provided): void
    {
        assert(strlen($provided) > 0);
        $this->pointValues[$provided] = $points;
    }

    private function scoreAnswer(string $provided): int
    {
        return $this->pointValues[$provided] ?? 0;
    }

    private function conditionsMet(Submission $submission): bool
    {
        foreach ($this->conditions as $condition) {
            if (!$condition->verify($submission)) {
                return false;
            }
        }

        return true;
    }
}
