<?php
namespace RangeGenerator\Services\Handlers;

use RangeGenerator\Contracts\Handler;
use RangeGenerator\Exceptions\RangeException;
use RangeGenerator\Models\RangeInformation;

/**
 * Class Character
 * @package RangeGenerator\Services\Handlers
 */
class Character implements Handler
{
    private $isReverted = false;

    /**
     * @param string|int $from
     * @param string|int $to
     * @return mixed
     * @throws RangeException
     */
    public function parse($from, $to)
    {
        preg_match("/^[a-zA-Z]+$/", $from, $fromResult);
        preg_match("/^[a-zA-Z]+$/", $to, $toResult);

        if (!empty($fromResult) && !empty($toResult)) {
            if (strlen($from) != strlen($to)) {
                throw new RangeException('incompatible range setup');
            }

            $rangeInformation = new RangeInformation();
            if ($from > $to) {
                $rangeInformation
                    ->setEndValue($from)
                    ->setStartValue($to);
                $this->isReverted = true;
            } else {
                $rangeInformation
                    ->setStartValue($from)
                    ->setEndValue($to);
            }

            return $rangeInformation;
        }
    }

    /**
     * @param array $values
     * @return array
     */
    public function rebuildValues($values)
    {
        if($this->isReverted){
            return array_reverse($values);
        }
        return $values;
    }
}