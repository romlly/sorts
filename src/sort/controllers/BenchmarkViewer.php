<?php
namespace sort\controllers;

use sort\models\BenchmarkResultsRetriever;
use Twig_Autoloader;
use Twig_Environment;
use Twig_Loader_Filesystem;

/**
 * Class BenchmarkViewer
 * @package sort\controllers
 * Benchmark Viewer controller.
 */
class BenchmarkViewer
{
    /**
     * Show benchmark results page.
     *
     * @param string $benchmarkToLoad
     */
    public function showBenchmark($benchmarkToLoad = null)
    {
        $retriever = new BenchmarkResultsRetriever();
        $vars = array(
            'benchmark_list' => $retriever->retrieveBenchmarksList()
        );

        if ($benchmarkToLoad !== null) {
            $vars['benchmark'] = $retriever->retrieveBenchmarkResults($benchmarkToLoad);
        }

        $this->render($vars);
    }

    /**
     * Render template based on vars.
     *
     * @param array $vars data that should be given to the template
     */
    private function render(array $vars)
    {
        Twig_Autoloader::register();

        $loader = new Twig_Loader_Filesystem(ROOT_DIR . '/views');
        $twig = new Twig_Environment($loader, array(
            'cache' => ROOT_DIR . '/var/cache',
        ));

        echo $twig->render('benchmark_results.twig', $vars);
    }
} 
