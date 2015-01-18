<?php
namespace sort\algorithms\merge;

use sort\algorithms\Sorter;

class MergeSorter extends Sorter
{
    public function sortArray(array $arrayToSort)
    {
        $length = count($arrayToSort);
        if ($length > 1) {
            $middleOfTheArray = floor($length / 2);
            return $this->merge(
                $this->sortArray(array_slice($arrayToSort, 0, $middleOfTheArray)),
                $this->sortArray(array_slice($arrayToSort, $middleOfTheArray, $length - $middleOfTheArray))
            );
        }

        return $arrayToSort;
    }

    private function merge(array $array1, array $array2)
    {
        $mergedArray = [];

        $array1Cursor = 0;
        $array2Cursor = 0;

        $hasElementsRemaining = true;
        while ($hasElementsRemaining) {
            if (isset($array1[$array1Cursor]) && $array1[$array1Cursor] < $array2[$array2Cursor]) {
                $mergedArray[] = $array1[$array1Cursor++];
            } else {
                $mergedArray[] = $array2[$array2Cursor++];
            }

            if (! isset($array1[$array1Cursor]) || ! isset($array2[$array2Cursor])) {
                $hasElementsRemaining = false;
            }
        }

        return $mergedArray;
    }
}
