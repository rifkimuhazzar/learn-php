<?php

require_once "model/todolist.php";
require_once "business-logic/add-todolist.php";

addTodolist("Rifki 1");
addTodolist("Rifki 2");
addTodolist("Rifki 3");

var_dump($todolist);