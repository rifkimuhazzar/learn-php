<?php

class Shape {
  public function getCorner() {
    return 0;
  }
}

class Rectangle extends Shape {
  public function getCorner() {
    return 4;
  }

  public function getParentCorner() {
    // gunakan parent:: jika inging mengakses function parentnya
    // ini berlaku jika di class saat ini memiliki nama function/const/props yang sama
    return parent::getCorner();
  }
}