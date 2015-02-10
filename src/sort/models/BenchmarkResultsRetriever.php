<?php
namespace sorts\models;
use sort\Tools;

/**
 * Class BenchmarkResultsRetriever
 * @package sorts\models
 * Benchmark results database retriever.
 */
class BenchmarkResultsRetriever
{
    private $dbConnection;


    public function __construct()
    {
        $conf = Tools::getConf();

        $this->dbConnection = $dbConnection = new \PDO("mysql:host={$conf['db']['host']};dbname={$conf['db']['name']}", $conf['db']['user'], $conf['db']['password']);
    }

    /**
     * Returns all benchmark names.
     *
     * @return array
     */
    public function retrieveBenchmarksList()
    {
        $queryResults = $this->dbConnection->query('SELECT benchmark_name FROM benchmark GROUP BY benchmark_name');
        return array_column($queryResults->fetchAll(), 'benchmark_name');
    }

    /**
     * Returns a benchmark results (for all sorts).
     *
     * @param string $benchmarkName
     * @return array
     */
    public function retrieveBenchmarkResults($benchmarkName)
    {
        $queryResult = $this->dbConnection->prepare('SELECT * FROM benchmark WHERE benchmark_name = ?', array($benchmarkName));
        return $queryResult->fetchAll();
    }
} 