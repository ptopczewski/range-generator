<?php
namespace RangeGenerator\Services\Handlers;

use RangeGenerator\Contracts\Handler;
use RangeGenerator\Models\RangeInformation;

/**
 * Class Numeric
 * @package RangeGenerator\Services\Handlers
 */
class Numeric implements Handler
{
    private $length = 0;

    /**
     * @param string|int $from
     * @param string|int $to
     * @return mixed
     */
    public function parse($from, $to)
    {
        if (is_numeric($from) && is_numeric($to)) {

            if (is_int($from) || is_int($to)) {
                $this->length = 0;
            } else {
                $this->length = max(strlen($from), strlen($to));
            }

            $rangeInformation = new RangeInformation();
            $rangeInformation
                ->setStartValue($from)
                ->setEndValue($to)
                ->setIsReversed((INT)$from > (INT)$to);

            return $rangeInformation;
        }
        return null;
    }

    /**
     * @param array $values
     * @return array
     */
    public function rebuildValues($values)
    {
        $result = [];
        foreach($values as $value){
            if (strlen($value) < $this->length) {
                $result[] = str_pad($value, $this->length, '0', STR_PAD_LEFT);
            }else{
                $result[] = $value;
            }
        }
        return $result;
    }
}