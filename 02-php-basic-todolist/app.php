<?php

require_once "model/todolist.php";
require_once "business-logic/show-todolist.php";
require_once "business-logic/add-todolist.php";
require_once "business-logic/remove-todolist.php";
require_once "view/view-show-todolist.php";
require_once "view/view-add-todolist.php";
require_once "view/view-remove-todolist.php";
require_once "helper/input.php";

echo "Applikasi Todolist" . PHP_EOL;

viewShowTodolist();

// echo __DIR__ . PHP_EOL;
// __DIR__ . "/