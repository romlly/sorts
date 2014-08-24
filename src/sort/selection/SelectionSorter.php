<?php
namespace sort\selection;

use sort\Sorter;

class SelectionSorter extends Sorter
{
    public function sortArray(array $arrayToSort)
    {
        $length = count($arrayToSort);

        for ($i = 0; $i < $length; $i++) {
            for ($j = $i; $j < $length; $j++) {
                if ($arrayToSort[$j] < $arrayToSort[$i]) {
                    $tmp = $arrayToSort[$i];
                    $arrayToSort[$i] = $arrayToSort[$j];
                    $arrayToSort[$j] = $tmp;
                }
            }
        }

        return $arrayToSort;
    }
}
