<?php

namespace MyLibrary\Belajar\PHP\MVC\Middleware;

interface Middleware {
  function before(): void;
}