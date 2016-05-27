<?php

/**
 * Created by PhpStorm.
 * User: ÖZ
 * Date: 24.04.2016
 * Time: 17:37
 */
class operation {
    public $result = 0;

    /*
     * The default global variable
     *
     */

    public function addition($number) {
        $this->result = $this->result + $number;
        return $this;
    }

    public function subtraction($number) {
        $this->result = $this->result - $number;
        return $this;
    }

    public function division($number) {
        $this->result = $this->result / $number;
        return $this;
    }

    public function multiplication($number) {
        $this->result = $this->result * $number;
        return $this;
    }

    public function result() {
        echo $this->result;
    }

    public function reset() {
        $this->result = 0;
        return $this;
    }
}

/*
 * example object
 */
$example = new operation();
$example->addition(10)->subtraction(5)->division(3)->multiplication(2)->reset()->result();

