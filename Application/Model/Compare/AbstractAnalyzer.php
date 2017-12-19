<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Model\Compare;

use Application\Model\Team;

/**
 * Description of AbstractComparator
 *
 * @author sibirsky87
 */
abstract class AbstractAnalyzer {

    /**
     *
     * @var Team 
     */
    protected $team1;

    /**
     *
     * @var Team 
     */
    protected $team2;

    /**
     *
     * @var array 
     */
    protected $result;

    public function getTeam1() {
        return $this->team1;
    }

    public function getTeam2() {
        return $this->team2;
    }

    public function getResult() {
        return $this->result;
    }

    public function setTeam1(Team $team1) {
        $this->team1 = $team1;
        return $this;
    }

    public function setTeam2(Team $team2) {
        $this->team2 = $team2;
        return $this;
    }

    public function setResult($result) {
        $this->result = $result;
        return $this;
    }

}
