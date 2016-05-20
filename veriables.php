<?php

/**
 * Created by PhpStorm.
 * User: ÖZ
 * Date: 20.05.2016
 * Time: 10:35
 */
class veriables {

    private $name = 'Özcan ';
    protected $old = '23 ';
    public $job;

    function getName() {
        return 'Name is:'.$this->name;
    }
}

class child extends veriables {

    function getOld() {
        return 'Old is:'.$this->old;
    }
}

$exp = new child();
$exp->job = 'Engineer';
echo $exp->getName();
echo $exp->getOld();