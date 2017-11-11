<?php
declare(strict_types=1);

namespace App\Scoring;


abstract class Scoresheet
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var Mission[]
     */
    private $missions = [];

    abstract protected function defineMissions(): void;

    public function __construct(string $name)
    {
        assert(strlen($name) > 0);
        $this->name = $name;
        $this->defineMissions();
    }

    public function score(Submission $submission): int
    {
        return array_sum(array_map(function (Mission $mission) use ($submission): int {
            return $mission->score($submission);
        }, $this->missions));
    }

    public function getMissions(): array
    {
        return $this->missions;
    }

    public function getName(): string
    {
        return $this->name;
    }

    final protected function mission(string $name, \Closure $configure): Mission
    {
        assert(strlen($name) > 0);

        $mission = new Mission;
        $mission->setName($name);
        $configure($mission);

        $this->missions[] = $mission;
        return $mission;
    }
}
