<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Core;

use Application\Exception\ConfigException;

/**
 * 
 */
class ConfigLoader {

    private static $fields = ['datafile', 'algorithm'];
    private static $config;

    public static function init() {
        $file = __CONFIGDIR__ . DIRECTORY_SEPARATOR . "local.php";
        if (!is_readable($file)) {
            throw new ConfigException("Unable to read configuration file");
        }
        static::$config = require $file;
        static::validate();
    }

    private static function validate() {

        if (!is_array(static::$config)) {
            throw new ConfigException("Bad configuration file");
        }
        $missingFields = array_diff(static::$fields, array_keys(static::$config));
        if ($missingFields) {
            throw new ConfigException("Unable to find next fields: "
            . implode(", ", $missingFields));
        }
    }

    public static function getDataFile() {
        return static::$config['datafile'];
    }

    public static function getCompareAlgorithm() {
        return static::$config['algorithm'];
    }

}
