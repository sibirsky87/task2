<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Model\Compare;

use Application\Model\Compare\AnalyzerInterface;
use Application\Exception\CompareException;

/**
 * Description of AlgorithmFactory
 *
 * @author sibirsky87
 */
class AnalyzerFactory {

    /**
     * 
     * @param type $type
     * @return type
     * @throws CompareException
     */
    public static function getAnalyzer($type) {

        switch ($type) {
            case "default":
                $analyzer = new GusevAnalyzer();

                break;

            default:
                throw new CompareException("Unknown analyzer {$type}");
        }
        return $analyzer;
    }

}
