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
class GusevAnalyzer extends AbstractAnalyzer implements AnalyzerInterface {

    public function calculateResult() {
        $rank1 = $this->calculateRank($this->getTeam1());
        $rank2 = $this->calculateRank($this->getTeam2());
        $goals1 = $this->getGoals($rank1, $rank2);
        $goals2 = $this->getGoals($rank2, $rank1);

        $this->setResult([$goals1, $goals2]);
        return $this;
    }

    protected function getGoals($rank1, $rank2) {
        $index = (1 + $rank1 + $rank2) / $rank1;
        return rand(round($index / 2), $index);
    }

    public function calculateRank(Team $team) {
        $games = $team->getGames();
        $win = $team->getWin();
        $draw = $team->getDraw();
        $defeat = $team->getDefeat();
        $goalsScored = $team->getGoalsScored();
        $goalsSkiped = $team->getGoalsSkiped();
        $goalIndex = $goalsSkiped ? 2 * $goalsScored / $goalsSkiped : 1;
        $rate = ($win + $draw * 0.9 + $defeat * 0.5 + $goalIndex) / $games;
        return $rate;
    }

}
