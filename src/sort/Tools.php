<?php
namespace sort;

class Tools
{
    public static function getArrayToSort($numberOfElements, $numberOfPossibleValues)
    {
        $arrayToSort = [];

        for ($i = 0; $i < $numberOfElements; $i++) {
            $arrayToSort[] = rand(1, $numberOfPossibleValues);
        }

        return $arrayToSort;
    }
}
