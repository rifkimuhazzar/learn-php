<?php

// namespace data; // 1 file ini menjadi namespace

namespace data {
  class Conflict {
  
  }

  class Sample {
  
  }
}

namespace Data\Two {
  class Conflict {
  
  }
}

namespace say {
  function sayHello(): void {
    echo "Hello" . PHP_EOL;
  } 
  
  function sayHi(): void {
    echo "Hi" . PHP_EOL;
  } 

  const APP = "Belajar PHP OOP";
}

// Global namespace | bisa juga tanpa menggunakan namespace (default)
namespace {

}