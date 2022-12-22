<?php

require_once "model/todolist.php";
require_once "helper/input.php";
require_once "business-logic/add-todolist.php";

function viewAddTodolist() {
  echo "MENAMBAH TODO" . PHP_EOL;

  $todo = input("Todo (x - untuk batal) ");

  if ($todo == "x") {
    echo "Batal menambahkan todo" . PHP_EOL;
  } else {
    addTodolist($todo);
  }
}