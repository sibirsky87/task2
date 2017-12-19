<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Model\Compare;

use Application\Exception\CompareException;
use Application\Model\Team;

/**
 * Description of GusevAlgorithm
 *
 * @author sibirsky87
 */
class MoonAnalyzer extends AbstractAnalyzer implements AnalyzerInterface {

    public function calculateResult() {
        $rank1 = $this->calculateRank($this->getTeam1());
        $rank2 = $this->calculateRank($this->getTeam2());
        $goals1 = $this->getGoals($rank1, $rank2);
        $goals2 = $this->getGoals($rank2, $rank1);

        $this->setResult([$goals1, $goals2]);
        return $this;
    }

    protected function getGoals($rank1, $rank2) {
        return rand(0, (3 + $rank2 + $rank1) / $rank2);
    }

    public function calculateRank(Team $team) {
        $games = $team->getGames();
        $win = $team->getWin();
        return $win / $games;
    }

}
