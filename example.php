<?php

/**
 * Created by PhpStorm.
 * User: ÖZ
 * Date: 26.05.2016
 * Time: 22:36
 */
interface example {

    function set($veriable);
    function get();
}

class name implements example {
    public $name;
    function set($veriable) {
        $this->name = $veriable;
    }

    /**
     * @return mixed
     */
    function get() {
        return $this->name;
    }
}


$obj = new name();
$obj->set("Özcan");
echo $obj->get();


