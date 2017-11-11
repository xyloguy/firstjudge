<?php
declare(strict_types=1);

namespace App\HydroDynamics;

use App\Scoring\Mission;
use App\Scoring\Scoresheet;

class HydroDynamicsScoresheet extends Scoresheet
{
    public function __construct()
    {
        parent::__construct("Hydro Dynamics 2017");
    }

    protected function defineMissions(): void
    {
        $this->mission("M01. Pipe Removal", function (Mission $builder): void {
            $builder->setDescription("Move the broken pipe so it is completely in base.");

            $pipeInBase = $builder->askYesOrNo("Is the broken pipe completely in base?");
            $builder->pointsWhenYes(20, $pipeInBase);
        });

        $this->mission("M02. Flow", function (Mission $builder): void {
            $builder->setDescription("Move a big water (one time maximum) to the other team’s field only by turning the pump system’s valve(s).");

            $waterPlacedInOtherField = $builder->askYesOrNo("Did water get transferred to the other teams' field using pump system's value(s)?");
            $builder->pointsWhenYes(25, $waterPlacedInOtherField);
        });

        $this->mission("M03. Pump Addition", function (Mission $builder): void {
            $builder->setDescription("Move the pump addition so it has contact with the mat and that contact is completely in the pump addition target.");

            $pumpAdditionInTarget = $builder->askYesOrNo("The pump addition is completely inside the target area.");
            $builder->pointsWhenYes(20, $pumpAdditionInTarget);
        });

        $this->mission("M04. Rain", function (Mission $builder): void {
            $builder->setDescription("Make at least one rain come out of the rain cloud.");

            $rainFromCloud = $builder->askYesOrNo("There's at least one rain from the rain cloud.");
            $builder->pointsWhenYes(20, $rainFromCloud);
        });

        $this->mission("M05. Filter", function (Mission $builder): void {
            $builder->setDescription("Move the filter north until the lock latch drops.");

            $lockDropped = $builder->askYesOrNo("The filter's lock latch is dropped.");
            $builder->pointsWhenYes(30, $lockDropped);
        });

        $this->mission("M06. Water Treatment", function (Mission $builder): void {
            $builder->setDescription("Make the water treatment model eject its big water, only by moving the toilet’s lever.");

            $bigWaterEjected = $builder->askYesOrNo("Big water was ejected from the water treatment by moving the toilet's lever.");
            $builder->pointsWhenYes(20, $bigWaterEjected);
        });

        $this->mission("M07. Fountain", function (Mission $builder): void {
            $builder->setDescription("Make the fountain’s middle layer rise some obvious height and stay there, due only to a big water in the gray tub.");

            $fountainRaised = $builder->askYesOrNo("The fountain’s middle layer rises some obvious height, due only to a big water in the gray tub.");
            $builder->pointsWhenYes(20, $fountainRaised);
        });

        $this->mission("M08. Manhole Covers", function (Mission $builder): void {
            $builder->setDescription("Flip manhole cover(s) over, obviously past vertical without it/them ever reaching base.");

            $coversFlipped = $builder->askCount("How many manhole cover(s) are flipped over (obviously past vertical)?", 2);
            $builder->pointsForEach(15, $coversFlipped);

            $bothCoversInTargets = $builder->askYesOrNo("Both covers flipped over and completely inside their targets.");
            $builder->pointsWhenYes(30, $bothCoversInTargets)->givenCount($coversFlipped, 2);
        });

        $this->mission("M09. Tripod", function (Mission $builder): void {
            $builder->setDescription("Move the inspection camera tripod.");

            $feetInside = $builder->askEnum("With ALL three feet touching the mat, the tripod is partly or completely in one of the targets.", [
                "completely" => "Completely inside",
                "partly" => "Partly inside",
                "none" => "No feet inside",
                "missing_feet" => "One or more feet are not touching the mat"
            ]);
            $builder->pointsWhenEnumEquals($feetInside, [
                "completely" => 20,
                "partially" => 15
            ]);
        });

        $this->mission("M10. Pipe Replacement", function (Mission $builder): void {
            $builder->setDescription("Replace the broken yellow pipe by a new blue pipe.");

            $pipeReplaced = $builder->askYesOrNo("The blue pipe is between both black pipes and in full contact with the mat.");
            $builder->pointsWhenYes(20, $pipeReplaced);
        });

        $this->mission("M11. Pipe Construction", function (Mission $builder): void {
            $builder->setDescription("Move a new pipe.");

            $pipeInside = $builder->askEnum("With the pipe in full/flat contact with the mat, the pipe is partly or completely within the target.", [
                "completely" => "Completely inside",
                "partly" => "Partly inside",
                "none" => "Not inside"
            ]);
            $builder->pointsWhenEnumEquals($pipeInside, [
                "completely" => 20,
                "partly" => 15
            ]);
        });

        $this->mission("M12. Sludge", function (Mission $builder): void {
            $builder->setDescription("Move the sludge so it is touching the visible wood of any of the six garden boxes.");

            $sludgeTouching = $builder->askYesOrNo("The sludge is touching the VISIBLE wood of any of the six garden boxes.");
            $builder->pointsWhenYes(30, $sludgeTouching);
        });

        $this->mission("M13. Flower", function (Mission $builder): void {
            $builder->setDescription("Make the Flower rise some obvious height and stay there, due only to a big water in the brown pot.");

            $flowerRose = $builder->askYesOrNo("The flower has risen an obvious height.");
            $builder->pointsWhenYes(30, $flowerRose);

            $rainInsideFlower = $builder->askYesOrNo("The flower also has at least once in the purple part.");
            $builder->pointsWhenYes(30, $rainInsideFlower)->givenYes($flowerRose);
        });

        $this->mission("M14. Water Well", function (Mission $builder): void {
            $builder->setDescription("Move the water well so it has contact with the mat in it’s target.");

            $waterWellMoved = $builder->askEnum("With the water well moved and in full contact with the mat, is it partly or completely within the target?", [
                "completely" => "Completely inside",
                "partly" => "Partly inside",
                "none" => "Not inside"
            ]);
            $builder->pointsWhenEnumEquals($waterWellMoved, [
                "completely" => 25,
                "partly" => 15
            ]);
        });

        $this->mission("M15. Fire", function (Mission $builder): void {
            $builder->setDescription("Make the fire drop only by making the firetruck apply direct force to the house’s yellow lever.");

            $fireDropped = $builder->askYesOrNo("The fire was dropped by the firetruck only pushing the yellow lever.");
            $builder->pointsWhenYes(25, $fireDropped);
        });

        $this->mission("M16. Water Collection", function (Mission $builder): void {
            $builder->setDescription("Move or catch big water and/or rain water (one rain maximum; no dirty water) so it is touching the mat in the water target. The target may be moved. But the target mustn’t ever reach or cross the white off-limits line (the line also passes through under the ramp). Every water may be touching the target, and/or other water, but anything else. Each water model is scored as an individual.");

            $rainInTarget = $builder->askYesOrNo("At least one rain is in the target and touches the mat.");
            $builder->pointsWhenYes(10, $rainInTarget);

            $bigWaterInTarget = $builder->askCount("How many big waters lie in the targets (touching the mat)?", 5);
            $builder->pointsForEach(10, $bigWaterInTarget);

            $bigWaterStacked = $builder->askYesOrNo("One big water is stacked on top of another big water inside of the mat and touches nothing else.");
            $builder->pointsWhenYes(30, $bigWaterStacked)->givenNotCount($bigWaterInTarget, 0);
        });

        $this->mission("M17. Slingshot", function (Mission $builder): void {
            $builder->setDescription("Move the slingshot so it is completely in its target.");

            $slingshotInTarget = $builder->askYesOrNo("The slingshot is completely in its target.");
            $builder->pointsWhenYes(20, $slingshotInTarget);

            $bonusInTarget = $builder->askYesOrNo("With the slingshot completely in its target, the dirty water and a rain completely in the target.");
            $builder->pointsWhenYes(15, $bonusInTarget)->givenYes($slingshotInTarget);
        });

        $this->mission("M18. Faucet", function (Mission $builder): void {
            $builder->setDescription("Make the water level obviously more blue than white as seen from above the cup, only by turning the yellow faucet handle.");

            $waterColor = $builder->askYesOrNo("Water obviously more blue than white as seen from above.");
            $builder->pointsWhenYes(25, $waterColor);
        });

        $this->mission("Penalties", function (Mission $builder): void {
            $builder->setDescription("In the event of application of rule R14, the referee places one of the removed samples in the white triangle, in the southeast, as a permanent/untouchable interruption penalty. You can get up to 6 such penalties.");

            $penalties = $builder->askCount("Number of interruption penalties observed during the match.", 6);
            $builder->pointsForEach(-5, $penalties);
        });
    }
}
