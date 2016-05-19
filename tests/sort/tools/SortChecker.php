<?php
namespace sort\tools;

class SortChecker
{
    private $arrayToCheck;

    public function __construct(array $arrayToCheck)
    {
        $this->arrayToCheck = $arrayToCheck;
    }

    public function check()
    {
        $lastArrayValue = -1;
        foreach ($sortedArray as $arrayValue) {
            if ($arrayValue < $lastArrayValue) {
                return false;
            }

            $lastArrayValue = $arrayValue;
        }

        return true;
    }
}