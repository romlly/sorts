<?php
namespace sort;

/**
 * Class Tools
 * @package sort
 *
 * Just a couple of tools
 */
class Tools
{
    /**
     * Generates the array wich will ve sorted
     *
     * @param int $numberOfElements cardinality of the array
     * @param int $numberOfPossibleValues number of different values that can be present in the array
     * @return array
     */
    public static function getArrayToSort($numberOfElements, $numberOfPossibleValues)
    {
        $arrayToSort = [];

        for ($i = 0; $i < $numberOfElements; $i++) {
            $arrayToSort[] = rand(1, $numberOfPossibleValues);
        }

        return $arrayToSort;
    }


    /**
     * Just a util function that retrieves the application configuration
     *
     * @return array
     */
    public static function getConf()
    {
        return json_decode(file_get_contents(ROOT_DIR . '/etc/config.json'), true);
    }
}
