<?php
namespace sort\algorithms\bubble;

use sort\Sorter;

class BubbleSorter extends Sorter
{
    public function sortArray(array $arrayToSort)
    {
        $length = count($arrayToSort);

        do {
            $arrayHasChanged = false;
            for ($i = 0; $i < $length - 1; $i++) {
                if ($arrayToSort[$i] > $arrayToSort[$i+1]) {
                    $tmp = $arrayToSort[$i];
                    $arrayToSort[$i] = $arrayToSort[$i+1];
                    $arrayToSort[$i+1] = $tmp;
                    $arrayHasChanged = true;
                }
            }
        } while ($arrayHasChanged);

        return $arrayToSort;
    }
}
