<?php

/**
 * Created by PhpStorm.
 * User: ÖZ
 * Date: 26.05.2016
 * Time: 23:24
 */
interface adapter {
    public function set($name);
}

interface adapter2 extends adapter {
    public function get();
}

class example implements adapter {
    private $name;

    public function set($name) {
        // TODO: Implement set() method.
        $this->name = $name;
    }
}

class example2 implements adapter2 {
    private $name;

    public function set($name) {
        // TODO: Implement set() method.
        $this->name = $name;
    }

    public function get() {
        // TODO: Implement get() method.
        return $this->name;
    }
}

/*
 * Adapter design pattern example
 */

