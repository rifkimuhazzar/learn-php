<?php

require_once "model/todolist.php";
require_once "view/view-remove-todolist.php";
require_once "business-logic/add-todolist.php";
require_once "business-logic/show-todolist.php";

addTodolist("Rifki 1");
addTodolist("Rifki 2");
addTodolist("Rifki 3");
addTodolist("Rifki 4");
addTodolist("Rifki 5");

showTodolist();
viewRemoveTodolist();
showTodolist();