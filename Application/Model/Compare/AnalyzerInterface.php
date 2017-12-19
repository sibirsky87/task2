<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Model\Compare;

use Application\Model\Team;

/**
 *
 * @author sibirsky87
 */
interface AnalyzerInterface {

    public function setTeam1(Team $team);

    public function setTeam2(Team $team);

    public function calculateRank(Team $team);

    public function calculateResult();

    public function getResult();
}
