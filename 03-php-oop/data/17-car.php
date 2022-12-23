<?php

// interface mirip dengan abstract class
// interface otomatis abstract dan methodnya juga, tidak memiliki block
// interface memang di buat untuk contract sebgai prototype
// tidak boleh memiliki props
// gunakan implements untuk merawiskan ke class
// class hanya bisa di extends 1, interface bisa di implements lebih dari 1
// bisa untuk polymorphism
// interface bisa merawiskan interface lain dengan keyword extends
interface HasBrand {
  function getBrand(): string;
}

interface IsMaintenance {
  function isMaintenance(): bool;
}

interface Car extends HasBrand, IsMaintenance{
  function drive(): void;

  function getTire(): int;
}

// bisa digabung menggunakan extends class juga
// extends hanya bisa 1, implements bisa lebih dari 1 dengan dipsah tanda ,
class AventadorSVJ implements Car {
  function drive(): void {
    echo "Drive Aventador SVJ" . PHP_EOL;
  }

  function getTire(): int {
    return 5;
  }

  function getBrand(): string {
    return "Lamborghini";
  }

  function IsMaintenance(): bool {
    return true;
  }
}