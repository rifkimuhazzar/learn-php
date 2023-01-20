<?php

class Category {
  // readonly tidak disarankan diubah pada setter mehtod karena hanya bisa sekali diubah
  // readonly hanya bisa dibaca dan dikasih nilainya sekali dan tidak bisa diubah lagi
  // public readonly string $id;
  // public readonly string $name;

  public function __construct(public readonly string $id, public readonly string $name) {
    // $this->id = $id;
    // $this->name = $name;
  }

  // public function setId(string $id) {
  //   $this->id = $id;
  // }
}

$category = new Category("1", "Gadget");
var_dump($category->id);
// $category->id = "2";

// $category->setId("1");
// $category->setId("2");