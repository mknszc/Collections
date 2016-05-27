<?php

/**
 * Created by PhpStorm.
 * User: ÖZ
 * Date: 26.05.2016
 * Time: 22:36
 */
interface example {

    public function set($veriable);
    public function get();
}

class name implements example {
    public $name;

    public function set($veriable) {
        $this->name = $veriable;
    }

    /**
     * @return mixed
     */
    public function get() {
        return $this->name;
    }
}


$obj = new name();
$obj->set("Özcan");
echo $obj->get();


