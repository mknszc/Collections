<?php

/**
 * Created by PhpStorm.
 * User: ÖZ
 * Date: 02.06.2016
 * Time: 23:17
 */


function __autoload($name) {

    try {
        require($name . ".php");
    }
    catch(Exception $e) {
        return $e->getMessage();
        die("ERROR");

    }
}

function classCheck($class) {
    return class_exists("$class") ? "Yes" : "No";
}


/**
 * @param $class
 * @param $name
 * @return string
 */
function methodCheck($class, $name) {

    try {
        $exp = new $class();
        return method_exists($exp, "$name") ? "Yes": "No";
    }
    catch(Exception $e) {
        return $e->getMessage();
        die("ERROR");

    }
}
/**
 * __autoload("person");
 *
 * --------or----------
 * $exp = new person();
 *
 * classCheck("person");
 *
 * methodCheck("person", "setName");
 *
 */




