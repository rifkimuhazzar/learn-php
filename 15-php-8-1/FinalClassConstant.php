<?php

class Foo {
  // final digunakan agar const tidak bisa di override di child classnya
  final const Foo = "Foo";
}

class Bar extends Foo {
  // const Foo = "Bar";
}

var_dump(Bar::Foo);