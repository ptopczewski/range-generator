<?php
namespace RangeGenerator\Services;

use RangeGenerator\Contracts\Handler;
use RangeGenerator\Models\RangeInformation;

/**
 * Class Generator
 * @package RangeGenerator\Services
 */
class Generator
{
    /**
     * @var Handler[]
     */
    private $handlers = [];

    /**
     * @param Handler $handler
     */
    public function addHandler(Handler $handler)
    {
        $this->handlers[] = $handler;
    }

    /**
     * @param string $from
     * @param string $to
     * @return array
     */
    public function buildRange($from, $to)
    {

        foreach ($this->handlers as $handler) {
            $rangeInformation = $handler->parse($from, $to);
            if ($rangeInformation instanceof RangeInformation) {
                $rangeValues = [];
                if ($rangeInformation->isReversed()) {
                    for ($value = $rangeInformation->getStartValue(); $value >= $rangeInformation->getEndValue(); $value--) {
                        $rangeValues[] = $value;
                    }
                } else {
                    for ($value = $rangeInformation->getStartValue(); $value <= $rangeInformation->getEndValue(); $value++) {
                        $rangeValues[] = $value;
                    }
                }
                return $handler->rebuildValues($rangeValues);
            }
        }
    }
}