<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Model;

use Application\Exception\UploadException;

/**
 * Description of DataLoader
 *
 * @author sibirsky87
 */
class DataLoader {

    protected $filename;
    protected $data;

    public function __construct($filename) {
        $this->setFilename($filename);
    }

    public function getFilename() {
        return $this->filename;
    }

    public function getData() {
        return $this->data;
    }

    public function setFilename($filename) {
        $this->filename = $filename;
        return $this;
    }

    protected function setData($data) {
        $this->data = $data;
        return $this;
    }

    public function getItem($id) {
        if (!isset($this->data[$id])) {
            throw new UploadException("Unable to find team " . $id);
        }
        return $this->data[$id];
    }

    public function read() {
        if (!is_readable($this->getFilename())) {
            throw new UploadException("Unable to read data file");
        }
        $data = require $this->getFilename(); 
        $this->setData($data);
    }

}
