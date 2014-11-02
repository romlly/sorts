<?php
namespace sort\algorithms\quick;

use sort\Sorter;

class QuickSorter extends Sorter
{
    public function sortArray(array $arrayToSort)
    {
        if (empty($arrayToSort) || count($arrayToSort) === 1) {
            return $arrayToSort;
        } 

        $pivotIndex = count($arrayToSort) - 1;
        $currentIndex = 0;
        while ($currentIndex < $pivotIndex) {
            if ($arrayToSort[$currentIndex] > $arrayToSort[$pivotIndex]) {
                $tmp = $arrayToSort[$currentIndex];
                $arrayToSort[$currentIndex] = $arrayToSort[$pivotIndex - 1];
                $arrayToSort[$pivotIndex - 1] = $arrayToSort[$pivotIndex];
                $arrayToSort[$pivotIndex] = $tmp;
                $pivotIndex--;
            } else {
                $currentIndex++;
            }
        }

        return array_merge(
            $this->sortArray(array_slice($arrayToSort, 0, $pivotIndex)),
            [$arrayToSort[$pivotIndex]],
            $this->sortArray(array_slice($arrayToSort, $pivotIndex + 1, count($arrayToSort) - $pivotIndex - 1))
        );
    }
}
