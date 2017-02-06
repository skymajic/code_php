<?php

// クラスの使い方の復習


class Animal {
  public $name;
  public $age;

  function __construct($name, $age) {
    $this->name = $name;
    $this->age = $age;
  }

  public function animal_info() {
    echo "this animal is $this->name and its age is $this->age . \n";
  }
}


class Cat extends Animal {
  public function voice() {
    echo "cat voice is mearrrr\n";
  }
}


$dog = new Animal("dog", 10);
$dog->animal_info();

$cat = new Cat("cat", 10);
$cat->animal_info();
$cat->voice();
