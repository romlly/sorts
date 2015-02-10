<?php
namespace sort\algorithms\selection;

use sort\algorithms\Sorter;

/**
 * Class SelectionSorter
 * @package sort\algorithms\selection
 * Selection sort (1st implementation).
 * See details : http://en.wikipedia.org/wiki/Selection_sort
 */
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
