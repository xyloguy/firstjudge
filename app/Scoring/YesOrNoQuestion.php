<?php
declare(strict_types=1);

namespace App\Scoring;


class YesOrNoQuestion extends Question
{
    public function __construct(string $identifier, string $questionText)
    {
        parent::__construct($identifier, $questionText, [
            'yes' => 'Yes',
            'no' => 'No'
        ]);
    }
}
