<?php
namespace sort;

/**
 * Class ArrayGenerator
 * @package sort
 *
 * Useful to provide an array to test the sort algorithms !
 */
class ArrayGenerator
{
    /**
     * @var int
     */
    private $numberOfElements;

    /**
     * @var int
     */
    private $numberOfPossibleValues;

    /**
     * @param int $numberOfElements cardinality of the array
     * @param int $numberOfPossibleValues number of different values that can be present in the array
     */
    public function __construct($numberOfElements, $numberOfPossibleValues)
    {
        $this->numberOfElements = $numberOfElements;
        $this->numberOfPossibleValues = $numberOfPossibleValues;
    }

    /**
     * Generates the array which will ve sorted
     *
     * @return array
     */
    public function generate()
    {
        $arrayToSort = [];

        for ($i = 0; $i < $this->numberOfElements; $i++) {
            $arrayToSort[] = rand(1, $this->numberOfPossibleValues);
        }

        return $arrayToSort;
    }
}
