<?php
namespace sort\controllers;

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
     */
    public function showBenchmark()
    {
        $vars = array();

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