<?php

use PHPUnit\Framework\TestCase;
use RangeGenerator\Exceptions\RangeException;
use RangeGenerator\Services\Generator;
use RangeGenerator\Services\Handlers\Character;

class CharacterTest extends TestCase
{
    public function testCanBuildASimpleCharacterRange()
    {
        $generator = new Generator();
        $generator->addHandler(new Character());

        $range = $generator->buildRange('aBa', 'aBf');
        $this->assertCount(6, $range, $range);
        $this->assertEquals('aBc', $range[2]);
    }

    public function testCanBuildADescendingCharacterRange()
    {

        $generator = new Generator();
        $generator->addHandler(new Character());

        $range = $generator->buildRange('aBf', 'aBa');
        $this->assertCount(6, $range, $range);
        $this->assertEquals('aBd', $range[2]);
    }

    /**
     */
    public function testShouldFailIfLengthDoesNotMatch()
    {
        $generator = new Generator();
        $generator->addHandler(new Character());

        $this->expectException(RangeException::class);
        $generator->buildRange('aaaa', 'aa');
    }
}