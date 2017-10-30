<?php
use PHPUnit\Framework\TestCase;
use RangeGenerator\Services\Generator;
use RangeGenerator\Services\Handlers\NumericWithLabel;

/**
 * Class NumericLabelTest
 */
class NumericLabelTest extends TestCase
{
    public function testCanBuildANumericRangeWithLabels()
    {
        $generator = new Generator();
        $generator->addHandler(new NumericWithLabel());

        $range = $generator->buildRange('MyZone04 - medium', 'MyZone16 - medium');
        $this->assertCount(13, $range);
        $this->assertEquals('MyZone06 - medium', $range[2]);
    }

    public function testCanBuildANumericDescendingRangeWithLabels()
    {
        $generator = new Generator();
        $generator->addHandler(new NumericWithLabel());

        $range = $generator->buildRange('MyZone16 - medium', 'MyZone04 - medium');
        $this->assertCount(13, $range);
        $this->assertEquals('MyZone14 - medium', $range[2]);
    }

    public function testShouldNotBuildARange()
    {
        $generator = new Generator();
        $generator->addHandler(new NumericWithLabel());

        $range = $generator->buildRange('MyZones16 - medium', 'MyZone014 - medium');
        $this->assertEmpty($range);
    }
}