<?php
use PHPUnit\Framework\TestCase;
use RangeGenerator\Services\Generator;
use RangeGenerator\Services\Handlers\Character;
use RangeGenerator\Services\Handlers\Numeric;
use RangeGenerator\Services\Handlers\NumericWithLabel;

/**
 * @package ${NAMESPACE}
 */
class GlobalTest extends TestCase
{
    public function testWillNotFailIfNoHandlersMatched()
    {
        $generator = new Generator();
        $generator->addHandler(new Numeric());
        $generator->addHandler(new Character());
        $generator->addHandler(new NumericWithLabel());

        $values = $generator->buildRange('Abasdasd', 'saftasdads2');

        $this->assertEmpty($values);
    }
}