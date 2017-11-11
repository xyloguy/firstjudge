<?php
declare(strict_types=1);

class Mission
{
    /**
     * @var string
     */
    private $identifier;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var Question[]
     */
    private $questions = [];

    /**
     * @var Scoring[]
     */
    private $scoring = [];

    public function score(Submission $submission): int
    {
        return array_sum(array_map(function (Scoring $scoring) use ($submission): int {
            return $scoring->score($submission);
        }, $this->scoring));
    }

    public function getId(): string
    {
        return $this->identifier;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        assert(strlen($name) > 0);
        $this->identifier = $this->buildIdentifier($name);
        $this->name = $name;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        assert(strlen($description) > 0);
        $this->description = $description;
        return $this;
    }

    public function askYesOrNo(string $questionText): YesOrNoQuestion
    {
        $question = new YesOrNoQuestion($this->getCurrentQuestionId(), $questionText);
        $this->questions[] = $question;
        return $question;
    }

    public function pointsWhenYes(int $points, YesOrNoQuestion $question): Scoring
    {
        $scoring = new YesOrNoScoring($question, $points, true);
        $this->scoring[] = $scoring;
        return $scoring;
    }

    public function pointsWhenNo(int $points, YesOrNoQuestion $question): Scoring
    {
        $scoring = new YesOrNoScoring($question, $points, false);
        $this->scoring[] = $scoring;
        return $scoring;
    }

    public function askCount(string $questionText, int $maxInclusive, int $step = 1): CountQuestion
    {
        $question = new CountQuestion($this->getCurrentQuestionId(), $questionText, $maxInclusive, $step);
        $this->questions[] = $question;
        return $question;
    }

    public function pointsForEach(int $points, CountQuestion $question): CountEachScoring
    {
        $scoring = new CountEachScoring($question, $points);
        $this->scoring[] = $scoring;
        return $scoring;
    }

    public function askEnum(string $questionText, array $answers): EnumQuestion
    {
        $question = new EnumQuestion($this->getCurrentQuestionId(), $questionText, $answers);
        $this->questions[] = $question;
        return $question;
    }

    public function pointsWhenEnumEquals(EnumQuestion $question, array $pointValues): EnumScoring
    {
        $scoring = new EnumScoring($question, $pointValues);
        $this->scoring[] = $scoring;
        return $scoring;
    }

    private function buildIdentifier(string $name): string
    {
        $alphaNumericOnly = preg_replace('/[^A-z0-9]+/', ' ', $name);
        $dasherized = preg_replace('/\s+/', '-', $alphaNumericOnly);
        $lowerDasherized = strtolower($dasherized);
        return trim($lowerDasherized, '-');
    }

    private function getCurrentQuestionId(): string
    {
        return count($this->questions) . $this->getId();
    }
}
