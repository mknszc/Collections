<?php
/**
 * Created by PhpStorm.
 * User: ÖZ
 * Date: 24.04.2016
 * Time: 18:26
 */
class method {

    public function __destruct() {
        echo "class destruct";
    }

    public function __construct() {
        echo "class construct \n";
    }
}
/*
 * first construct
 */
$example = new method();