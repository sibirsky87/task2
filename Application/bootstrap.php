<?php

use Application\Core\ConfigLoader;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
define("__DATADIR__", __ROOTDIR__ . DIRECTORY_SEPARATOR . "data");
define("__VENDOR__", __ROOTDIR__ . DIRECTORY_SEPARATOR . "vendor");
define("__CONFIGDIR__", __ROOTDIR__ . DIRECTORY_SEPARATOR . "config");

require __VENDOR__ . DIRECTORY_SEPARATOR . "autoload.php";

ConfigLoader::init();
