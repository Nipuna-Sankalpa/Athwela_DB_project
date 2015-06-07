<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Athwela\EntityBundle\Entity;

use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Description of Image
 *
 * @author Flash
 */
class Image {

    //put your code here
    private $File;
    private $path;

    public function setUploadPath($path) {
        $this->path = $path;
    }

    protected function getUploadPath() {
        return $this->path;
    }

    protected function getUploadAbsolutePath() {
        return __DIR__ . '/../../../../web/' . $this->getUploadPath();
    }

    public function getImagePath() {
        $path=$this->getUploadPath().'/'.$this->getFile()->getClientOriginalName();
        return $path;
    }

    public function getFile() {
        return $this->File;
    }

    public function setFile(UploadedFile $file = NULL) {
        $this->File = $file;
    }

    public function upload() {
        if (NULL == $this->getFile()) {
            return;
        }

        $filename = $this->getFile()->getClientOriginalName();
        $this->getFile()->move($this->getUploadAbsolutePath(), $filename);
        $this->setFile();
    }

}
