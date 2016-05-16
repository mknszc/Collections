<?php

/**
 * Created by PhpStorm.
 * User: ÖZ
 * Date: 16.05.2016
 * Time: 22:18
 */
class member {
    public $name;

    function getMember() {
        $this->name = 'Özcan ÇAMOĞLU';
    }

    function memberName() {
        self::getMember();
    }

}
class signUp extends member {

    function save () {
        parent::memberName();
        echo "The name of the member registration made:\n".$this->name;
    }

    function complete(){
        self::save();
    }
}

$exp = new signUp();
$exp-> complete();