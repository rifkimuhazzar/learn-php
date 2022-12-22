<?php

require_once "view/view-add-todolist.php";
require_once "business-logic/show-todolist.php";
require_once "business-logic/add-todolist.php";

addTodolist("Rifki 1");
addTodolist("Rifki 2");
addTodolist("Rifki 3");

viewAddTodolist();
showTodolist();

viewAddTodolist();
showTodolist();