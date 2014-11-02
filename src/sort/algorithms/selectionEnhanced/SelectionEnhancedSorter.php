<?php
namespace sort\algorithms\selectionEnhanced;

use sort\Sorter;

class SelectionEnhancedSorter extends Sorter
{
    public function sortArray(array $arrayToSort)
    {
        $length = count($arrayToSort);

        for ($i = 0; $i < $length; $i++) {
            $lowerValueIndex = $i;
            for ($j = $i; $j < $length; $j++) {
                if ($arrayToSort[$j] < $arrayToSort[$lowerValueIndex]) {
                    $lowerValueIndex = $j;
                }
            }

            if ($lowerValueIndex != $i) {
                $tmp = $arrayToSort[$i];
                $arrayToSort[$i] = $arrayToSort[$lowerValueIndex];
                $arrayToSort[$lowerValueIndex] = $tmp;
            }
        }

        return $arrayToSort;
    }
}
