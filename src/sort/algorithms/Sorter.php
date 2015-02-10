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
    /**
     * Do sort an array using current algorithm.
     *
     * @param array $arrayToSort
     * @return array
     */
    public abstract function sortArray(array $arrayToSort);

    /**
     * Verify array state after a sort process.
     *
     * @param array $sortedArray
     * @return bool whether or not the array is well sorted
     */
    public function verifySort(array $sortedArray)
    {
        $lastArrayValue = -1;
        foreach ($sortedArray as $arrayValue) {
            if ($arrayValue < $lastArrayValue) {
                return false;
            }

            $lastArrayValue = $arrayValue;
        }

        return true;
    }
}
