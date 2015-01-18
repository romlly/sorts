<?php
namespace sort\algorithms;

abstract class Sorter
{
    public abstract function sortArray(array $arrayToSort);

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
