<?php
namespace RangeGenerator\Services\Handlers;

use RangeGenerator\Contracts\Handler;

/**
 * Created by ptopczewski, 30.10.17 16:04
 * Class NumericLabel
 * @package RangeGenerator\Services\Handlers
 */
class NumericWithLabel extends Numeric implements Handler
{
    private $prefix = '';
    private $suffix = '';

    /**
     * @param string|int $from
     * @param string|int $to
     * @return mixed
     */
    public function parse($from, $to)
    {
        preg_match_all("/(\\d+)/", $from, $fromResult, PREG_OFFSET_CAPTURE);
        preg_match_all("/(\\d+)/", $to, $toResult, PREG_OFFSET_CAPTURE);

        $count = count($fromResult[1]);
        if (!empty($fromResult[1]) && $count == count($toResult[1])) {
            $maxIndex = $count - 1;

            $fromValue = $fromResult[1][$maxIndex][0];
            $toValue   = $toResult[1][$maxIndex][0];

            $this->prefix = substr($from, 0, $fromResult[1][$maxIndex][1]);
            $this->suffix = substr($from, $fromResult[1][$maxIndex][1] + strlen($fromValue));

            $toPrefix = substr($to, 0, $toResult[1][$maxIndex][1]);
            $toSuffix = substr($to, $toResult[1][$maxIndex][1] + strlen($toValue));

            if($toPrefix != $this->prefix || $toSuffix != $this->suffix){
                return null;
            }

            return parent::parse($fromValue, $toValue);
        }
        return null;
    }

    /**
     * @param array $values
     * @return array
     */
    public function rebuildValues($values)
    {
        $values = parent::rebuildValues($values);

        $result = [];
        foreach ($values as $value) {
            $result[] = $this->prefix . $value . $this->suffix;
        }

        return $result;
    }
}