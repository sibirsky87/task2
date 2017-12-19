<?php

use Application\Core\ConfigLoader;
use Application\Model\DataLoader;
use Application\Model\Championship;
use Application\Model\Comparator;

define("DS", DIRECTORY_SEPARATOR);
define("__ROOTDIR__", __DIR__);
require __DIR__ . DS . "Application" . DS . "bootstrap.php";

function match($c1, $c2) {
    $filename = ConfigLoader::getDataFile();
    $algorithm = ConfigLoader::getCompareAlgorithm();
    $loader = new DataLoader($filename);
    $championship = new Championship($loader);
    $comparator = new Comparator($championship);
    return $comparator->setAlgorithm($algorithm)
                    ->compare($c1, $c2);
}
 
