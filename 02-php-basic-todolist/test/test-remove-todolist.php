<?php

require_once "model/todolist.php";
require_once "business-logic/add-todolist.php";
require_once "business-logic/show-todolist.php";
require_once "business-logic/remove-todolist.php";

addTodolist("A");
addTodolist("B");
addTodolist("C");
addTodolist("D");
addTodolist("E");
showTodolist();

removeTodolist(3);
showTodolist();

removeTodolist(2);
showTodolist();

$success = removeTodolist(4);
var_dump($success);
showTodolist();

