<?php

namespace data;
// abstract class, maka classnya tidak bisa dibuat object
// hanya bisa di turunkan ke class lain
// abstract class bisa digunakan sebagai kontrak child class
abstract class Location {
  public string $name;
}

class City extends Location {
}
class Country extends Location {
}
