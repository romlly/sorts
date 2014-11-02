<?php
namespace sort\algorithms\insertion;

use sort\Sorter;

class InsertionSorter extends Sorter
{
    public function sortArray(array $arrayToSort)
    {
        $length = count($arrayToSort);
        for ($i = 0; $i < $length; $i++) {
            $j = $i - 1;
            while ($j >= 0 && $arrayToSort[$i] < $arrayToSort[$j]) {
                $tmp = $arrayToSort[$i];
                $arrayToSort[$j] = $arrayToSort[$i];
                $arrayToSort[$i] = $tmp;

                $j--;
            } 
        }

        return $arrayToSort;
    }
}
