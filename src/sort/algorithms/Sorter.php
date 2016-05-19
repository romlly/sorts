<?php
namespace sort\algorithms;

/**
 * Class Sorter
 * @package sort\algorithms
 *
 * Mother class of the sort algorithms.
 */
abstract class Sorter
{
    protected $arrayToSort;

    protected $sortIsFinished = false;

    public function __construct(array $arrayToSort)
    {
        $this->arrayToSort = $arrayToSort;
    }

    public function nextStep()
    {
        if ($this->sortIsFinished) {
            throw new \Exception('Sort is finished !');
        }
    }

    public function sortInFinished()
    {
        return $this->sortIsFinished;
    }

    public function getArray()
    {
        return $this->arrayToSort;
    }
}
