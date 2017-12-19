<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Model;

use Application\Exception\TeamException;

/**
 * Description of TeamModel
 *
 * @author sibirsky87
 */
class Team {

    protected $id;
    protected $stat;
    protected $name;
    protected $games;
    protected $win;
    protected $draw;
    protected $defeat;
    protected $goalsScored;
    protected $goalsSkiped;
    protected $fields = ['name', 'games', 'win', 'draw', 'defeat', 'goals'];

    public function __construct($id, $stat) {
        $this->setId($id);
        $this->setStat($stat);
        if ($this->validateArray($stat)) {
            $this->fillFromArray($stat);
        }
    }

    /**
     * 
     * @param array $stat
     * @return boolean
     * @throws TeamException
     */
    protected function validateArray($stat) {
        foreach ($this->fields as $field) {
            if (!isset($stat[$field])) {
                throw new TeamException("Required field {$field} not found");
            }
            $value = $stat[$field];
            switch ($field) {
                case "name":
                    if (!$value || !is_string($value)) {
                        throw new TeamException("Wrong $field");
                    }
                    break;
                case "games":
                case "win":
                case "draw":
                case "defeat":
                    if (!is_integer($value) || $value < 0) {
                        throw new TeamException("Wrong $field");
                    }
                    break;
                case "goals":
                    if (!is_array($value) || !is_integer($value['scored']) || !is_integer($value['skiped'])) {
                        throw new TeamException("Wrong $field");
                    }
                    break;
                default:
                    break;
            }
        }
        return TRUE;
    }

    protected function fillFromArray($stat) {
        $this->setName($stat['name']);
        $this->setGames($stat['games']);
        $this->setWin($stat['win']);
        $this->setDraw($stat['draw']);
        $this->setDefeat($stat['defeat']);
        $this->setGoalsScored($stat['goals']['scored']);
        $this->setGoalsSkiped($stat['goals']['skiped']);
    }

    public function getId() {
        return $this->id;
    }

    public function getStat() {
        return $this->stat;
    }

    protected function setId($id) {
        $this->id = $id;
        return $this;
    }

    protected function setStat($stat) {
        $this->stat = $stat;
        return $this;
    }

    public function getName() {
        return $this->name;
    }

    public function getGames() {
        return $this->games;
    }

    public function getWin() {
        return $this->win;
    }

    public function getDraw() {
        return $this->draw;
    }

    public function getDefeat() {
        return $this->defeat;
    }

    public function getGoalsScored() {
        return $this->goalsScored;
    }

    public function getGoalsSkiped() {
        return $this->goalsSkiped;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function setGames($games) {
        $this->games = $games;
        return $this;
    }

    public function setWin($win) {
        $this->win = $win;
        return $this;
    }

    public function setDraw($draw) {
        $this->draw = $draw;
        return $this;
    }

    public function setDefeat($defeat) {
        $this->defeat = $defeat;
        return $this;
    }

    public function setGoalsScored($goalsScored) {
        $this->goalsScored = $goalsScored;
        return $this;
    }

    public function setGoalsSkiped($goalsSkiped) {
        $this->goalsSkiped = $goalsSkiped;
        return $this;
    }

}
