<?php
namespace sort\algorithms\bubble;

use sort\algorithms\Sorter;

/**
 * Class BubbleSorter
 * @package sort\algorithms\bubble
 * Bubble sort.
 * See details : http://en.wikipedia.org/wiki/Bubble_sort
 */
class BubbleSorter extends Sorter
{
    /**
     * @inheritdoc
     */
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
