<?php
namespace RangeGenerator\Contracts;

/**
 * Interface Handler
 * @package RangeGenerator\Contracts
 */
interface Handler
{
    /**
     * @param string|int $from
     * @param string|int $to
     * @return mixed
     */
    public function parse($from, $to);

    /**
     * @param array $values
     * @return array
     */
    public function rebuildValues($values);
}