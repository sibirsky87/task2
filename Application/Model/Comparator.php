<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Model;

/**
 * Description of Comparator
 *
 * @author sibirsky87
 */
class Comparator {

    /**
     *
     * @var Championship 
     */
    protected $championship;
    protected $algorithm;

    public function __construct(Championship $championship) {
        $this->setChampionship($championship);
    }

    public function getChampionship() {
        return $this->championship;
    }

    public function getAlgorithm() {
        return $this->algorithm;
    }

    public function setChampionship(Championship $championship) {
        $this->championship = $championship;
        return $this;
    }

    public function setAlgorithm($algorithm) {
        $this->algorithm = $algorithm;
        return $this;
    }

    public function compare($team1, $team2) {
        return Compare\AnalyzerFactory::getAnalyzer($this->getAlgorithm())
                        ->setTeam1($this->getChampionship()->getTeam($team1))
                        ->setTeam2($this->getChampionship()->getTeam($team2))
                        ->calculateResult()
                        ->getResult();
    }

}
