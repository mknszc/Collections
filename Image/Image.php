<?php

/**
 * Created by PhpStorm.
 * User: ÖZ
 * Date: 06.06.2016
 * Time: 23:58
 */
class Image {


    public $path;

    public $imgName;

    public $fullPath;

    public $imgFormat;

    public $imgSize;

    public $imgHeight;

    public $imgWidth;

    public $imgStatus;

    public $noImage;

    public $newName;

    public $newImg;

    public $newPath;


    public function __construct($path='img/', $imgName ='default.png' ) {
        $this->path = $path;
        $this->imgName = $imgName;
        $this->fullPath = $this->path.$this->imgName;
    }

    public function getImg() {
        return $this->path.$this->imgName;
    }

    public function imgFormat() {
        return pathinfo($this->fullPath, PATHINFO_EXTENSION);
    }

    public function imgSize() {
        return filesize($this->fullPath); // Get file size in bytes
    }

    public function imgHeight() {
        return getimagesize($this->fullPath)[0];
    }

    public function imgWidth() {
        return getimagesize($this->fullPath)[1];
    }

    public function imgOpacity() {

    }

    public function imgStatus() {
        if (file_exists($this->fullPath)) {
            $this->imgStatus = True;
        } else {
            $this->imgStatus = False;
        }
        return $this->imgStatus;
    }

    public function noİmg() {
        if (self::imgStatus() == False) {
            $this->noImage = True ;
        }
        else {
            $this->noImage = True ;
        }
        return $this->noImage;
    }

    public function imgCopy($newPath, $newImg, $newName) {
        copy(''.$newImg.'', ''.$newPath.'/'.$newName.'');
    }

    public function imgUpload() {

    }

    public function imgDelete() {

    }

    public function changeImgWidth() {

    }

    public function changeImgHeight() {

    }

    public function changeImgSize() {

    }

    public function changeImgName() {

    }

    public function changeImgPath() {

    }

    public function changeImgFormat() {

    }

    public function imgRotate() {

    }

    public function changeImgColor() {

    }

    public function changeImgOpacity() {

    }


}

$a = new Image();
$a->imgCopy('img','img/rsm375211756-17bb-11e6-bfe0-00a0d1e9ad00.jpg','default.png');


