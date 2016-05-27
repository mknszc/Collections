<?php

/**
 * Created by PhpStorm.
 * User: ÖZ
 * Date: 16.05.2016
 * Time: 22:18
 */
class member {
    public $name;

    public function getMember() {
        $this->name = 'Özcan ÇAMOĞLU';
    }

    public function memberName() {
        self::getMember();
    }
}

class signUp extends member {

    public function save () {
        parent::memberName();
        echo "The name of the member registration made:\n".$this->name;
    }

    public function complete(){
        self::save();
    }
}

$exp = new signUp();
$exp-> complete();