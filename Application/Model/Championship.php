<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Model;

/**
 * Description of VersusModel
 *
 * @author sibirsky87
 */
class Championship {

    /**
     *
     * @var DataLoader 
     */
    protected $loader;

    public function __construct(DataLoader $loader) {
        $loader->read();
        $this->setLoader($loader);
    }

    public function getLoader() {
        return $this->loader;
    }

    /**
     * 
     * @param \Application\Model\DataLoader $loader
     * @return $this
     */
    public function setLoader(DataLoader $loader) {
        $this->loader = $loader;
        return $this;
    }

    /**
     * 
     * @param int $teamId
     * @return \Application\Model\Team
     */
    public function getTeam($teamId) {
        return new Team($teamId, $this->loader->getItem($teamId));
    }

}
