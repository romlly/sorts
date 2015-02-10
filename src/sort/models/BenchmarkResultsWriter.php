<?php
namespace sorts\models;

/**
 * Class BenchmarkResultsWriter
 * @package sorts\models
 * Benchmark results database writer.
 */
class BenchmarkResultsWriter
{
    private $dbConnection;

    private $conf;


    /**
     * @param array $conf app configuration
     */
    public function __construct(array $conf)
    {
        $this->conf = $conf;

        $this->dbConnection = $dbConnection = new \PDO("mysql:host={$this->conf['db']['host']};dbname={$this->conf['db']['name']}", $this->conf['db']['user'], $this->conf['db']['password']);
    }

    /**
     * Do write benchmark result on database.
     *
     * @param string $sortName
     * @param int $numberOfElements
     * @param double $microtime
     */
    public function write($sortName, $numberOfElements, $microtime)
    {
        $this->dbConnection->exec("INSERT INTO benchmark (benchmark_name, algorithm, number_of_elements, microtime) VALUES ('{$this->conf['benchmark']['name']}', '$sortName', '$numberOfElements', '$microtime')");
    }
} 