<?php

/**
 * Created by PhpStorm.
 * User: ÖZ
 * Date: 26.05.2016
 * Time: 23:24
 */
interface adapter {
 function set($name);
}

interface adapter2 extends adapter {
    function get();
}

class example implements adapter {

    private $name;
    function set($name) {
        // TODO: Implement set() method.
        $this->name = $name;
    }
}

class example2 implements adapter2 {
    private $name;
    function set($name) {
        // TODO: Implement set() method.
        $this->name = $name;
    }

    function get(){
        // TODO: Implement get() method.
        return $this->name;
    }
}

/*
 * Adapter design pattern example
 */

