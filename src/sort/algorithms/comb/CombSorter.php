<?php
namespace sort\algorithms\comb;

use sort\algorithms\Sorter;

class CombSorter extends Sorter
{
    const SHRINK = 1.3;

    public function sortArray(array $arrayToSort)
    {
        $gap = $length = count($arrayToSort);
        
        do {
            $gap = max(1, $gap / self::SHRINK);
            $arrayHasChanged = false;
            for ($i = 0; $i + $gap < $length; $i++) {
                if ($arrayToSort[$i] > $arrayToSort[$i + $gap]) {
                    $tmp = $arrayToSort[$i];
                    $arrayToSort[$i] = $arrayToSort[$i + $gap];
                    $arrayToSort[$i + $gap] = $tmp;

                    $arrayHasChanged = true;
                }
            }
        } while ($arrayHasChanged || $gap > 1);

        return $arrayToSort;
    }
}
