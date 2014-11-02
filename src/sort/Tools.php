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


    public static function getConf()
    {
        return json_decode(file_get_contents(ROOT_DIR . '/etc/config.json'), true);
    }
}
