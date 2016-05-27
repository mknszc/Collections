<?php

/**
 * Created by PhpStorm.
 * User: ÖZ
 * Date: 06.05.2016
 * Time: 23:54
 */
class person {
    private $message;
    public $name;
    public $sex;

    public function setName($newName) {
        $this->name = $newName;
    }

    public function getName() {
        return $this->name;
    }

    public function setSex($newSex) {
        $this->sex = $newSex;
    }

    public function getSex() {
        return $this->sex;
    }

    public function hello() {
        if ($this->sex == 'male') {
            $this->message = 'Mr.'.$this->name;
        }
        else if ($this->sex == 'female') {
            $this->message = 'Mrs.'.$this->name;
        }
        else {
            $this->message = $this->name;
        }
        return 'Hello '.$this->message;
    }

}

$example = new person();
$example->setName('Özcan');
$example->setSex('male');
echo ($example->hello());
