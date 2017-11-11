<?php
declare(strict_types=1);

namespace App\Scoring;


abstract class Question
{
    /**
     * @var string
     */
    private $text;

    /**
     * @var array
     */
    private $answers = [];

    /**
     * @var string
     */
    private $identifier;

    public function __construct(string $identifier, string $questionText, array $answers)
    {
        assert(strlen($questionText) > 0);
        assert(strlen($identifier) > 0);

        array_walk($answers, [$this, 'addAnswer']);
        $this->text = $questionText;
        $this->identifier = $identifier;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getAnswers(): array
    {
        return $this->answers;
    }

    public function getId(): string
    {
        return $this->identifier;
    }

    private function addAnswer(string $displayText, string $identifier): void
    {
        assert(strlen($displayText) > 0);
        assert(strlen($identifier) > 0);
        assert(!isset($this->answers[$identifier]));

        $this->answers[$identifier] = $displayText;
    }
}
