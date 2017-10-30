<?php
namespace RangeGenerator\Models;

/**
 * Class RangeInformation
 * @package RangeGenerator\Models
 */
class RangeInformation
{
    /**
     * @var int
     */
    private $startValue = 0;

    /**
     * @var int
     */
    private $endValue = 0;

    /**
     * @var bool
     */
    private $isReversed = false;

    /**
     * @return int
     */
    public function getStartValue()
    {
        return $this->startValue;
    }

    /**
     * @param int $startValue
     * @return $this
     */
    public function setStartValue($startValue)
    {
        $this->startValue = $startValue;
        return $this;
    }

    /**
     * @return int
     */
    public function getEndValue()
    {
        return $this->endValue;
    }

    /**
     * @param int $endValue
     * @return $this
     */
    public function setEndValue($endValue)
    {
        $this->endValue = $endValue;
        return $this;
    }

    /**
     * @return bool
     */
    public function isReversed()
    {
        return $this->isReversed;
    }

    /**
     * @param bool $isReversed
     * @return $this
     */
    public function setIsReversed($isReversed)
    {
        $this->isReversed = $isReversed;
        return $this;
    }
}