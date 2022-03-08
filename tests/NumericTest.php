<?php

use PHPUnit\Framework\TestCase;
use RangeGenerator\Services\Generator;
use RangeGenerator\Services\Handlers\Numeric;

/**
 * Class NumericTest
 */
class NumericTest extends TestCase
{
    public function testCanBuildASimpleNumericRange()
    {

        $generator = new Generator();
        $generator->addHandler(new Numeric());

        $range = $generator->buildRange(5, 10);
        $this->assertCount(6, $range);
        $this->assertEquals(7, $range[2]);
    }

    public function testCanBuildANumericRangeFilledWithZeros()
    {

        $generator = new Generator();
        $generator->addHandler(new Numeric());

        $range = $generator->buildRange('001', '010');
        $this->assertCount(10, $range);
        $this->assertEquals('003', $range[2]);
    }

    public function testCanBuildADescendingNumericRange()
    {

        $generator = new Generator();
        $generator->addHandler(new Numeric());

        $range = $generator->buildRange(10, 5);
        $this->assertCount(6, $range);
        $this->assertEquals(8, $range[2]);
    }

    public function testCanBuildADescendingNumericRangeFilledWithZeros()
    {

        $generator = new Generator();
        $generator->addHandler(new Numeric());

        $range = $generator->buildRange('010', '001');
        $this->assertCount(10, $range);
        $this->assertEquals('008', $range[2]);
    }
}